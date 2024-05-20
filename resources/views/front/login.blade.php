@extends('front.layout.app')
@section('page-title', 'login')
@section('content')
<section class="login_sec">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                                            @if (session('error'))
                                                <div class="alert alert-danger text-center" id="message_div">
                                                    {{ session('error') }}
                                                </div>
                                            @endif
                <div class="log_in">                                    
                    <form action="{{route('front.user.check')}}" method="post" class="from_login">
                        @csrf
                        <h4>Login Now</h4>
                        <div class="log_in_from">
                            <input class="log_in_from_input" name="mobile" type="tel" placeholder="Mobile Number" value="{{old('mobile')}}" autocomplete="new-password">
                            @error('mobile')
                                <div class="text-small text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="log_in_from">
                            <input class="log_in_from_input" name="password" type="password" placeholder="Password"  autocomplete="new-password">
                            @error('password')
                                <div class="text-small text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="log_in_from_btn">
                            <button  class="log_in_btn">Login</button>
                        </div>
                        <a href="{{route('front.user.register')}}">Register here</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection