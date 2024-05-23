
@extends('front.layout.app')
@section('content')
<style>
    .check_out_input {
        width: 280px;
        height: 45px;
        border: 1px solid #a0a0a0;
        outline: none;
        padding: 5px 10px;
        font-size: 15px;
        font-weight: 400;
        color: #636363;
        margin-top: 20px !important;
        margin-bottom:0%;
        margin-right: 20px;
        border-radius: 4px;
    }
    .error{
        color: red;
        font-size: 14px;
    }
</style>
<section class="cart_page_table">
    <div class="container">
        {{-- <form action="{{route('front.checkout.store')}}" method="POST" class="check_out_from" id="paymentForm"> --}}
        <form class="check_out_from" id="paymentForm" >
            <div class="row">
                <div class="col-lg-8">
                    @csrf
                    <div class="row">
                        <div class="check_out col-md-4 col-12">
                            <input class="check_out_input" type="text" placeholder="First Name*" name="fname" value="{{$user->fname ?? ''}}">
                            {{-- @error('fname')<p class="small text-danger mb-0">{{$message}}</p>@enderror --}}
                        </div>
                        <div class="check_out col-md-4 col-12">
                            <input class="check_out_input" type="text" placeholder="Last Name*" name="lname" value="{{$user->lname ?? ''}}">
                            {{-- @error('lname')<p class="small text-danger mb-0">{{$message}}</p>@enderror --}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="check_out col-md-4 col-12">
                            <input class="check_out_input" type="email" placeholder="Email*" name="email" value="{{$user->email ?? ''}}">
                            {{-- @error('email')<p class="small text-danger mb-0">{{$message}}</p>@enderror --}}
                        </div>
                        <div class="check_out col-md-4 col-12">
                            <input class="check_out_input" type="tel" placeholder="Contact Number*" name="mobile" value="{{$user->mobile ?? ''}}">
                            {{-- @error('mobile')<p class="small text-danger mb-0">{{$message}}</p>@enderror --}}
                        </div>
                    </div>
                    <div class="check_contact mt-4">
                        <h3>Billing Information</h3>
                        <div class="row">
                            <div class="check_out col-md-4 col-12">
                                <input class="check_out_input" type="text" placeholder="Address*" name="billing_address" value="{{$user->billing_address ?? 'ghatal'}}">
                                {{-- @error('billing_address')<p class="small text-danger mb-0">{{$message}}</p>@enderror --}}
                            </div>
                            <div class="check_out col-md-4 col-12">
                                <input class="check_out_input" type="text" placeholder="Land mark" name="billing_landmark" value="{{$user->billing_landmark ?? ''}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="check_out col-md-4 col-12">
                                <input class="check_out_input" type="text" placeholder="City*" name="billing_city" value="{{$user->billing_city ?? 'Medinipur'}}">
                                {{-- @error('billing_city')<p class="small text-danger mb-0">{{$message}}</p>@enderror --}}
                            </div>
                            <div class="check_out col-md-4 col-12">
                                <input class="check_out_input" type="text" placeholder="Pincode*" name="billing_pin" value="{{$user->billing_pin ?? '721222'}}">
                                {{-- @error('billing_pin')<p class="small text-danger mb-0">{{$message}}</p>@enderror --}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="check_out col-md-4 col-12">
                                <input class="check_out_input" type="text" placeholder="State*" name="billing_state" value="WEST BENGAL">
                                {{-- @error('billing_state')<p class="small text-danger mb-0">{{$message}}</p>@enderror --}}
                            </div>
                            <div class="check_out col-md-4 col-12">
                                <input class="check_out_input" type="text" placeholder="Country*" name="billing_country" value="{{$user->billing_country ?? 'INDIA'}}">
                                {{-- @error('billing_country')<p class="small text-danger mb-0">{{$message}}</p>@enderror --}}
                            </div>
                        </div>
                    </div>
                    <h4>Shipping Information</h4>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group mb-4">
                                <div class="form-check">
                                    <input type="hidden" name="shippingSameAsBilling" value="0">
                                    <input class="form-check-input" name="shippingSameAsBilling" type="checkbox" value="1" id="shippingaddress" checked>
                                    <label class="form-check-label" for="shippingaddress">
                                        Same as Billing Address
                                    </label>
                                </div>
                            </div>
                            {{-- @error('shippingSameAsBilling')<p class="small text-danger mb-0">{{$message}}</p>@enderror --}}
                        </div>
                    </div>
                    <div id="shipping_address" class="check_contact d-none">
                        <div class="row">
                            <div class="check_out col-md-4 col-12">
                                <input class="check_out_input" type="text" placeholder="Address*" name="shipping_address" value="{{$user->shipping_address ?? ''}}">
                                {{-- @error('shipping_address')<p class="small text-danger mb-0">{{$message}}</p>@enderror --}}
                            </div>
                            <div class="check_out col-md-4 col-12">
                                <input class="check_out_input" type="text" placeholder="Land mark" name="shipping_landmark" value="{{$user->shipping_landmark ?? ''}}">
                                {{-- @error('shipping_landmark')<p class="small text-danger mb-0">{{$message}}</p>@enderror --}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="check_out col-md-4 col-12">
                                <input class="check_out_input" type="text" placeholder="City*" name="shipping_city" value="{{$user->shipping_city ?? ''}}">
                                {{-- @error('shipping_city')<p class="small text-danger mb-0">{{$message}}</p>@enderror --}}
                            </div>
                            <div class="check_out col-md-4 col-12">
                                <input class="check_out_input" type="text" placeholder="Pincode*" name="shipping_pin" value="{{$user->shipping_pin ?? ''}}">
                                {{-- @error('shipping_pin')<p class="small text-danger mb-0">{{$message}}</p>@enderror --}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="check_out col-md-4 col-12">
                                <input class="check_out_input" type="text" placeholder="State*" name="shipping_state" value="{{$user->shipping_state ?? ''}}">
                                {{-- @error('shipping_state')<p class="small text-danger mb-0">{{$message}}</p>@enderror --}}
                            </div>
                            <div class="check_out col-md-4 col-12">
                                <input class="check_out_input" type="text" placeholder="Country*" name="shipping_country" value="{{$user->shipping_country ?? ''}}">
                                {{-- @error('shipping_country')<p class="small text-danger mb-0">{{$message}}</p>@enderror --}}
                            </div>
                        </div>
                    </div>

                    <div class="check_out_btn">
                        <input type="hidden" name="shipping_method" value="standard">
                        <input type="hidden" name="payment_method" value="">
                        <input type="hidden" name="razorpay_payment_id" value="">
                        <input type="hidden" name="razorpay_amount" value="">
                        <input type="hidden" name="razorpay_method" value="">
                        <input type="hidden" name="razorpay_callback_url" value="">
                        <button type="submit" class="orderplace" id="orderplace">Place Order</button>
                        <a href="{{route('front.cart.index')}}" class="orderreturn">Return to Cart</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    @if($user_checkout)
                        <div class="cart_table_total">
                            <div class="cart_table_shipping">
                                <div class="cart_table_total_text">
                                    <h4>Subtotal</h4>
                                    <h5>₹ {{number_format($user_checkout->sub_total_amount, 2, '.', '')}}</h5>
                                    <input type="hidden" name="amount" value="{{$user_checkout->sub_total_amount}}">
                                </div>
                            </div>
                            {{-- <div class="cart_table_shipping">
                                <div class="cart_table_total_text">
                                    <h4>Discount</h4>
                                    <h5 class="apply_coupon">- ₹ {{number_format($user_checkout->discount_amount, 2, '.', '')}}</h5>
                                </div>
                            </div> --}}
                            {{-- <div class="cart_table_shipping">
                                <div class="cart_table_total_text">
                                    <h4>Shipping Details</h4>
                                    <h5>₹ 130</h5>
                                </div>
                                <span>Add ₹130 more for FREE Shipping.</span>
                            </div> --}}
                            {{-- <div class="cart_table_shipping">
                                <div class="cart_table_total_text">
                                    <h4>GST</h4>
                                    <h5>₹ {{number_format($user_checkout->gst_amount, 2, '.', '')}}</h5>
                                    <input type="hidden" name="tax_amount" value="{{$user_checkout->gst_amount}}">
                                </div>
                            </div> --}}
                            <div class="cart_table_shipping">
                                <div class="cart_table_total_text">
                                    <h4>Voucher Coupon</h4>
                                    <h5 class="apply_coupon">- ₹ {{number_format($user_checkout->discount_amount, 2, '.', '')}}</h5>
                                    <input type="hidden" name="discount_amount" value="{{$user_checkout->discount_amount}}">
                                </div>
                            </div>
                           
                            {{-- <div class="cart_table_shipping">
                                <div class="cart_table_total_text">
                                    <h4>SGST</h4>
                                    <h5>100</h5>
                                </div>
                            </div> --}}
                            <div class="cart_table_shipping">
                                <div class="cart_table_total_text">
                                    <h4>Total</h4>
                                    <h5>₹ {{number_format($user_checkout->final_amount, 2, '.', '')}}</h5>
                                    <input type="hidden" name="final_amount" id="final_amount" value="{{$user_checkout->final_amount}}">
                                    <input type="hidden" name="id" value="{{$user_checkout->id}}">
                                </div>
                            </div>
                        </div>
                    @endif
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    
    <script>
       $(document).ready(function() {
            $('#shippingaddress').change(function() {
                if ($(this).is(':checked')) {
                    $('#shipping_address').addClass('d-none');
                    $('#shipping_address input').val('');
                } else {
                    $('#shipping_address').removeClass('d-none');
                }
            });
            // Define the validation rules and messages
            $('#paymentForm').validate({
                rules: {
                    fname: {
                        required: true
                    },
                    lname: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    mobile: {
                        required: true,
                        digits: true,
                        minlength: 10,
                        maxlength: 10
                    },
                    billing_address: {
                        required: true
                    },
                    billing_city: {
                        required: true
                    },
                    billing_pin: {
                        required: true,
                        digits: true,
                        minlength: 6,
                        maxlength: 6
                    },
                    billing_state: {
                        required: true
                    },
                    billing_country: {
                        required: true
                    },
                    shipping_address: {
                        required: function() {
                            return !$('#shippingaddress').is(':checked');
                        }
                    },
                    shipping_city: {
                        required: function() {
                            return !$('#shippingaddress').is(':checked');
                        }
                    },
                    shipping_pin: {
                        required: function() {
                            return !$('#shippingaddress').is(':checked');
                        },
                        digits: true,
                        minlength: function() {
                            return !$('#shippingaddress').is(':checked') ? 6 : 0;
                        },
                        maxlength: function() {
                            return !$('#shippingaddress').is(':checked') ? 6 : 0;
                        }
                    },
                    shipping_state: {
                        required: function() {
                            return !$('#shippingaddress').is(':checked');
                        }
                    },
                    shipping_country: {
                        required: function() {
                            return !$('#shippingaddress').is(':checked');
                        }
                    }
                },
                messages: {
                    fname: {
                        required: "Please enter your first name"
                    },
                    lname: {
                        required: "Please enter your last name"
                    },
                    email: {
                        required: "Please enter your email",
                        email: "Please enter a valid email address"
                    },
                    mobile: {
                        required: "Please enter your contact number",
                        digits: "Please enter only digits",
                        minlength: "Contact number should be 10 digits",
                        maxlength: "Contact number should be 10 digits"
                    },
                    billing_address: {
                        required: "Please enter your billing address"
                    },
                    billing_city: {
                        required: "Please enter your billing city"
                    },
                    billing_pin: {
                        required: "Please enter your billing pincode",
                        digits: "Please enter only digits",
                        minlength: "Pincode should be 6 digits",
                        maxlength: "Pincode should be 6 digits"
                    },
                    billing_state: {
                        required: "Please enter your billing state"
                    },
                    billing_country: {
                        required: "Please enter your billing country"
                    },
                    shipping_address: {
                        required: "Please enter your shipping address"
                    },
                    shipping_city: {
                        required: "Please enter your shipping city"
                    },
                    shipping_pin: {
                        required: "Please enter your shipping pincode",
                        digits: "Please enter only digits",
                        minlength: "Pincode should be 6 digits",
                        maxlength: "Pincode should be 6 digits"
                    },
                    shipping_state: {
                        required: "Please enter your shipping state"
                    },
                    shipping_country: {
                        required: "Please enter your shipping country"
                    }
                },
                submitHandler: function(form) {
                    // Perform the AJAX request if form is valid
                    var amount = $('#final_amount').val();
                    var email = $('input[name=email]').val();
                    var mobile = $('input[name=mobile]').val();
                    var fname = $('input[name=fname]').val();
                    var lname = $('input[name=lname]').val();
                    $('#orderplace').prop('disabled', true);
                    $('#orderplace').text('Please wait..');

                    // Merge fname and lname into a full name
                    var fullName = fname + ' ' + lname;
                    $.ajax({
                        url: '{{ route("front.payment.createOrder") }}',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            amount: amount
                        },
                        success: function(data) {
                            $('#orderplace').prop('disabled', false);
                            $('#orderplace').text('Place Order');
                            if (data.orderId) {
                                var options = {
                                    "key": "{{ env('RAZORPAY_KEY') }}",
                                    "amount": data.amount * 100,
                                    "currency": "INR",
                                    "name": "LUX Industries Limited",
                                    "description": "Test Transaction",
                                    "image": "https://techmantra.co/dev/cozi-ecommerce/public/images/cozi-payment.png",
                                    "order_id": data.orderId,
                                    "handler": function (response){
                                        $.post('{{ route("front.payment.success") }}', {
                                            _token: '{{ csrf_token() }}',
                                            razorpay_payment_id: response.razorpay_payment_id,
                                            razorpay_order_id: response.razorpay_order_id,
                                            razorpay_signature: response.razorpay_signature
                                        }).done(function() {
                                            window.location.href = '{{ route("front.payment.success") }}';
                                        }).fail(function() {
                                            window.location.href = '{{ route("front.payment.failure") }}';
                                        });
                                    },
                                    "prefill": {
                                        "name": fullName,
                                        "email": email,
                                        "contact": mobile
                                    },
                                    "notes": {
                                        "address": "Razorpay Corporate Office"
                                    },
                                    "theme": {
                                        "color": "#050e9e"
                                    }
                                };
                                var rzp1 = new Razorpay(options);
                                rzp1.on('payment.failed', function (response){
                                    alert(response.error.code);
                                    alert(response.error.description);
                                    alert(response.error.source);
                                    alert(response.error.step);
                                    alert(response.error.reason);
                                    alert(response.error.metadata.order_id);
                                    alert(response.error.metadata.payment_id);
                                });
                                rzp1.open();
                            } else {
                                alert('Order creation failed. Please try again.');
                            }
                        }
                    });
                }
            });
        });
        function fetchEmail() {
            alert('email>>'+$('#checkoutEmail').val());
            return $('#checkoutEmail').val();
        }
        
        /*
        document.getElementById('rzp-button1').onclick = function(e){
            e.preventDefault();
            if (checkoutDetailsExists()) {
                // let chekoutAmount = getCookie('checkoutAmount');
                rzp1.open();
            }
        }
        */

        // billing pinode detail fetch
        $('input[name="billing_pin"]').on('keyup', ()=>{
            var pincode = $('input[name="billing_pin"]').val();

            if (pincode.length == 6) {
                toastFire('info', 'Please wait...');
                $('input[name="billing_pin"]').css('borderColor', '#4caf50').css('boxShadow', '0 0 0 0.2rem #4caf5057');

                $.ajax({
                    url: 'https://api.postalpincode.in/pincode/'+pincode,
                    method: 'GET',
                    success: function(result){
                        if(result[0].Message != 'No records found') {
                            // state & country added
                            $('input[name="billing_state"]').val(result[0].PostOffice[0].State);
                            $('input[name="billing_country"]').val(result[0].PostOffice[0].Country);

                            // fetch city
                            $.ajax({
                                url: "{{url('/')}}/state/"+result[0].PostOffice[0].State+"/detail",
                                type: 'GET',
                                success: function(result) {
                                    let content = `
                                    <select class="form-control readonly_select active" name="billing_city" readonly>`;

                                        $.each(result.data, (key, value) => {
                                            content += `<option value="${value.city_name}">${value.city_name}</option>`;
                                        });

                                    content += `</select>
                                    <label class="floating-label">City *</label>
                                    `;

                                    $('#loadCities').html(content);
                                    $('.readonly_select.active').select2();
                                    // console.log(result);
                                }
                            });

                            // $('input[name="billing_city"]').val(result[0].PostOffice[0].District);
                        } else {
                            toastFire('warning', 'Enter valid pincode');
                            $('input[name="billing_pin"]').css('borderColor', 'red').css('boxShadow', '0 0 0 0.2rem #dc34345c');
                            $('input[name="billing_state"]').val('');
                            $('input[name="billing_country"]').val('');
                            $('input[name="billing_city"]').val('');
                        }
                    }
                });
                swal.close();
            } else {
                $('input[name="billing_pin"]').css('borderColor', 'red').css('boxShadow', '0 0 0 0.2rem #dc34345c');
				$('input[name="billing_state"]').val('');
				$('input[name="billing_country"]').val('');
                $('input[name="billing_city"]').val('');
            }
        });

        // shipping pinode detail fetch
        $('input[name="shipping_pin"]').on('keyup', ()=>{
            var pincode = $('input[name="shipping_pin"]').val();

            if (pincode.length == 6) {
                toastFire('info', 'Please wait...');
                $('input[name="shipping_pin"]').css('borderColor', '#4caf50').css('boxShadow', '0 0 0 0.2rem #4caf5057');

                $.ajax({
                    url: 'https://api.postalpincode.in/pincode/'+pincode,
                    method: 'GET',
                    success: function(result){
                        if(result[0].Message != 'No records found'){
                            $('input[name="shipping_state"]').val(result[0].PostOffice[0].State);
                            $('input[name="shipping_country"]').val(result[0].PostOffice[0].Country);
                            $('input[name="shipping_city"]').val(result[0].PostOffice[0].District);
                        } else {
                            toastFire('warning', 'Enter valid pincode');
                            $('input[name="shipping_pin"]').css('borderColor', 'red').css('boxShadow', '0 0 0 0.2rem #dc34345c');
                            $('input[name="shipping_state"]').val('');
                            $('input[name="shipping_country"]').val('');
                            $('input[name="shipping_city"]').val('');
                        }
                    }
                });
                swal.close();
            } else {
                $('input[name="shipping_pin"]').css('borderColor', 'red').css('boxShadow', '0 0 0 0.2rem #dc34345c');
				$('input[name="shipping_state"]').val('');
				$('input[name="shipping_country"]').val('');
                $('input[name="shipping_city"]').val('');
            }
        });
    </script>
@endsection
