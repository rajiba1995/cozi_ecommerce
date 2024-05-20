@extends('layouts.app')
@section('page', 'Payment')

@section('content')
<style>
    section.cart-wrapper {
        position: static;
    }
    .cart-flow li:before {
        width: calc(1200px / 3);
    }
    .readonly_select{
        background: #fff !important;
        padding: 11px 11px 12px !important;
    }
    .readonly_select.active{
        padding: 19px 11px 4px !important;
        padding-left: 7px !important
    }
    .readonly_select.active + label.floating-label{
        margin-top: -8px;
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
        -webkit-transform-origin: top left;
        -ms-transform-origin: top left;
        transform-origin: top left;
        opacity: 1;
    }
    .select2-container--default .select2-selection--single {
        padding: 7px;
        border: 1px solid #d5d5d5;
    }
	.offer__img img {
		height: 35px;
		display: block;
		margin: 15px auto 30px;
	}
</style>

<section class="cart-header mb-3 mb-sm-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h4>Shopping Checkout</h4>
            </div>
        </div>
    </div>
</section>

<section class="cart-wrapper">
    <div class="container">
        <form class="checkout-form" method="POST" action="{{route('front.checkout.payment.store')}}">@csrf
            <input type="hidden" name="order_id" value="{{$data->id}}">
            <div class="row justify-content-between flex-sm-row-reverse">
                <div class="col-md-5 col-lg-4 mb-3 mb-sm-0">
                    <h4 class="cart-heading">Cart Summary</h4>
                    <ul class="cart-summary">
                        @php
                            $subTotal = $grandTotal = $couponCodeDiscount = $shippingCharges = $taxPercent = 0;

                            // shipping charge fetch
                            $shippingChargeJSON = json_decode($settings[22]->content);
                            $minOrderAmount = $shippingChargeJSON->min_order;
                            $shippingCharge = $shippingChargeJSON->shipping_charge;
                            
                        @endphp
                        
                        
                        <li>
                           
                        </li>

                        @php
                            // subtotal calculation
                            $subTotal += (int) $data->amount;

                            // coupon code calculation
                            // if (!empty($cartData[0]->coupon_code_id)) {
                            //     $couponCodeDiscount = (int) $cartData[0]->couponDetails->amount;
                            // }

                            // coupon code calculation
                            if (!empty($data->coupon_code_id)) {
                                // 1 is coupon, else voucher
                                if (($data->couponDetails->is_coupon == 1)) {
                                    if($data->couponDetails->type == 1){
                                        $couponCodeDiscount = (int) ($subTotal * ($data->couponDetails->amount / 100));
                                    }else {
                                        $couponCodeDiscount = (int) $data->couponDetails->amount;
                                    }
                                } else {
                                    if($data->couponDetails->type == 1){
                                        $couponCodeDiscount = (int) ($subTotal * ($data->couponDetails->amount / 100));
                                    }else {
                                        $couponCodeDiscount = (int) $data->couponDetails->amount;
                                    }
                                }
                            }

                            // grand total calculation
                            $grandTotalWithoutCoupon = $subTotal;
                            $grandTotal = ($subTotal + $shippingCharges) - $couponCodeDiscount;

                            if($grandTotal < 0){
                                $grandTotal = 0;
                            }
                        @endphp

                       
                    </ul>

                    
                    {{-- cart offer --}}

                    <div class="w-100">
                        <div class="cart-total">
                            <div class="cart-total-label">
                                Subtotal
                            </div>
                            <div class="cart-total-value">
                                &#8377;<span id="subTotalAmount">{{$subTotal}}</span>
                            </div>
                            {{-- <div class="cart-total-value">
                                &#8377;{{number_format($subTotal)}}
                            </div> --}}
                        </div>

                      <div id="appliedCouponHolder" style="border-bottom: 1px solid #eee;">
                            @if (!empty($data->coupon_code_id))
                                @if ($data->couponDetails)
                                    <div class="cart-total">
                                        <div class="cart-total-label">
                                            @php
                                                if (($data->couponDetails->is_coupon == 1)) {
                                                    $typeDisplay = 'COUPON';
                                                    if($data->couponDetails->type == 1){
                                                        $amountDisplay = '- '.$data->couponDetails->amount.'%';
                                                    }else{
                                                        $amountDisplay = '- &#8377; '.$data->couponDetails->amount;
                                                    }
                                                } else {
                                                    $typeDisplay = 'VOUCHER';
                                                    if($data->couponDetails->type == 1){
                                                        $amountDisplay = '- '.$data->couponDetails->amount.'%';
                                                    }else{
                                                        $amountDisplay = '- &#8377; '.$data->couponDetails->amount;
                                                    }
                                                }
                                            @endphp
                                            {{ $typeDisplay }} APPLIED - <strong>{{$data->couponDetails->coupon_code}}</strong><br/>
                                            <a href="javascript:void(0)" onclick="removeAppliedCoupon()"><small class="text-danger">Remove this {{ ($data->couponDetails->is_coupon == 1) ? 'coupon' : 'voucher' }}</small></a>
                                        </div>
                                        <div class="cart-total-value">{!! $amountDisplay !!}</div>
                                    </div>
                                @endif
                            @endif
                        </div>

                        <div class="cart-total-label mt-3 mb-3">
                            Shipping Method
                        </div>
                        <ul class="checkout-meta mb-2">
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="shipping_method" id="flexRadioDefault1" value="standard" checked>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Standard
                                    </label>
                                </div>
                            </li>
                            {{-- <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="shipping_method" id="flexRadioDefault2" value="standard_cod">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Standard Shipping (Cash on Delivery)
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="shipping_method" id="flexRadioDefault3" value="express">
                                    <label class="form-check-label" for="flexRadioDefault3">
                                        Express
                                    </label>
                                </div>
                            </li> --}}
                        </ul>

                        <div class="cart-total">
                            <div class="cart-total-label">
                                Shipping Charges
                                <span id="shippingMore"></span>
                            </div>
                            <div class="cart-total-value">
                                @php
                                   // if ((int) $minOrderAmount >= (int) $grandTotal ) {
								    if($data->address_type=='ho'){
                                        $shippingCharges = 0;
                                    }else if($data->address_type=='dankuni'){
                                        $shippingCharges = 0;
                                    }else{
                                        $shippingCharges = $data->shipping_charges;
                                    }
                                    $grandTotal = $grandTotal + $shippingCharges;
                                     //   $shippingCharges = $shippingCharge;
                                       // $grandTotal = $grandTotal + $shippingCharges;
                                    
                                @endphp
                                &#8377;{{$shippingCharges}}
                            </div>
                        </div>
                        {{-- <div class="cart-total">
                            <div class="cart-total-label">
                                Tax and Others - <strong>{{$taxPercent}}%</strong><br/>
                                <small>(Inclusive of all taxes)</small>
                            </div>
                            <div class="cart-total-value"></div>
                        </div> --}}

                        <div class="cart-total">
                            <div class="cart-total-label">
                                Total
                            </div>
                            <div class="cart-total-value">
                                <input type="hidden" value="{{$grandTotalWithoutCoupon}}" name="grandTotalWithoutCoupon">
                                &#8377;<span id="displayGrandTotal">{{number_format($grandTotal)}}</span>
                            </div>
                        </div>
                        {{-- <div class="cart-total-label mt-3 mb-3">
                            Payment Method
                        </div>
                        <ul class="checkout-meta mb-2">
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_method" id="payment_method_cod" value="cash_on_delivery" checked>
                                    <label class="form-check-label" for="payment_method_cod">
                                        Cash on Delivery (COD)
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_method" id="payment_method_online" value="online_payment">
                                    <label class="form-check-label" for="payment_method_online">
                                        Razorpay (Cards, UPI, NetBanking, Wallets, Paypal)
                                    </label>
                                </div>
                            </li>
                        </ul> --}}

                        {{-- <div class="col-sm-12">
                            <ul class="cart-summary-list">
                                <li>
                                    <img src="img/delivery-truck.png" />
                                    <h5><span>&#8377;60</span> Apply Below order &#8377;499</h5>
                                    <a href="{{route('front.content.shipping')}}">See all Shipping charges and policies</a>
                                </li>
                                <li>
                                    <img src="img/coupon.png" />
                                    <div class="coupon-block">
                                        <input type="text" class="coupon-text" name="couponText" id="couponText" placeholder="Enter coupon code here">
                                        <button id="applyCouponBtn">Apply</button>
                                    </div>
                                    @error('lname')<p class="small text-danger mb-0 mt-2">{{$message}}</p>@enderror
                                    <a href="{{route('front.user.coupon')}}" class="d-inline-block mt-2">Get latest coupon from here</a>
                                </li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
                <div class="col-md-7 col-lg-6">
                  
                    <h4 class="cart-heading mt-4">Select a payment method</h4>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group custom_radio">
                                <input type="radio" name="paymentMethod" id="cod" value="1">
                                <label for="cod">Cash on delivery</label>
                            </div>
                        </div>
                        @if($data->final_amount != 0)
                        <div class="col-12">
                            <div class="form-group custom_radio">
                                <input type="radio" name="paymentMethod" id="online" value="2">
                                <label for="online">Pay online</label>
                            </div>
                        </div>
                        @endif
                    </div>

                    <div class="row align-items-center justify-content-between">
                        <div class="col-sm-12">
                            <input type="hidden" name="mobile" id="checkoutMobile" value="{{$data->mobile}}">
                            <input type="hidden" name="email" id="checkoutEmail" value="{{$data->email}}">
                            <input type="hidden" name="payment_method" value="cash_on_delivery">
                            <input type="hidden" name="razorpay_payment_id" value="">
                            <input type="hidden" name="razorpay_amount" value="">
                            <input type="hidden" name="razorpay_method" value="">
                            <input type="hidden" name="razorpay_callback_url" value="">
                            <div id="method1" class="method">
                                <button type="submit" class="btn checkout-btn">
                                    Place order
                                    <!-- <p class="small mb-0" style="font-weight: 800">Cash on delivery</p> -->
                                </button>
                            </div>
                            @if($data->final_amount != 0)
                            <!-- <strong>OR</strong> -->
                            <div id="method2" class="method">
                                <button type="button" id="rzp-button1" class="btn checkout-btn">
                                    Pay Online
                                    <!-- <p class="small mb-0" style="font-weight: 800">Secure payment</p> -->
                                </button>
                            </div>
                            @endif
                        </div>
                        <div class="col-sm-12 mt-3 mt-sm-0">
                            <a href="{{route('front.cart.index')}}">Return to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<div class="modal fade seeDetailsModal" id="userOfferModal" tabindex="-1" aria-labelledby="userOfferModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row justify-content-center text-center" id="offerContent">
                    <div class="col-12 col-md-10"><h5></h5></div>
                    <div class="col-12 text-center">
                        <img src="" alt="">
                    </div>
                    <div class="col-12">
                        <button class="btn ok-btn" data-bs-dismiss="modal">close</button>   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        function fetchEmail() {
            alert('email>>'+$('#checkoutEmail').val());
            return $('#checkoutEmail').val();
        }

        $(document).on('click', '#rzp-button1', function(e) {
            e.preventDefault();
            alert();
            //$('.checkout-form').submit();
            // razorpay payment options
            var paymentOptions = {
                // "key": "rzp_test_FUwg5zjKBrNRVm",
                "key": "{{ $settings[20]->content }}",
                "amount": '{{intval($grandTotal*100)}}',
                "currency": "INR",
                "name": "ONN",
                "description": "Online payment",
                "image": "{{asset('img/logo-square.png')}}",
                // "order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                // "customer": {
                //     // "name": document.getElementById('checkoutEmail').value,
                //     // "contact": document.getElementById('checkoutMobile').value,
                //     // "email": document.getElementById('checkoutEmail').value

                //     "name": $('#checkoutFname').val()+' '+$('#checkoutLname').val(),
                //     "email": $('#checkoutEmail').val(),
                //     "contact": $('#checkoutMobile').val()

                //     // "contact": '9038775709',
                //     // "email": 'bardhansuvajit@gmail.com'
                // },
                // customer: {
                //     name: "Gaurav Kumar",
                //     contact: "919999999999",
                //     email: "gaurav.kumar@example.com"
                // },
                "handler": function (response){
                     console.log(response);
                    $('input[name="payment_method"]').val('online_payment');
                    $('input[name="razorpay_payment_id"]').val(response.razorpay_payment_id);
                   
                    $('.checkout-form').submit();

                    /* alert(response.razorpay_payment_id);
                    alert(response.razorpay_order_id);
                    alert(response.razorpay_signature) */
                },
                // "callback_url": "{{route('front.checkout.store')}}",
                "prefill": {
                    // "name": $('#checkoutFname').val()+' '+$('#checkoutLname').val(),
                    // "email": document.getElementById('checkoutEmail').value,
                    // "contact": document.getElementById('checkoutMobile').value,

                    // name: "Gaurav Kumar",
                    // contact: "919038775709",
                    // email: "test@email.com"

                    // "email": fetchEmail(),
                    "email": $('#checkoutEmail').val(),
                    "contact": $('#checkoutMobile').val()
                },
                "notes": {
                    "address": "Razorpay Corporate Office"
                },
            };

            var rzp1 = new Razorpay(paymentOptions);

            rzp1.on('payment.failed', function (response){
                // alert('OOPS ! something happened');
                toastFire('info', 'Something happened');

                /* alert(response.error.code);
                alert(response.error.description);
                alert(response.error.source);
                alert(response.error.step);
                alert(response.error.reason);
                alert(response.error.metadata.order_id);
                alert(response.error.metadata.payment_id); */
            });

            // check details before paying online
            function checkoutDetailsExists() {
                const mobilelength = $('input[name="mobile"]').val().length
                 console.log(mobilelength)
                if ($('input[name="email"]').val() == "") {
                    $('input[name="email"]').css('borderColor', '#c1080a').focus()
                    toastFire('warning', 'Enter email address')
                    return false;
                } else if ($('input[name="mobile"]').val() == "" || $('input[name="mobile"]').val().length !== 10) {
                    $('input[name="mobile"]').css('borderColor', '#c1080a').focus()
                    toastFire('warning', 'Enter valid 10 digit mobile number')
                    return false;
                } else {
                    return true;
                }
            }

            
                
            if (checkoutDetailsExists()) {
                // let chekoutAmount = getCookie('checkoutAmount');
                // alert('mobile>>'+$('#checkoutMobile').val());
                // alert('email>>'+$('#checkoutEmail').val());
                rzp1.open();
            }
            
        });

        /*
        document.getElementById('rzp-button1').onclick = function(e){
            e.preventDefault();
            if (checkoutDetailsExists()) {
                // let chekoutAmount = getCookie('checkoutAmount');
                rzp1.open();
            }
        }
        */

       
        
       
    </script>
@endsection
