
@extends('front.layout.app')
@section('content')

<section class="cart_page_table">
    <div class="container">
        <form action="{{route('front.checkout.store')}}" method="POST" class="check_out_from" id="check_out_from">
            <div class="row">
                <div class="col-lg-8">
                    @csrf
                    <div class="check_contact">
                        <h3>Contact Information</h3>
                        <div class="check_out">
                            <input class="check_out_input" type="text" placeholder="First Nme*" name="fname" value="{{$user->fname?$user->fname:""}}">
                            @error('fname')<p class="small text-danger mb-0">{{$message}}</p>@enderror
                            <input class="check_out_input" type="text" placeholder="Last Nme*" name="lname" value="{{$user->lname?$user->lname:""}}">
                            @error('lname')<p class="small text-danger mb-0">{{$message}}</p>@enderror
                        </div>
                        <div class="check_out">
                            <input class="check_out_input" type="email" placeholder="Email*" name="email" value="{{$user->email?$user->email:""}}">
                            @error('email')<p class="small text-danger mb-0">{{$message}}</p>@enderror
                            <input class="check_out_input" type="tel" placeholder="Contact Number*" name="mobile" value="{{$user->mobile?$user->mobile:""}}">
                            @error('mobile')<p class="small text-danger mb-0">{{$message}}</p>@enderror
                        </div>
                    </div>
                    <div class="check_contact">
                        <h3>Billing Information</h3>
                        <div class="check_out">
                            <input class="check_out_input" type="text" placeholder="Address*" name="billing_address" value="{{old('billing_address')}}">
                            @error('billing_address')<p class="small text-danger mb-0">{{$message}}</p>@enderror
                            <input class="check_out_input" type="text" placeholder="Land mark"  name="billing_landmark" value="{{old('billing_landmark')}}">
                        </div>
                        <div class="check_out">
                            <input class="check_out_input" type="text" placeholder="City*" name="billing_city" value="{{old('billing_city')}}">
                            @error('billing_city')<p class="small text-danger mb-0">{{$message}}</p>@enderror
                            <input class="check_out_input" type="text" placeholder="Pincode*" name="billing_pin" value="{{old('billing_pin')}}">
                            @error('billing_pin')<p class="small text-danger mb-0">{{$message}}</p>@enderror
                        </div>
                        <div class="check_out">
                            <input class="check_out_input" type="text" placeholder="State*" name="billing_state" value="{{old('billing_state')}}">
                            @error('billing_state')<p class="small text-danger mb-0">{{$message}}</p>@enderror
                            <input class="check_out_input" type="text" placeholder="Country*" name="billing_country" value="{{old('billing_country')}}">
                            @error('billing_country')<p class="small text-danger mb-0">{{$message}}</p>@enderror
                        </div>
                    </div>
                    <h4>Shipping Information</h4>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group mb-4">
                                <div class="form-check">
                                    <input type="hidden" name="shippingSameAsBilling" value="0">
                                    <input class="form-check-input" name="shippingSameAsBilling" type="checkbox" value="1" id="shippingaddress" 
                                    @php
                                        if (old('shippingSameAsBilling') != null) {
                                            if (old('shippingSameAsBilling') == 0) {
                                                echo '';
                                            } else {
                                                echo 'checked';
                                            }
                                        } else {
                                            echo 'checked';
                                        }
                                    @endphp
                                    >
                                    <label class="form-check-label" for="shippingaddress" >
                                        Same as Billing Address
                                    </label>
                                </div>
                            </div>
                            @error('shippingSameAsBilling')<p class="small text-danger mb-0">{{$message}}</p>@enderror
                        </div>
                    </div>
                    <div id="shiping_address" class="check_contact 
                    @php
                        if (old('shippingSameAsBilling') != null) {
                            if (old('shippingSameAsBilling') == 0) {
                                echo '';
                            } else {
                                echo 'd-none';
                            }
                        } else {
                            echo 'd-none';
                        }
                    @endphp">
                       
                        <div class="check_out">
                            <input class="check_out_input" type="text" placeholder="Address*" name="shipping_address" value="{{old('shipping_address')}}">
                            @error('shipping_address')<p class="small text-danger mb-0">{{$message}}</p>@enderror
                            <input class="check_out_input" type="text" placeholder="Land mark"  name="shipping_landmark" value="{{old('shipping_landmark')}}">
                            @error('shipping_landmark')<p class="small text-danger mb-0">{{$message}}</p>@enderror
                        </div>
                        <div class="check_out">
                            <input class="check_out_input" type="text" placeholder="City*" name="shipping_city" value="{{old('shipping_city')}}">
                            @error('shipping_city')<p class="small text-danger mb-0">{{$message}}</p>@enderror
                            <input class="check_out_input" type="text" placeholder="Pincode*" name="shipping_pin" value="{{old('shipping_pin')}}">
                            @error('shipping_pin')<p class="small text-danger mb-0">{{$message}}</p>@enderror
                        </div>
                        <div class="check_out">
                            <input class="check_out_input" type="text" placeholder="State*" name="shipping_state" value="{{old('shipping_state')}}">
                            @error('shipping_state')<p class="small text-danger mb-0">{{$message}}</p>@enderror
                            <input class="check_out_input" type="text" placeholder="Country*" name="shipping_country" value="{{old('shipping_country')}}">
                            @error('shipping_country')<p class="small text-danger mb-0">{{$message}}</p>@enderror
                        </div>
                    </div>
                    <div class="check_out_btn">
                        <input type="hidden" name="shipping_method" value="DTDC">
                        <button type="submit" class="orderplace">Place Order</button>
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
                            <div class="cart_table_shipping">
                                <div class="cart_table_total_text">
                                    <h4>Voucher Coupon</h4>
                                    <h5 class="apply_coupon">- ₹ {{number_format($user_checkout->discount_amount, 2, '.', '')}}</h5>
                                    <input type="hidden" name="discount_amount" value="{{$user_checkout->discount_amount}}">
                                </div>
                            </div>
                            <div class="cart_table_shipping">
                                <div class="cart_table_total_text">
                                    <h4>GST</h4>
                                    <h5>₹ {{number_format($user_checkout->gst_amount, 2, '.', '')}}</h5>
                                    <input type="hidden" name="tax_amount" value="{{$user_checkout->gst_amount}}">
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
                                    <input type="hidden" name="final_amount" value="{{$user_checkout->final_amount}}">
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

    <script>
        function fetchEmail() {
            alert('email>>'+$('#checkoutEmail').val());
            return $('#checkoutEmail').val();
        }
        $(document).ready(function() {
            $('#shippingaddress').change(function() {
                if ($(this).is(':checked')) {
                    $('#shiping_address').addClass('d-none');
                } else {
                    $('#shiping_address').removeClass('d-none');
                }
            });
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
