@extends('front.layout.app')
   @section('content')
   @php
       $subtotal = 0;
   @endphp
    <section class="cart_page_table">
        <div class="container">
            <form action="{{route('front.cart.add_to_checkoout')}}" method="POST" id="checkout_form">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cart_table">
                            <div class="table-responsive">
                                <table class="table  cart_table_sec">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Size</th>
                                            <th>Color</th>
                                            <th>Amount</th>
                                            <th>Voucher Coupon</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $gst_amount = 0;
                                        @endphp
                                        @if($cartProductDetails)
                                            @foreach($cartProductDetails as $item)
                                                <tr>
                                                    <td>
                                                        <div class="table_img">
                                                            <img src="{{asset($item->product_image)}}" alt="" width="30%">
                                                            <input type="hidden" name="images[]" value="{{asset($item->product_image)}}">
                                                        </div>
                                                    </td>
                                                    <td>{{$item->productDetails?$item->productDetails->name:""}}</td>
                                                    <td>{{$item->cartVariationDetails?$item->cartVariationDetails->size_name:""}}</td>
                                                    <td>{{$item->cartVariationDetails?$item->cartVariationDetails->color_name:""}}</td>
                                                    <td class="amount_b">
                                                        ₹{{$item->offer_price?$item->offer_price:$item->price}}
                                                        @php
                                                            $price = $item->offer_price?$item->offer_price:$item->price;
                                                            $gst = $item->productDetails?$item->productDetails->gst:0;
                                                           // Calculate GST amount
                                                            $gst_amount += ($price * $gst) / 100;
                                                        @endphp
                                                    </td>
                                                    <td>
                                                        <input type="hidden" name="variation[]" value="{{$item->id}}">
                                                        <select class="coupon_code" name="coupons[]">
                                                            <option value="" data-amount="0" data-id="" selected>Select coupon</option>
                                                            @foreach($couponData as $coupon)
                                                                <option value="{{$coupon->coupon_code}}" data-amount="{{$coupon->amount}}" data-id="{{$coupon->id}}">{{$coupon->coupon_code}}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0);" class="delete-btn" data-id="{{ $item->id }}" data-toggle="tooltip" title="Delete"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M3 6H5H21" stroke="#EA0029" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                                <path
                                                                    d="M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6"
                                                                    stroke="#EA0029" stroke-width="2" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                                <path d="M10 11V17" stroke="#EA0029" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                                <path d="M14 11V17" stroke="#EA0029" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @php
                                                    $subtotal = 0;
                                                    foreach($cartProductDetails as $item) {
                                                        $subtotal += $item->offer_price?$item->offer_price:$item->price;
                                                    }
                                                @endphp
                                            @endforeach
                                        @endif   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="cart_table_total">
                            <div class="cart_table_shipping">
                                <div class="cart_table_total_text">
                                    <h4>Subtotal <span>Exclude GST</span></h4>
                                    <h5>₹ <span id="sub_total">{{number_format($subtotal, 2, '.', '')}}</span></h5>
                                    <input type="hidden" name="final_sub_total" id="final_sub_total" value="0">
                                </div>
                            </div>
                            {{-- <div class="cart_table_shipping">
                                <div class="cart_table_total_text">
                                    <h4>Discount</h4>
                                    <h5 class="apply_coupon">- ₹ <span id="discount_amount">0.00</span></h5>
                                </div>
                            </div> --}}
                            {{-- <div class="cart_table_shipping">
                                <div class="cart_table_total_text">
                                    <h4>Shipping Details</h4>
                                    <h5>₹ 100</h5>
                                </div>
                                <span>Add ₹130 more for FREE Shipping.</span>
                            </div> --}}
                            <div class="cart_table_shipping">
                                <div class="cart_table_total_text">
                                    <h4>Voucher Coupon</h4>
                                    <h5 class="apply_coupon">- ₹ <span id="coupon_amount">0.00</span></h5>
                                    <input type="hidden" name="final_coupon_amount" id="final_coupon_amount" value="0">
                                </div>
                            </div>
                            <div class="cart_table_shipping">
                                <div class="cart_table_total_text">
                                    <h4>GST</h4>
                                    <h5>₹ <span id="gst_amount">{{number_format($gst_amount, 2, '.', '')}}</span></h5>
                                    <input type="hidden" name="final_gst_amount" id="final_gst_amount" value="0">
                                </div>
                            </div>
                            <div class="cart_table_shipping">
                                <div class="cart_table_total_text">
                                    <h4>Total</h4>
                                    <h5>₹ <span id="total_amount">{{number_format($subtotal, 2, '.', '')}}</span></h5>
                                    <input type="hidden" name="final_total_amount" id="final_total_amount" value="0">
                                </div>
                            </div>
                            
                        </div>
                        @if(count($cartProductDetails)>0)
                            <div class="proceed_tocheck">
                                <button type="submit" class="proceed_tocheck_btn">Proceed to Checkout</button>
                            </div>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </section>
 
    @endsection
   
   @section('script')
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

   <script>
     function CouponApply() {
            // Collect the selected value
            var selectedValue = $(this).val();
            // var discountAmount = parseFloat($('#discount_amount').text());
            var selectedAmount = $(this).find(':selected').attr('data-amount');
            selectedAmount = parseFloat(selectedAmount);
            // if (selectedAmount === 0) {
            //     var deductedDiscountAmount = discountAmount - 100;
            //     $('#discount_amount').text(deductedDiscountAmount);
            // }
            // Check if the selected value is undefined or empty
            if (!selectedValue) {
                return;
            }
            
            var alreadySelected = false;

            // Check if the value is already selected in another select
            $('.coupon_code').not(this).each(function() {
                if ($(this).val() === selectedValue) {
                    alreadySelected = true;
                    return false; // Exit the loop
                }
            });

            if (alreadySelected) {
                Swal.fire({
                    title: "This coupon is already used in another product, please select a different coupon.",
                    showClass: {
                        popup: `
                        animate__animated
                        animate__fadeInUp
                        animate__faster
                        `
                    },
                    hideClass: {
                        popup: `
                        animate__animated
                        animate__fadeOutDown
                        animate__faster
                        `
                    }
                    });
                $(this).val(''); // Reset the select to its default state
            } else {
                // Disable the selected value in all selects
                $('.coupon_code').each(function() {
                    $(this).find('option').each(function() {
                        if ($(this).val() === selectedValue) {
                            // $(this).attr('disabled', 'disabled');
                        } else {
                            // $(this).removeAttr('disabled');
                        }
                    });
                });
            }
        }

        function updateTotalDiscount() {
            var totalDiscount = 0.00;
            var coupon_amount = 0.00;
            $('.coupon_code').each(function() {
                var selectedAmount = $(this).find(':selected').attr('data-amount');
                if (selectedAmount) {
                    totalDiscount += parseFloat(selectedAmount);
                }
            });
            // $('#discount_amount').text(totalDiscount.toFixed(2)); 
            $('#coupon_amount').text(totalDiscount.toFixed(2)); 
            var coupon_amount = $('#coupon_amount').text(); 
            var gst_amount = $('#gst_amount').text(); 
            var sub_total = $('#sub_total').text(); 
            var total_amount = parseFloat(sub_total);
            var total_amount = parseFloat(sub_total)-parseFloat(coupon_amount);
            var final_amount = parseFloat(total_amount)+parseFloat(gst_amount);
            $('#total_amount').text(final_amount.toFixed(2)); 
            $('#final_sub_total').val(sub_total); 
            $('#final_coupon_amount').val(coupon_amount); 
            $('#final_gst_amount').val(gst_amount); 
            $('#final_total_amount').val(final_amount); 
        }
        $(document).ready(function() {
            $('.coupon_code').on('change', CouponApply);
            setInterval(updateTotalDiscount, 1000);
        });
       $(document).ready(function() {
           $('.delete-btn').click(function() {
               var itemId = $(this).data('id');
               Swal.fire({
                   title: 'Are you sure?',
                   text: "You won't be able to revert this!",
                   icon: 'warning',
                   showCancelButton: true,
                   confirmButtonColor: '#d33',
                   cancelButtonColor: '#3085d6',
                   confirmButtonText: 'Yes, delete it!'
               }).then((result) => {
                   if (result.isConfirmed) {
                       window.location.href = '../cart/delete/' + itemId; // Replace '/delete/' with your actual delete route
                   }
               });
           });
       });
   </script>
   @endsection