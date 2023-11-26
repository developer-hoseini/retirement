<?php
namespace App\Http\Repositories;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TransactionRepository
{
    public function insert_log($type , $request , $response , $id)
    {
        try {
            $user_info = unserialize(session()->get('authByOpenID'));
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }

            $log = DB::table('transaction_logs')->insertGetId([
                'office_userkey' => $user_info['userkey'],
                'office_code' => $user_info['office_id'],
                'ip' => $ip,
                'transaction_id' => $id,
                'request' => json_encode($request, JSON_UNESCAPED_UNICODE),
                'response_code' => $response->status(),
                'response' => json_encode($response->body(), JSON_UNESCAPED_UNICODE),
                'type' => $type,
                'created_at' => Carbon::now(),
            ]);

            return $log;
        } catch (Exception $exception){
            return $exception;
        }
    }
}