<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Services\TransactionService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class InvoiceController extends Controller
{
	private $transaction_service;
	
	public function __construct(TransactionService $transactionService)
	{
		$this->transaction_service = $transactionService;
	}
	
	public function index()
	{
		$payment = $this->transaction_service->store_transaction();
		if ($payment == false) {
			return response()->json(['status' => 0]);
		}
		return response()->json([
			'status' =>	1,
			'payment' =>	$payment
		]);
	}
	
	public function verify(Request $request, $amount, $order_id)
	{
		//        $success = $this->transaction_service->verify($amount, $order_id);
		$payment_status = $this->transaction_service->payment_status($amount, $order_id);
		
		$message = "";
		
		if ($payment_status['success'] == 1) {
			$message = $message . "تراكنش $order_id با موفقيت پرداخت شد";
		} else {
			$message = $message . "پرداخت تراكنش $order_id انجام نشد، دوباره تلاش كنيد";
		}
		/*
		if ($flag == 0)
			$message = $message . "  ارسال و ثبت اطلاعات بدرستی انجام نشد  ";		
					return redirect('/request/report')->with('message', $message);
		*/
		return view('letters.result', compact('message'));
	}
	
	public function verify_get($amount, $order_id)
	{
		echo $amount.'<br>';
		echo $order_id.'<br>';
		return redirect('/request/report')->with('message', "ادامه فرایند را از کارتابل درخواست ها دنبال کنید، شماره تراكنش : $order_id");
	}
	
	public function get_status(Request $request)
	{
		return $this->transaction_service->payment_status($request);
	}	
	/**
	 * Fetch all transactions from storage.
	 *
	 * @param  void
	 * @return transactions array
	*/
	public function showTransactions(Request $request)
	{
		$response = $this->transaction_service->filtered($request);
		if($request->ajax()) return response()->json($response);
		$transactions      = $response['transactions'];
		$tbody      = $response['content'];
		$pagination = $response['pagination'];
		return view('letters.transactions', compact('transactions', 'tbody','pagination'));
	}
}