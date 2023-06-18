<?php

namespace App\Http\Controllers;

use Bpuig\Subby\Models\Plan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function vnPay(Request $request, Plan $plan)
    {
        $planId = $plan->id;
        $planPrice = $plan->price;
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://real-estate-project-utc.test:8080/agents/profile";
        $vnp_TmnCode = env('vn_pay_tmn');//Mã website tại VNPAY
        $vnp_HashSecret = env('vn_pay_secret'); //Chuỗi bí mật

        $vnp_TxnRef = $planId . Carbon::now()->format('YmdHis'); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'thanh toán gói';
        $vnp_OrderType = 'thanh toán';
        $vnp_Amount = $planPrice * 23280 * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
//Add Params of 2.0.1 Version
//Billing
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

//var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url);
        if (isset($_POST['redirect'])) {
            $user = Auth::user();

            if ($user->subscriptions->first()==null) {
                $user->newSubscription(null, $plan, 'Tạo một đăng kí', 'Người dùng đăng kí gói này');
                $user->subscription()->syncPlanFeatures();
            } else {
                $currentPlan = $user->subscription()->plan;
                if ($currentPlan->tag === $plan->tag) {
                    // User already has the requested plan, renew the subscription
                    $user->subscription()->renew();
                } else {
                        $user->subscription()->changePlan($plan);
                }
            }
            if (!$user->hasRole('Agent')) {
                $user->syncRoles('Agent');
            }
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
    }
}
