<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use http\Message\Body;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\Transaction;
use App\Http\Repositories\TransactionRepository;
use Illuminate\Support\Facades\Log;
use PHPUnit\Exception;

class TransactionService extends Service
{
    private $config , $repository;

    public function __construct(TransactionRepository $transactionRepository)
    {
        $this->config = Config::get('production.local');
        $this->repository = $transactionRepository;
    }

    public function store_transaction() 
    {
        $customer_national_code = session()->get("customerNationalCode");
        $customer_mobile_number = session()->get("customerMobileNumber");
        $customer_name = session()->get("customerName");
        $user_info = unserialize(session()->get('authByOpenID'));
        $total_amount = 12000;
        $payment = Transaction::get_transaction($customer_national_code, $customer_mobile_number, $customer_name , $total_amount , $user_info['ver_code'] , $user_info['userkey']);
        if (empty($payment->first()->serial)){
            $serial = $this->register_payment($payment->first());
            if ($serial == 0)
                return false;
            $payment->update(['serial' => $serial]);
        }
        return $payment->first();
    }

     //main register payment
    private function register_payment($transaction)
    {
        try {
            $user_info = unserialize(session()->get('authByOpenID'));
            $customer_national_code = session()->get("customerNationalCode");
            //$customer = DB::table("customers")->where(["id" => $customer_id])->first();

            ///// just for test /////
            $total_amount = $transaction->total_amount;
            $office_income = $transaction->office_income;

            $payment_request_body = [
                "auth" => [
                    "domain" => $this->config['domain'],
                    "pass" => $this->config['pass'],
                    "service_id" => $this->config['service_id']
                ],
                "user" => [
                    "ver_code" => $user_info['ver_code'],
                    "user_key" => $user_info['userkey']
                ],
                "order" => [
                    "id" => $transaction->id,
                	"ssn" => session()->get("customerNationalCode"),
                	"cell" => session()->get("customerMobileNumber"),
                    "pay_type" => 3,
                    "customer_name" => session()->get("customerName"),
                    "total_amount" => 12000,
                    "office_income" => 0,
                    "central_id" => "123456789012345678901234567890",
                    "bill_id" => 83690596,
                    "payment_id" => -44178686,
                    "sharing" => "1:12000,97:25000"
                ]
            ];

            $response_ppg = Http::withHeaders([
                'Content-Type' => 'application/json',
                'X-Api-Key' => '1234@qwer',
                'Authorization' => 'Basic YWRtaW46MTIzNHF3ZXI='
            ])->post($this->config["register_payment_url"], $payment_request_body);

            $res = $response_ppg->json();
            //dd($res);
            //////////////   insert in log in database
            $this->repository->insert_log("register" , $payment_request_body , $response_ppg , $transaction->id);

            if (!$res['success'])
                return 0;
            return $res['data']["serial"];

        }catch (Exception $exception){
            Log::channel('transaction')->info($exception);
        }
    }

    public function payment_status($amount, $order_id)
    {
        $transaction_base = DB::table('transactions')->where(['id' => $order_id]);

        $request_body = [
            "auth" => [
                "domain" => "postest",
                "pass" => "%1234567890#",
                "service_id" => 9999
            ],
            "order_id" => $order_id,
        		"serial" => $transaction_base->first()->serial
        ];

        $res = Http::withHeaders([
            'Content-Type' => 'application/json',
            'X-Api-Key' => '1234@qwer',
            'Authorization' => 'Basic YWRtaW46MTIzNHF3ZXI='
        ])->post("http://ppgs.icsdev.ir/apg/paymentstatus", $request_body);

        //insert in log in database
        $this->repository->insert_log("status" , $request_body , $res , $transaction_base->first()->id);
        //////////////

        if ($res['success']) {
            $status = $res['data']["status"];

            if ($status == 6) {
            	$update = $transaction_base->update(['status' => 1]); 
                return ['success' => 1, 'message' => 'پرداخت با موفقیت ثبت شد', 'data' => $transaction_base->first()];
            } else if ($status == 4) {
                return ['success' => false, 'message' => 'پرداخت تایید نشده است.'];
            } else {
                return ['success' => false, 'message' => 'پرداخت انجام نشده است.'];
            }
        }else{
            $errors = Config::get('ppg.ppg_errors');
            return ['success' => false, 'message' => $errors[$res['code']]];
        }

    }

    public function getTransactions()
    {
    	$transactions = DB::table('transactions')->get();
    	return $transactions;
    }

    public function filtered($request)
    {
    	$perPage = $request->input('limit', 50);

    	
    	$transaction = Transaction::query();
    	if(isset($request['customer_national_code'])) {
    		$customer_national_code = $request['customer_national_code'];
    		$transaction->where('customer_national_code', 'LIKE', str_replace(' ', '%' , " $customer_national_code "));
    	}
    	if(isset($request['customer_mobile_number'])) {
    		$customer_mobile_number = $request['customer_mobile_number'];
    		$transaction->where('customer_mobile_number', 'LIKE', str_replace(' ', '%' , " $customer_mobile_number "));
    	}
    	if(isset($request['customer_name'])) {
    		$customer_name = $request['customer_name'];
    		$transaction->where('customer_name', 'LIKE', str_replace(' ', '%' , " $customer_name "));
    	}
    	$transactions = $transaction->paginate($perPage);
    	return [
    			'transactions'    => $transactions,
    			'content'       => $this->view('letters._table', compact('transactions')),
    			'pagination'    => $this->view('partials.pagination', ['items' => $transactions]),
    			'status'        => 'success',
    	];
    }
}