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
                                <a href="{{route('front.user.profile')}}">profile</a>
                            </li>
                            <li>
                                    <a href="{{route('front.user.order')}}">My Orders</a>
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
                        <div class="profile_info_box">
                            <h3>Order Details</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered custom-table">
                                    <thead>
                                      <tr>
                                        <th>Order</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Total</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                       @if($data) 
                                       @foreach($data as $item)
                                      <tr>
                                        <td>{{$item->order_no}}</td>
                                        <td>June 15, 2024</td>
                                        <td>Complete</td>
                                        <td>Rs 2000 for 5 items</td>
                                    </tr>
                                    @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
   
   @section('script')

   @endsection