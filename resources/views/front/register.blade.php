@extends('front.layout.app')

@section('page-title', 'login')

@section('content')
<section class="login_sec">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="login_register">
                    <form action="{{route('front.user.create')}}" method="post" class="from_login">
                        @csrf
                        <h4>Register Now</h4>
                        <div class="log_in_from">
                            <input class="log_in_from_input" name="mobile" type="tel" placeholder="Mobile Number" value="{{old('mobile')}}" autocomplete="new-password">
                            @error('mobile')
                                <div class="text-danger text-small">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="log_in_from">
                            <input class="log_in_from_input" name="password" type="password" placeholder="Password" autocomplete="new-password">
                            @error('password')
                            <div class="text-danger text-small">{{$message}}</div>
                           @enderror
                        </div>
                        <div class="log_in_from">
                            <input class="log_in_from_input" name="confirm_password" type="password" placeholder="Confirm Password">
                            @error('confirm_password')
                            <div class="text-danger text-small">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="log_in_from_btn">
                            <button class="log_in_btn">Register</button>
                        </div>
                        <a href="{{route('front.user.login')}}">Login Here</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection