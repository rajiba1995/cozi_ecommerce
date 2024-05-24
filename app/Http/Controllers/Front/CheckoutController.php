<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Interfaces\CheckoutInterface;
use App\Interfaces\CartInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CartOffer;
use App\Models\Order;
use DB;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
class CheckoutController extends Controller
{
    public function __construct(CheckoutInterface $checkoutRepository, CartInterface $cartRepository) 
    {
        $this->checkoutRepository = $checkoutRepository;
        $this->cartRepository = $cartRepository;
    }

    public function index(Request $request)
    {
        // $data = $this->cartRepository->viewByIp();
        $userId = "";
        $order_id = "";
        
        if (auth()->guard('web')->check()) {
            $userId = auth()->guard('web')->user()->id;
            $user = auth()->guard('web')->user();
            $user_checkout = DB::table('checkout')->where('user_id', $userId)->first();
            $final_amount = $user_checkout?$user_checkout->final_amount:0;
            $final_amount = 1;
            // Order ID Generate
            $razorpayKey = env('RAZORPAY_KEY');
            $razorpaySecret = env('RAZORPAY_SECRET');

            // Prepare the data for the order
            $orderData = [
                'receipt'         => 'rcptid_' . time(),
                // 'amount'          => $request->input('amount') * 100, // amount in the smallest currency unit
                'amount'          => 1 * 100, // amount in the smallest currency unit
                'currency'        => 'INR',
                'payment_capture' => 1 // auto capture
            ];

            // Encode the order data
            $jsonData = json_encode($orderData);
            
            // Initialize cURL
            $ch = curl_init();

            // Set cURL options
            curl_setopt($ch, CURLOPT_URL, 'https://api.razorpay.com/v1/orders');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'Authorization: Basic ' . base64_encode("$razorpayKey:$razorpaySecret")
            ]);

            // Execute the cURL request
            $response = curl_exec($ch);
            // Check for errors
            if ($response === false) {
                $errorMessage = curl_error($ch);
                $order_id = "";
            }

            // Decode the response
            $responseData = json_decode($response, true);

