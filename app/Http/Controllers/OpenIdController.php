<?php

namespace App\Http\Controllers;

use App\Helpers\GetConfigHelper;
use App\Helpers\OpenId;
use App\Models\Office;
use App\Models\Operator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class OpenIdController extends Controller
{
    public function auth(Request $request)
    {
        try {
            ini_set('max_execution_time', '300');

            $office = $request->route('office');
            $ver_code = $request->route('ver_code');
            $nc = $request->route('nc');
            $openid = new OpenId();
            if(!$openid->mode) {
                //Ok this an authentication request
                if(isset($office)) {
                    //lets check if it has office argument and if it has we will redirect user to authentication server
                    $url = $this->pishkhanAuth($office,$openid);
                    return redirect()->to($url);
                }
            } elseif($openid->mode == 'cancel') {// oh user canceled the authentication process !
                echo 'User has canceled authentication!';
            } else {//this is not an authentication request so let's check if user is valid or not
                if($openid->validate())
                {
                	//user is valid
                    if (!isset($openid->getAttributes()['userkey'])) {
                        return redirect("/", 'refresh');
                    }else{

                        $office_user_key = $openid->getAttributes()['userkey'];

                        $config = Config::get('production.production');

                        $request_body = [
                            "auth" => [
                                "domain" => $config["domain"],
                                "pass" => $config["pass"],
                                "service_id" => $config["service_id"]
                            ],
                            "user" => [
                                "ver_code" => $ver_code,
                                "user_key" => $office_user_key
                            ]
                        ];

//                         $result = Http::withHeaders([
//                             'Content-Type' => 'application/json',
//                             'X-Api-Key' => '1234@qwer',
//                             'Authorization' => 'Basic YWRtaW46MTIzNHF3ZXI='
//                         ])->post($config['info_url'], $request_body);
                        
                        $result =  Http::withHeaders([
                        		'X-API-KEY' =>'1234@qwer',
                        ])
                        ->withBasicAuth('admin' , '1234qwer' )
                        ->timeout(60)
                        ->post('http://ppgs.icsdev.ir/v1/userinfo',  $request_body);
                        /*"http://ppgs.icsdev.ir/apg/userinfo"*/
               

                        $result = $result->json();
                        /*
                        Log::channel('login')->emergency("user_key : " . $office_user_key .  " - result :  " . json_encode($result, JSON_UNESCAPED_UNICODE) . "\n");
						*/
                        if (!$result['success'] || empty($result['data']))
                        {
                            return redirect('https://dev.epishkhan.ir/');
                        }


                        $session_login = array(
                            "office_id" => $result['data']['office']['code'],
                            'user_type' => 'office',
                            'office' => $result['data']['office']['legal_name'],
                            'userkey' => $office_user_key,
                            'first_name' => $result['data']['office']['ceo_fname'],
                            'last_name' => $result['data']['office']['ceo_lname'],
                            'province_id' => $result['data']['office']['province_id'],
                            'province_name' => $result['data']['office']['province_name'],
                            'city_id' => $result['data']['office']['city_id'],
                            'city_name' => $result['data']['office']['city_name'],
                            'mobile' => $result['data']['office']['ceo_cell'],
                            'ver_code' => $ver_code,
                            'national' => 4,
                        );

                        //check if this office user key exists in offices table or not
                        $check = DB::table('offices')->whereUserkey($office_user_key)->first();

                        if($check === null){
                            //insert into Offices , Operators and Users table
                            $insertToOffice = Office::insertGetId($office_user_key, $result['data']['office']['code']);
                            if (count($result['data']['operator']) > 0){
                                //TODO: change this to operator data
                                $operator_id = Operator::insertGetId($insertToOffice,$result['data']['office']['ceo_ssn'],$result['data']['office']['ceo_cell'],$result['data']['office']['ceo_fname'], $result['data']['office']['ceo_lname']);
                            }else{
                                $operator_id = Operator::insertGetId($insertToOffice,$result['data']['office']['ceo_ssn'],$result['data']['office']['ceo_cell'],$result['data']['office']['ceo_fname'], $result['data']['office']['ceo_lname']);
                            }

                            User::insertGetId($insertToOffice, $operator_id, $office_user_key, $result['data']['office']['city_id'] , $result['data']['office']['province_id']);

                        }else{
                            if($check->office !== $result['data']['office']['code']){


                                $up = DB::table('offices')
                                    ->whereUserkey($office_user_key)
                                    ->update(array(
                                        'office'=>$result['data']['office']['code']
                                    ));
                            }
                        }
                        $request->session()->put('authByOpenID', serialize($session_login));
                        return redirect()->route('home');
                    }
                }else{//user is not valid
                    echo 'User hos not loggedin.';
                }
            }
        }catch (\Exception $exception){
            Log::channel('login')->emergency($exception  . "\n");
            return Redirect()->to('http://dev.epishkhan.ir');
        }
    }

    private function pishkhanAuth($office, OpenId $openid): string
    {
        //We must FORCE consumer to use pishkhan authentication (identity) server
        $openid->identity = "http://auth.epishkhan.ir/identity/" . (int)$office;
        //We use AX protocole to get userkey from authentication (identity) server
        $openid->required = array('userkey');
        //Sending redirect header to user's browsere
        return $openid->authUrl();
    }

    public function logout(Request $request)
    {
        $request->session()->forget('authByOpenID');
        $request->session()->flush();
        return Redirect()->to('http://dev.epishkhan.ir');
    }
}
