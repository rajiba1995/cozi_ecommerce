<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ONN Total Comfort | Login</title>

    <link rel="icon" href="img/favicon.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="{{ asset('css/plugin.css') }}">
    <link rel="stylesheet" href="{{ asset('node_modules/swiper/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('node_modules/select2/dist/css/select2.min.css') }}">
    <link rel='stylesheet' href='{{ asset('node_modules/lightbox2/dist/css/lightbox.min.css?ver=5.8.2') }}'>
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('scss/css/preload.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <main>
        <!-- <section class="register-wrapper">
            <div class="register-left">
                <div class="register-header">
                    <h4>Recommended Product</h4>
                </div>
                <div class="register-collection__thumb swiper-container">
                    <div class="slider swiper-wrapper">
                        @foreach ($recommendedProducts as $productKey => $productValue)
                           <a href="{{route('front.product.detail', $productValue->slug)}}" class="register-collection__thumb-single swiper-slide">
                                <figure>
                                    <img src="{{asset($productValue->image)}}" />
                                    <h4>{{$productValue->name}}</h4>
                                    <h6>Style # OF {{$productValue->style_no}}</h6>
                                </figure>
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="register-collection__thumb swiper-container" dir="rtl">
                    <div class="slider swiper-wrapper">
                        @foreach ($recommendedProducts as $productKey => $productValue)
                           <a href="{{route('front.product.detail', $productValue->slug)}}" class="register-collection__thumb-single swiper-slide">
                                <figure>
                                    <img src="{{asset($productValue->image)}}" />
                                    <h4>{{$productValue->name}}</h4>
                                    <h6>Style # OF {{$productValue->style_no}}</h6>
                                </figure>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="register-right">
                <form method="POST" class="register-block" action="{{route('front.user.check')}}">@csrf
                    <div class="register-logo">
                        <a href="{{route('front.home')}}"><img src="{{asset('img/logo.png')}}"></a>
                    </div>

                    <h3>Login</h3>
                    <h4>Welcome to ONN</h4>

                    <div class="register-card">
                        <div class="register-group">
                            <input type="email" class="register-box" name="email" placeholder="Email id" value="{{old('email')}}" autofocus>
                            <label class="floating-label">Email id</label>
                            @error('email') <p class="small text-danger mb-0">{{$message}}</p> @enderror
                        </div>
                        <div class="register-group">
                            <input type="password" class="register-box" name="password" placeholder="Password">
                            <label class="floating-label">Password</label>
                            @error('password') <p class="small text-danger mb-0">{{$message}}</p> @enderror
                        </div>
                    </div>

                    <div class="row align-items-center">
                        <div class="col-5">
                            <a href="{{route('front.user.register')}}">New user ?</a>
                        </div>
                        <div class="col-7">
                            <button type="submit">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </section> -->

		<section class="register-wrapper">
            <div class="register-right">
                 <div class="register-logo">
                    <a href="{{route('front.home')}}"><img src="{{asset('img/footer-logo.png')}}"></a>
                </div>
                <div class="container">
                    <div class="row m-0 justify-content-center">
                        <div class="col-12 col-lg-5 p-0">
                             <form method="POST" class="register-block" action="{{route('front.user.check')}}">@csrf
                                <h3>Login</h3>
                                <h4>Welcome to ONN</h4>
            
                                <div class="register-card">
                                    <div class="register-group">
                                        <input type="email" class="register-box" name="email" placeholder="Email id" value="{{old('email')}}" autofocus>
                                        <label class="floating-label">Email id</label>
                                        @error('email') <p class="small text-danger mb-0">{{$message}}</p> @enderror
                                    </div>
                                    <div class="register-group">
                                        <input type="password" class="register-box" name="password" placeholder="Password">
                                        <label class="floating-label">Password</label>
                                        @error('password') <p class="small text-danger mb-0">{{$message}}</p> @enderror
                                    </div>
                                </div>

                                <div class="row align-items-center justify-content-center text-center">
                                    <div class="col-12">
                                        <button type="submit">Login</button>
                                        <a href="{{route('front.user.forgot.password', '')}}" class="text-muted">Forgot password ?</a>
										<a href="{{route('front.user.register')}}">New user ?</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script src="{{ asset('node_modules/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('js/plugin.js') }}"></script>
    <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.js') }}"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('node_modules/gsap/dist/gsap.min.js') }}"></script>
    <script src="{{ asset('node_modules/gsap/dist/ScrollTrigger.min.js') }}"></script>
    <script src="{{ asset('node_modules/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('node_modules/counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('node_modules/lightbox2/dist/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('node_modules/select2/dist/js/select2.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.0/TweenMax.min.js"></script>
    <script src="{{ asset('node_modules/scrollmagic/scrollmagic/minified/ScrollMagic.min.js') }}"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.3/plugins/animation.gsap.min.js'></script>
    <script src="{{ asset('node_modules/scrollmagic/scrollmagic/minified/plugins/debug.addIndicators.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    <script>
        // sweetalert fires | type = success, error, warning, info, question
        function toastFire(type = 'success', title, body = '') {
            /* Swal.fire({
                icon: type,
                title: title,
                text: body,
                confirmButtonColor: 'black',
                timer: 5000
            }) */

            const Toast = Swal.mixin({
				toast: true,
				position: 'top-end',
				showConfirmButton: false,
				timer: 3000,
				// timerProgressBar: true,
                showCloseButton: true,
				didOpen: (toast) => {
					toast.addEventListener('mouseenter', Swal.stopTimer)
					toast.addEventListener('mouseleave', Swal.resumeTimer)
				}
			});

			Toast.fire({
				icon: type,
				title: title
			});
        }

        // on session toast fires
        @if (Session::has('success'))
            toastFire('success', '{{ Session::get('success') }}');
        @elseif (Session::has('failure'))
            toastFire('warning', '{{ Session::get('failure') }}');
        @endif
    </script>
</body>

</html>