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
        if (auth()->guard('web')->check()) {
            $userId = auth()->guard('web')->user()->id;
            $user = auth()->guard('web')->user();
            $user_checkout = DB::table('checkout')->where('user_id', $userId)->first();
            return view('front.checkout.index', compact('user_checkout', 'user'));
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
        // $request->validate([
        //     'email' => 'required|email|max:255',
        //     'mobile' => 'required|integer|digits:10',
        //     'fname' => 'required|string|max:255',
        //     'lname' => 'required|string|max:255',
        //    'billing_country' => 'required|string|max:255',
        //    'billing_address' => 'required|string|max:1000',
        //    'billing_landmark' => 'nullable|string|max:255',
        //    'billing_city' => 'required|string|max:255',
        //    'billing_state' => 'required|string|max:255',
        //     'billing_pin' => 'required|string|max:255',
        //     'shippingSameAsBilling' => 'nullable|integer|digits:1',
        //     'shipping_country' => 'nullable|string|max:255',
        //     'shipping_address' => 'nullable|string|max:500',
        //     'shipping_landmark' => 'nullable|string|max:255',
        //     'shipping_city' => 'nullable|string|max:255',
        //     'shipping_state' => 'nullable|string|max:255',
        //     'shipping_pin' => 'nullable|integer|digits:6',
        //     'shipping_method' => 'nullable|string',
        // ], [
        //     'mobile.*' => 'Please enter valid 10 digit mobile number',
        //     'billing_pin.*' => 'Please enter valid 6 digit pin',
        //     'shipping_pin.*' => 'Please enter valid 6 digit pin',
        // ]);

        // $order_id = $this->checkoutRepository->create($request->except('_token'));
       // dd($order_no);
        // if ($order_id) {
        //     // return redirect()->route('front.checkout.complete')->with('success', 'Order No: '.$order_no);
        //     //return view('front.checkout.complete', compact('order_no'))->with('success', 'Thank you for you order');
        //     //return redirect('/checkout/payment/'.$order_no)->with('success', 'Please complete your payment');
        //     //return view('front.checkout.payment', compact('order_no'))->with('success', 'Please complete your payment');
        //    return redirect()->route('front.checkout.payment',$order_id)->with('success', 'Please complete your payment');
        // } else {
        //     $request->shippingSameAsBilling = 0;
            session()->flash('success', 'Operation completed successfully.');
            // return redirect()->back()->with('failure', 'Something happened. Try again.')->withInput($request->all());
            return redirect()->back();
        // }
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
}