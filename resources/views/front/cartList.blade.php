@extends('front.layout.app')
   @section('content')
    <section class="cart_page_table">
        <div class="container">
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
                                    @if($cartProductDetails)
                                        @foreach($cartProductDetails as $item)
                                            <tr>
                                                <td>
                                                    <div class="table_img">
                                                        <img src="{{asset($item->product_image)}}" alt="" width="30%">
                                                    </div>
                                                </td>
                                                <td>{{$item->productDetails?$item->productDetails->name:""}}</td>
                                                <td>{{$item->cartVariationDetails?$item->cartVariationDetails->size_name:""}}</td>
                                                <td>{{$item->cartVariationDetails?$item->cartVariationDetails->color_name:""}}</td>
                                                <td class="amount_b">₹{{$item->offer_price}}</td>
                                                <td>
                                                    <select class="coupon_code" onchange="CouponApply()">
                                                        <option value="" selected hidden></option>
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
                                                    $subtotal += $item->offer_price;
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
                                <h4>Subtotal</h4>
                                <h5>₹ {{number_format($subtotal, 2, '.', '')}}</h5>
                            </div>
                        </div>
                        <div class="cart_table_shipping">
                            <div class="cart_table_total_text">
                                <h4>Discount</h4>
                                <h5 class="apply_coupon">- ₹ <span id="discount_amount">0.00</span></h5>
                            </div>
                        </div>
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
                            </div>
                        </div>
                        <div class="cart_table_shipping">
                            <div class="cart_table_total_text">
                                <h4>Total <span>Exclude GST</span></h4>
                                <h5>₹ <span id="total_amount">{{number_format($subtotal, 2, '.', '')}}</span></h5>
                            </div>
                        </div>
                    </div>
                    
                    <div class="proceed_tocheck">
                        <a href="#" class="proceed_tocheck_btn">Proceed to Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
 
    @endsection
   
   @section('script')
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

   <script>
    function CouponApply() {
        // Collect all selected values
        var selectedValues = $('select.coupon_code').map(function() {
            return $(this).val();
        }).get();
        alert(selectedValues);
        // Disable the selected values in all selects
        $('select.coupon_code option').each(function() {
            if (selectedValues.includes($(this).val())) {
                $(this).attr('disabled', 'disabled');
            } else {
                $(this).removeAttr('disabled');
            }
        });

        // Re-select the previously selected options to maintain their state
        $('select.coupon_code').each(function() {
            var selectedValue = $(this).val();
            if (selectedValue) {
                $(this).val(selectedValue);
            }
        });
    }

    // $(document).ready(function() {
    //     // Initialize the function to disable options based on initial selection
    //     CouponApply();
    // });

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