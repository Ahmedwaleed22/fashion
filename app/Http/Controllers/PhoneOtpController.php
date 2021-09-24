<?php 
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class PhoneOtpController extends Controller
{
    public function newOtpRequest(Request $request)
    {
        $phone = $request->input('phonee');
        $randOtp = random_int(100000, 999999);
        $res = DB::table('otpuser')->where(['phone'=>$phone])->get();
        if($res->count() != 0){
            $affected = DB::table('otpuser')
              ->where('phone', $phone)
              ->update(['code' => $randOtp]);
            if($affected){
                return '1';
            }
            return '0';
        }
        else{

            $res = DB::table('otpuser')->insert([
                ['phone' => $phone, 'code' => $randOtp]
            ]);
            if($res){
                return '1';
            }
            return '0';
        }
        
        
    }
    public function verefyOtpCode(Request $request){
        $code = $request->input('code');
        $phone = $request->input('phone');
        var_dump($code);
        var_dump($phone);
        $res = DB::table('otpuser')->where(['code'=>$code,'phone'=>$phone])->get();
        if($res->count() != 0){
            return '1';
        }
        else{
            return '0';
        }

    }
    public function createOtpUser(Request $request){
        $code = $request->input('code');
        $phone = $request->input('phone');
        var_dump($code);
        var_dump($phone);
        $res = DB::table('otpuser')->where(['code'=>$code,'phone'=>$phone])->get();
        if($res->count() != 0){
            return '1';
        }
        else{
            return '0';
        }

    }
}
