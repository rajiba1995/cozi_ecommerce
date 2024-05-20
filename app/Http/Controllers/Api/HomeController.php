<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Coupon;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function StoreCoupon(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            "user_name" => "required|string",
            "user_mobile" => [
                "required",
                "integer",
                "digits:10",
                "regex:/^[0-9]{10}$/"
            ],
        ], [
            'user_name.required' => 'The user name field is required.',
            'user_mobile.required' => 'The user mobile field is required.',
            'user_mobile.integer' => 'The user mobile must be an integer.',
            'user_mobile.digits' => 'The user mobile must be exactly 10 digits.',
            'user_mobile.regex' => 'The user mobile must be exactly 10 digits.'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }else{
            $User_coupon = Coupon::where('user_mobile', $request->user_mobile)->get();
            if(count($User_coupon)<5){
                $couponCode = $this->generateCouponCode();
                $Coupon = Coupon::where('coupon_code', $couponCode)->where('user_mobile', $request->user_mobile)->first();
                if($Coupon){
                    $couponCode = $this->generateCouponCode();
                    $store = new Coupon;
                    $store->user_name =$request->user_name;
                    $store->user_mobile =$request->user_mobile;
                    $store->coupon_code = $couponCode;
                    $store->save();
                }else{
                    $store = new Coupon;
                    $store->user_name =$request->user_name;
                    $store->user_mobile =$request->user_mobile;
                    $store->coupon_code = $couponCode;
                    $store->save();
                }
                return response()->json([
                    'success' => true,
                    'message' => 'Coupon code generated successfully',
                    'coupon_code' => $store->coupon_code,
                ], 200);
            }else{
                return response()->json([
                    'success' => false,
                    'message' => 'Coupon has been 5 times inserted on this number.',
                    'errors' => ''
                ], 422);
            }
            
        }
    }

    public function generateCouponCode() {
        $capitalChars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $smallChars = 'abcdefghijklmnopqrstuvwxyz';
        $numbers = '0123456789';
    
        // Shuffle and pick 4 random capital characters
        $capitalCode = substr(str_shuffle($capitalChars), 0, 4);
    
        // Shuffle and pick 4 random small characters
        $smallCode = substr(str_shuffle($smallChars), 0, 4);
    
        // Shuffle and pick 2 random numbers
        $numberCode = substr(str_shuffle($numbers), 0, 2);
    
        // Concatenate all parts together
        $couponCode = $capitalCode . $smallCode . $numberCode;
    
        // Shuffle the final code to ensure randomness
        $couponCode = str_shuffle($couponCode);
    
        return $couponCode;
    }
}
