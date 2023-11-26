<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaction extends Model
{
    use HasFactory;

    public static function get_transaction($customer_national_code, $customer_mobile_number, $customer_name , $amount , $ver_code , $userkey)
    {
    	$transaction = DB::table("transactions")->where([
    		"customer_national_code" => $customer_national_code , 
    		"status" => 0
    	]);

        if (empty($transaction->first())) {
            $new_id = DB::table('transactions')->insertGetId([
        		'customer_national_code' => $customer_national_code,
            	'customer_mobile_number' => $customer_mobile_number,
            	'customer_name' => $customer_name,
                'total_amount' => $amount, //+ (($amount * 15 / 100) + 100000), // package price + office income
                'office_income' => 0, //($amount * 15 / 100) + 100000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'ver_code' => $ver_code,
                'userkey' => $userkey,
            ]);

            $transaction = DB::table("transactions")->where(["id" => $new_id , "status" => 0]);
        }
        else {
            // check formula of amount
            $transaction->update(["total_amount" => $amount, 'office_income' => 0]);
        }
        return $transaction;
    }
}
