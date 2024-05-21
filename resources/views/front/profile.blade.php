@extends('front.layout.app')
   @section('content')

    <section class="profile_sec">
        <div class="container">
            <div class="profile_h2">
                <h4>Account Information</h4>
            </div>
            
                    <div class="col-lg-10 col-md-8 col-12">
                        @if (Session::get('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif
                        @if (Session::get('failure'))
                            <div class="alert alert-danger">{{Session::get('failure')}}</div>
                        @endif
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
                        <form action="{{ route('front.user.manage.update') }}" method="post">
                            @csrf
                            <div class="profile_info_box">
                                <h3>Edit Profile</h3>
                                <div class="row">
                                    <div class="col-sm-12 col-lg-6">
                                        <div class="from_group">
                                            <input type="text" class="form-control from_group_in" placeholder="First Name" name="fname"
                                                value="{{Auth::guard('web')->user()->fname}}" required>
                                            @error('fname')
                                                <p class="small text-danger">{{$message}}</p>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-sm-12 col-lg-6">
                                        <div class="from_group">
                                            <input type="text" class="form-control from_group_in" placeholder="Last Name" name="lname"
                                                value="{{Auth::guard('web')->user()->lname}}" required>
                                                @error('lname')
                                                <p class="small text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-lg-6">
                                        <div class="from_group">
                                            <input type="email" class="form-control from_group_in" placeholder="Email Address" name="email"
                                                value="{{Auth::guard('web')->user()->email}}" required>
                                                @error('email')
                                                <p class="small text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-lg-6">
                                        <div class="from_group">
                                            <input type="tel" class="form-control from_group_in" placeholder="Mobile No" name="mobile"
                                                value="{{Auth::guard('web')->user()->mobile}}" required>
                                                @error('mobile')
                                                <p class="small text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="{{Auth::guard('web')->user()->id}}"/>
                                <div class="profile_info_button">
                                    <button type="submit" class="btn checkout-btn">Update Details</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="profile_info">
                        <form action="{{route('front.user.password.update')}}" method="post">
                            @csrf
                            <div class="profile_info_box">
                                <h3>Change Password</h3>
                                <div class="row">
                                    <div class="col-sm-12 col-lg-6">
                                        <div class="from_group">
                                            <input type="password" class="form-control from_group_in" name="old_password"
                                                placeholder="Old Password" required>
                                            @error('old_password')
                                                <p class="small text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-lg-6">
                                        <div class="from_group">
                                            <input type="password" class="form-control from_group_in" name="new_password"
                                                placeholder="New Password" required>
                                            @error('new_password')
                                                <p class="small text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-lg-6">
                                        <div class="from_group">
                                            <input type="password" class="form-control from_group_in" name="confirm_password"
                                                placeholder="Confirm Password" required>
                                            @error('confirm_password')
                                                <p class="small text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="{{Auth::guard('web')->user()->id}}">
                                <div class="profile_info_button">
                                    <button type="submit" class="btn checkout-btn">Update Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
   
   @section('script')

   @endsection