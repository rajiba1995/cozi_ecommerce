<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('frontend/images/favicon.png')}}" type="image/x-icon">
    <title>Lux Cozi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> -->
    <!-- auto search -->
    <!-- <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css"> -->
    <style>
        div:where(.swal2-container) button:where(.swal2-styled).swal2-confirm {
            background: linear-gradient(90deg, #611096 0%, #cf2582 90.22%) !important;
        }
    </style>
</head>

<body>
    <header>
        <div class="container">
            <div class="header_sec">
                <a href="{{asset('/')}}" class="logo_img">
                    <img src="{{asset('frontend/images/logo1.png')}}" alt="logo">
                </a>

                <form action="" class="search_from">
                    <input type="search" id="search" class="search_input" placeholder="Search for products">
                    <button type="submit" class="search_btn">GO</button>
                </form>
                <div class="wishlist">
                    <div class="search_for_mob">
                        <a href="#url" class="search_for_mob_a" data-bs-toggle="modal" data-bs-target="#examplesearchModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#655D5D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                            <!--search Modal -->
                            <div class="modal fade" id="examplesearchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header search_m_h">
                                            <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="">
                                                <input type="search" class="mobile_search" placeholder="Search for products">
                                                <input type="submit" class="mobile_search_btn" value="Search">
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </a>
                    </div>
                    <div class="header_heart header_user_menu">
                        <a href="{{route('front.wishlist.index')}}"><svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M26.0501 5.76258C25.4117 5.12384 24.6537 4.61714 23.8193 4.27144C22.985 3.92574 22.0908 3.7478 21.1876 3.7478C20.2845 3.7478 19.3903 3.92574 18.556 4.27144C17.7216 4.61714 16.9636 5.12384 16.3251 5.76258L15.0001 7.08758L13.6751 5.76258C12.3855 4.47297 10.6364 3.74847 8.81265 3.74847C6.98886 3.74847 5.23976 4.47297 3.95015 5.76258C2.66053 7.0522 1.93604 8.80129 1.93604 10.6251C1.93604 12.4489 2.66053 14.198 3.95015 15.4876L5.27515 16.8126L15.0001 26.5376L24.7251 16.8126L26.0501 15.4876C26.6889 14.8491 27.1956 14.0911 27.5413 13.2568C27.887 12.4225 28.0649 11.5282 28.0649 10.6251C28.0649 9.72198 27.887 8.82771 27.5413 7.99339C27.1956 7.15907 26.6889 6.40103 26.0501 5.76258Z" stroke="#655D5D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                        @if(Auth::guard('web')->check())
                        <span class="wish_list_count">{{$wishlistCount}}</span>
                        @else
                        <span class="wish_list_count">0</span>
                        @endif
                    </div>
                    <div class="header_user header_user_menu">
                          
                        
                        <a class="header_user_menu_a dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" href="#"><svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M25 26.25V23.75C25 22.4239 24.4732 21.1521 23.5355 20.2145C22.5979 19.2768 21.3261 18.75 20 18.75H10C8.67392 18.75 7.40215 19.2768 6.46447 20.2145C5.52678 21.1521 5 22.4239 5 23.75V26.25"
                                    stroke="#655D5D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M15 13.75C17.7614 13.75 20 11.5114 20 8.75C20 5.98858 17.7614 3.75 15 3.75C12.2386 3.75 10 5.98858 10 8.75C10 11.5114 12.2386 13.75 15 13.75Z"
                                    stroke="#655D5D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                     <ul class="dropdown-menu header_user_dropdown">  
                     @if(Auth::guard('web')->check())
                        <!-- $userId = Auth::guard('web')->user()->id; -->
                        <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log out</a></li>
                        <li><a class="dropdown-item" href="{{ route('front.user.profile') }}">My account</a></li>
                        @else
                        <li><a class="dropdown-item" href="{{route('front.user.login')}}">Log in</a></li>
                     @endif
                    </ul>
                    </div>
                    <div class="header_bag header_user_menu">
                        <a href="{{route('front.cart.index')}}"><svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.5 2.5L3.75 7.5V25C3.75 25.663 4.01339 26.2989 4.48223 26.7678C4.95107 27.2366 5.58696 27.5 6.25 27.5H23.75C24.413 27.5 25.0489 27.2366 25.5178 26.7678C25.9866 26.2989 26.25 25.663 26.25 25V7.5L22.5 2.5H7.5Z" stroke="#655D5D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M3.75 7.5H26.25" stroke="#655D5D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M20 12.5C20 13.8261 19.4732 15.0979 18.5355 16.0355C17.5979 16.9732 16.3261 17.5 15 17.5C13.6739 17.5 12.4021 16.9732 11.4645 16.0355C10.5268 15.0979 10 13.8261 10 12.5" stroke="#655D5D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                        @if(Auth::guard('web')->check())
                        <span class="wish_list_count" id="cartCount">{{$cartCount}}</span>
                        @else
                        <span class="wish_list_count" id="cartCount">0</span>
                        @endif
                       
                    </div>
                </div>
            </div>
        </div>
    </header>

    @yield('content')
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <footer class="top_footer">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="footer_text">
                        <h4>About LUX Industries</h4>
                        <p>
                            Founded in 1957 by Mr. Giridhari Lal Todi as Biswanath Hosiery Mills, Lux Industries Ltd.
                            came into being in 1995 and a new era began when Mr Girdharilal Todi ji's sons took over the
                            rein of the company. Lux eventually became the most preferred innerwear brand in the country
                            for everyone.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footer_text">
                        <h4>Useful Links</h4>
                        <ul class="footer_text_menu">
                            <li><a href="{{ route('front.user.profile')}}">My Account</a></li>
                            <li><a href="{{route('front.privacy')}}">Privacy Policy</a></li>
                            <li><a href="#">Term & Conditions</a></li>
                            <li><a href="#">Customer Care</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <footer class="footer_bottom">
        <div class="container">
            <p>&copy;2024Lux Industries Ltd. All Rights Reserved.</p>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('frontend/js/custom.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.19.3/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $(document).ready(function() {
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "200",
                "hideDuration": "1000",
                "timeOut": "2000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
    
            @if (Session::get('success'))
                toastr.success("{{ Session::get('success') }}");
            @elseif (Session::get('failure'))
                toastr.error("{{ Session::get('failure') }}");
            @endif
        });
    </script>
    
    @yield('script')
<script>
    $(document).ready(()=>{
        $.ajax({
            type: 'GET',
            url: '/load-cart/' + userId,
            success: function(response) {
                // Update the cart count in your UI
                console.log(response)
                $('#cartCount').html(response.cartCount);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    })
        
</script>

 <!-- auto search -->
  <!-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script> -->
  <script>
    var availableTags = [
    ];
    $.ajax({
        type:'GET',
        url:"{{route('front.product.search')}}",
        success:function(response){
            console.log(response);
            search(response.data);
        }
    });
    function search(availableTags){
        $( "#search" ).autocomplete({
      source: availableTags
    });
    }
  </script>

</body>

</html>