            // Check if order creation was successful
            if (isset($responseData['id'])) {
                $order_id = $responseData['id'];
            } else {
                $order_id = "";
            }
            return view('front.checkout.index', compact('user_checkout', 'user', 'order_id', 'final_amount'));
            // $data = $this->cartRepository->viewByUserId(auth()->guard('web')->user()->id);
        }else{
            return redirect()->route('front.user.login');
       }
    }

    public function coupon(Request $request)
    {
        $couponData = $this->checkoutRepository->couponCheck($request->code);
        return $couponData;
    }

      public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'mobile' => 'required|integer|digits:10',
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
           'billing_country' => 'required|string|max:255',
           'billing_address' => 'required|string|max:1000',
           'billing_landmark' => 'nullable|string|max:255',
           'billing_city' => 'required|string|max:255',
           'billing_state' => 'required|string|max:255',
            'billing_pin' => 'required|string|max:255',
            'shippingSameAsBilling' => 'nullable|integer|digits:1',
            'shipping_country' => 'nullable|string|max:255',
            'shipping_address' => 'nullable|string|max:500',
            'shipping_landmark' => 'nullable|string|max:255',
            'shipping_city' => 'nullable|string|max:255',
            'shipping_state' => 'nullable|string|max:255',
            'shipping_pin' => 'nullable|integer|digits:6',
            'shipping_method' => 'nullable|string',
        ], [
            'mobile.*' => 'Please enter valid 10 digit mobile number',
            'billing_pin.*' => 'Please enter valid 6 digit pin',
            'shipping_pin.*' => 'Please enter valid 6 digit pin',
        ]);

        // $order_id = $this->checkoutRepository->create($request->except('_token'));
       dd($request->all());
        if ($order_id) {
            // return redirect()->route('front.checkout.complete')->with('success', 'Order No: '.$order_no);
            //return view('front.checkout.complete', compact('order_no'))->with('success', 'Thank you for you order');
            //return redirect('/checkout/payment/'.$order_no)->with('success', 'Please complete your payment');
            //return view('front.checkout.payment', compact('order_no'))->with('success', 'Please complete your payment');
           return redirect()->route('front.checkout.payment',$order_id)->with('success', 'Please complete your payment');
        } else {
            $request->shippingSameAsBilling = 0;
            session()->flash('success', 'Operation completed successfully.');
            return redirect()->back()->with('failure', 'Something happened. Try again.')->withInput($request->all());
            // return redirect()->back();
        }
    }


    public function payment(Request $request,$order_id)
    {
        //dd($order_id);
        if (auth()->guard('web')->check()) {
            $data = Order::where('id',$order_id)->orderby('id','desc')->first();
        } else {
            $data = Order::where('id',$order_id)->orderby('id','desc')->first();
            //dd($data);
        }
            if ($data) {
            return view('front.checkout.payment', compact('data'));
            }
       
    }


    public function paymentStore(Request $request)
    {
         //dd($request->all());

        $request->validate([
           
            'shipping_method' => 'nullable',
        
        ]);
		
        $order_no = $this->checkoutRepository->paymentCreate($request->order_id,$request->except('_token'));
       // dd($order_no);
        if ($order_no) {
            // return redirect()->route('front.checkout.complete')->with('success', 'Order No: '.$order_no);
            return view('front.checkout.complete', compact('order_no'))->with('success', 'Thank you for you order');
            //return view('front.checkout.payment', compact('order_no'))->with('success', 'Please complete your payment');
        } else {
            $request->shippingSameAsBilling = 0;
            return redirect()->back()->with('failure', 'Something happened. Try again.')->withInput($request->all());
        }
    }
    // New Payment Gateway
    public function createOrder(Request $request){
        // dd($request->all());
        return view('front.payment.success');
        $razorpayKey = env('RAZORPAY_KEY');
        $razorpaySecret = env('RAZORPAY_SECRET');

        // Prepare the data for the order
        $orderData = [
            'receipt'         => 'rcptid_' . time(),
            // 'amount'          => $request->input('amount') * 100, // amount in the smallest currency unit
            'amount'          => 1 * 100, // amount in the smallest currency unit
            'currency'        => 'INR',
            'payment_capture' => 1 // auto capture
        ];

        // Encode the order data
        $jsonData = json_encode($orderData);

        // Initialize cURL
        $ch = curl_init();

        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, 'https://api.razorpay.com/v1/orders');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Basic ' . base64_encode("$razorpayKey:$razorpaySecret")
        ]);

        // Execute the cURL request
        $response = curl_exec($ch);
        // Check for errors
        if ($response === false) {
            $errorMessage = curl_error($ch);
            return response()->json(['error' => $errorMessage], 500);
        }

        // Decode the response
        $responseData = json_decode($response, true);

        // Check if order creation was successful
        if (isset($responseData['id'])) {
            return response()->json([
                'orderId' => $responseData['id'],
                'amount' => $request->input('amount')
            ]);
        } else {
            return response()->json(['error' => 'Order creation failed. Please try again.'], 500);
        }
    }
    public function success(Request $request)
    {
        // Validate the request
        $signature = $request->input('razorpay_signature');
        $paymentId = $request->input('razorpay_payment_id');
        $orderId = $request->input('razorpay_order_id');

        // Verify the signature manually
        $generated_signature = hash_hmac('sha256', $orderId . '|' . $paymentId, env('RAZORPAY_SECRET'));
        dd($generated_signature);
        if ($generated_signature === $signature) {
            // Payment is successful, update your database
            // ...

            return view('payment.success', compact('paymentId'));
        } else {
            // Log detailed error information
            Log::error('Razorpay Payment Verification Failed', [
                'message' => 'Signature verification failed',
                'payment_id' => $paymentId,
                'order_id' => $orderId,
                'request' => $request->all()
            ]);

            // Payment verification failed
            return view('payment.failure', ['message' => 'Payment verification failed']);
        }
    }

    public function failure()
    {
        return view('payment.failure', ['message' => 'Payment failed or canceled.']);
    }

    public function webhook(Request $request)
    {
        $apiSecret = env('RAZORPAY_SECRET');
        $signature = $request->header('X-Razorpay-Signature');
        $payload = $request->getContent();

        $expectedSignature = hash_hmac('sha256', $payload, $apiSecret);

        if ($signature === $expectedSignature) {
            $event = $request->input('event');

            if ($event === 'payment.failed') {
                $paymentId = $request->input('payload.payment.entity.id');
                $orderId = $request->input('payload.payment.entity.order_id');
                $reason = $request->input('payload.payment.entity.error_reason');

                Log::info("Payment failed. Payment ID: $paymentId, Order ID: $orderId, Reason: $reason");

                // Optionally, update your database to mark the payment as failed
            }

            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'invalid signature'], 400);
        }
    }

}