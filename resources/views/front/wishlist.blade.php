
@extends('front.layout.app')
@section('content')
    <section class="profile_sec">
        <div class="container">
            <div class="profile_h2">
                <h4>Account Information</h4>
            </div>
            <div class="row">
            <div class="col-sm-5 col-lg-3">
                    <!-- <div class="profile_name">
                        <h4>Lux</h4>
                        <h5>Example@gmail.com</h5>
                        <h5>1234567890</h5>
                    </div> -->
                    <div class="profile_details">
                        <ul class="account-list">
                            <li>
                                <a href="{{route('front.user.profile')}}">Profile</a>
                            </li>
                            <li>
                                    <a href="{{route('front.user.order')}}">My Orders</a>
                            </li>
                            <li>
                                    <a href="{{route('front.wishlist.index')}}">My Wishlist</a>
                            </li>
                            <li>
                                <span>Credits</span>
                                <ul class="account-item">
                                    <li><a href="#">Coupons</a></li>
                                </ul>
                            </li>
                            <li class="">
                                <span>Account</span>
                                <ul class="account-item">
                                    <li><a href="#">Profile</a></li>
                                    <li><a href="#">Wishlist</a></li>
                                    <li><a href="#">Address</a></li>
                                    <li><a href="#">Logout</a></li>
                                </ul>
                            </li>
                            <li>
                                <span>Legal</span>
                                <ul class="account-item">
                                    <li><a href="#">Terms &amp; Conditions</a></li>
                                    <li><a href="#">Privacy Statement</a></li>
                                    <li><a href="#">Security</a></li>
                                    <li><a href="#">Disclaimer</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="profile_info">
                        <form action="">
                            <div class="profile_info_box">
                                <h3>Wishlist</h3>
                                @if($data)
                                @forelse($data as $item)
                                <div class="wishlist-card">
                                    <div class="wishlist-card-body">
                                        <div class="wishlist-product-card">
                                            <figure>
                                                <a href="#"><img src="{{asset($item->productDetails?$item->productDetails->image:'')}}"></a>
                                            </figure>
                                            <figcaption>
                                                <h6>Style #{{$item->productDetails?$item->productDetails->style_no:""}}</h6>
                                                <h4><a href="#">{{$item->productDetails?$item->productDetails->name:""}}</a></h4>
                                                <h5>
                                                @if($item->productDetails)    
                                                    @if($item->productDetails->offer_price > 0)
                                                        @if($item->productDetails->price != $item->productDetails->offer_price)
                                                        Price: <span class="offer_price">₹{{$item->productDetails->offer_price}}</span>
                                                    |  <del class="actual_price">₹{{$item->productDetails->price}}</del>
                                                        @else
                                                        <span class="offer_price">₹{{$item->productDetails->price}}</span>
                                                        @endif
                                                    @else
                                                    <span class="offer_price">₹{{$item->productDetails->price}}</span>
                                                    @endif
                                                    <!-- Price: <span>16,490</span> -->

                                                    | Qty: <span>1</span>
                                                @endif
                                                </h5>
                                            </figcaption>
                                        </div>
                                    </div>
                                    <div class="wishlist-card-footer">
                                        @if($item->productDetails)    
                                            <div class="row align-items-center">
                                                <div class="col-sm-6">
                                                    <a href="{{route('front.product.details',$item->productDetails->slug)}}" class="wishlist-card-text mb-0 mt-2">Click here to select
                                                        color &amp; size first</a>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="wishlist-remove_btn">
                                                        <button type="button" class="remove_btn" data-id="{{$item->id}}">Remove from
                                                            List</button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif  
                                    </div>
                                </div>
                                @empty
                                        <div class="wishlist-card">
                                            <div class="wishlist-card-body">
                                                <h4 class="text-center">No products found</h4>
                                            </div>
                                        </div>
                                    @endforelse
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
 @endsection
 
 @section('script')
 <script>
   $(document).ready(function () {
    $('.remove_btn').on('click', function () {
        var id = $(this).data('id'); // Get the data-id attribute value

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, remove it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit the form via AJAX
                $.ajax({
                    url: '{{ route("front.wishlist.remove") }}',
                    type: 'POST', // Use DELETE method for removal
                    data: {
                        id:id,
                        _token: '{{ csrf_token() }}' // Include CSRF token
                    },
                    success: function (response) {
                        // Handle success
                        Swal.fire(
                            'Deleted!',
                            'Your item has been removed from the wishlist.',
                            'success'
                        ).then(() => {
                            // Optional: Reload the page or update the UI as needed
                            window.location.reload();
                        });
                    },
                    error: function (xhr, status, error) {
                        // Handle error
                        Swal.fire(
                            'Error!',
                            'An error occurred while removing the item.',
                            'error'
                        );
                    }
                });
            }
        });
    });
});

 </script>
 @endsection