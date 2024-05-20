
@extends('front.layout.app')
@section('content')

 <section class="home_bannar_sec">
     <figure class="home_bannar_img">
         @if($banner)
         <img src="{{asset($banner->file_path)}}" alt="bannar">
         @endif
     </figure>
 </section>
 <section class="deal_sec">
     <div class="container">
         <div class="deal_text">
             <h2>
                 <span>Hot Deals.</span>
                 Good things are waiting for you
             </h2>
         </div>

         <div class="swiper deal_slider">
             <div class="swiper-wrapper">

                 @if($hot_deals)
                 @foreach($hot_deals as $hot_deal)
                 <div class="swiper-slide deal_swiper_slide">
                     <div class="deal_slider_sec">
                         <div class="deal_slider_text">
                             @if($hot_deal->offer_price>0)
                             @php
                             $discount_percentage = ($hot_deal->price - $hot_deal->offer_price) / $hot_deal->price * 100;
                             @endphp
                             <h4>{{ $discount_percentage }}%  off </h4>
                             @endif
                             <p>{{$hot_deal->name}}</p>
                             @if($hot_deal->offer_price>0)
                             <h5>₹{{$hot_deal->offer_price}}<span>₹{{$hot_deal->price}}</span></h5>
                             @else
                             <h5>₹{{$hot_deal->price}}</h5>
                             @endif

                             <a class="buy_now_btn" href="{{route('front.product.details',$hot_deal->slug)}}">Buy Now</a>
                         </div>
                         <div class="deal_slider_img">
                             <img src="{{asset($hot_deal->image)}}" alt="">
                         </div>
                     </div>
                 </div>
                 @endforeach
                 @endif

             </div>
             <div class="swiper-button-next"></div>
             <div class="swiper-button-prev"></div>
         </div>
 </section>
 @if(count($demo_product)>0)
 <section class="product_sec">
     <div class="container">
         <div class="product_sec_grid">
             <div class="product_grid_1 product_grid_img">
                 <img src="{{asset($demo_product[2]->image)}}" alt="">
                 <div class="product_grid_img_text product_grid_img_text_lg">
                     <h3>{{$demo_product[2]->name}}
                     </h3>
                     <a class="product_buy" href="{{route('front.product.details',$demo_product[2]->slug)}}">Buy Now</a>
                 </div>
             </div>
             <div class="product_grid_2 product_grid_img">
                 <img src="{{asset($demo_product[0]->image)}}" alt="">
                 <div class="product_grid_img_text product_grid_img_text_sm">
                     <h3>{{$demo_product[0]->name}}
                     </h3>
                     <a class="product_buy" href="{{route('front.product.details',$demo_product[0]->slug)}}">Buy Now</a>
                 </div>
             </div>
             <div class="product_grid_3 product_grid_img">
                 <img src="{{asset($demo_product[1]->image)}}" alt="">
                 <div class="product_grid_img_text product_grid_img_text_sm">
                     <h3>{{$demo_product[1]->name}}
                     </h3>
                     <a class="product_buy" href="{{route('front.product.details',$demo_product[1]->slug)}}">Buy Now</a>
                 </div>
             </div>
             <div class="product_grid_4 product_grid_img">
                 <img src="{{asset($demo_product[3]->image)}}" alt="">
                 <div class="product_grid_img_text product_grid_img_text_sm product_grid_img_text_cl">
                     <h3>{{$demo_product[3]->name}}
                     </h3>
                     <a class="product_buy" href="{{route('front.product.details',$demo_product[3]->slug)}}">Buy Now</a>
                 </div>
             </div>
             <div class="product_grid_5 product_grid_img">
                 <img src="{{asset($demo_product[4]->image)}}" alt="">
                 <!-- <div class="product_head_set">
                     <img src="{{asset('frontend/images/Rectangle 35.png')}}" alt="">
                 </div> -->
                 <div class="product_grid_img_text product_grid_img_text_sm product_grid_img_text_cl">
                     <h3>{{$demo_product[4]->name}}
                     </h3>
                     <a class="product_buy" href="{{route('front.product.details',$demo_product[4]->slug)}}">Buy Now</a>
                 </div>
             </div>
         </div>
     </div>
 </section>
 @endif
 <section class="deal_product">
     <div class="container">
         <div class="deal_product_text">
             <h3>Deals of the day</h3>
             <a class="deal_product_text_btn" href="{{ route('front.product.list') }}">View All
                 <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M4.6665 11.3334L11.3332 4.66669" stroke="black" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                     <path d="M4.6665 4.66669H11.3332V11.3334" stroke="black" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                 </svg>

             </a>
         </div>
         <div class="swiper deal_product_slider">
             <div class="swiper-wrapper">
                 @if($deal_of_the_day_products)
                     @foreach($deal_of_the_day_products as $product)
                         <div class="swiper-slide">
                             <div class="swiper_slide_deal_product_p">
                                 <div class="swiper_slide_deal_product">
                                     <figure class="deal_img">
                                         <a href="{{route('front.product.details',$product->slug)}}" class="deal_img_anch">
                                             <img src="{{asset($product->image)}}" alt="">
                                         </a>
                                         <div class="deal_offer_sec_text">
                                         @if($product->offer_price>0)
                                         @php
                                         $discount_percentage = ($product->price - $product->offer_price) / $product->price * 100;
                                         @endphp
                                             {{$discount_percentage}}% <br>Off
                                         @endif    
                                         </div>
                                         <a href="{{route('front.product.details',$product->slug)}}" class="blue_heart">
                                             <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                 <path d="M26.05 5.76088C25.4116 5.12213 24.6535 4.61543 23.8192 4.26973C22.9849 3.92403 22.0906 3.74609 21.1875 3.74609C20.2844 3.74609 19.3902 3.92403 18.5558 4.26973C17.7215 4.61543 16.9635 5.12213 16.325 5.76088L15 7.08588L13.675 5.76088C12.3854 4.47126 10.6363 3.74676 8.81253 3.74676C6.98874 3.74676 5.23964 4.47126 3.95003 5.76088C2.66041 7.05049 1.93591 8.79958 1.93591 10.6234C1.93591 12.4472 2.66041 14.1963 3.95003 15.4859L5.27503 16.8109L15 26.5359L24.725 16.8109L26.05 15.4859C26.6888 14.8474 27.1955 14.0894 27.5412 13.2551C27.8869 12.4207 28.0648 11.5265 28.0648 10.6234C28.0648 9.72027 27.8869 8.82601 27.5412 7.99168C27.1955 7.15736 26.6888 6.39932 26.05 5.76088Z" stroke="#631096" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                             </svg>
                                         </a>
                                     </figure>
                                     <div class="swiper_deal_text">
                                         <a href="#" class="product_text">
                                             <h4>{{$product->name}}</h4>
                                         </a>
                                         <div class="swiper_deal_flex">
                                             @if($product->offer_price>0)
                                             <h5>₹{{$product->offer_price}}<span>₹{{$product->price}}</span></h5>
                                             @endif
                                             <a href="#" class="swiper_deal_btn"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                     <g clip-path="url(#clip0_53_867)">
                                                         <path d="M7.50002 18.3346C7.96026 18.3346 8.33335 17.9615 8.33335 17.5013C8.33335 17.0411 7.96026 16.668 7.50002 16.668C7.03978 16.668 6.66669 17.0411 6.66669 17.5013C6.66669 17.9615 7.03978 18.3346 7.50002 18.3346Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                         <path d="M16.6666 18.3346C17.1269 18.3346 17.5 17.9615 17.5 17.5013C17.5 17.0411 17.1269 16.668 16.6666 16.668C16.2064 16.668 15.8333 17.0411 15.8333 17.5013C15.8333 17.9615 16.2064 18.3346 16.6666 18.3346Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                         <path d="M0.833313 0.832031H4.16665L6.39998 11.9904C6.47618 12.374 6.6849 12.7187 6.9896 12.9639C7.2943 13.2092 7.67556 13.3395 8.06665 13.332H16.1666C16.5577 13.3395 16.939 13.2092 17.2437 12.9639C17.5484 12.7187 17.7571 12.374 17.8333 11.9904L19.1666 4.9987H4.99998" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                     </g>
                                                     <defs>
                                                         <clipPath id="clip0_53_867">
                                                             <rect width="20" height="20" fill="white" />
                                                         </clipPath>
                                                     </defs>
                                                 </svg>

                                             </a>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     @endforeach
                 @endif
             </div>
         </div>
     </div>
 </section>
 @if(count($mobile_product)>4)
 <section class="mobile_sec">
     <div class="container">
         <div class="row">
             <div class="col-lg-6">
                 <div class="row">
                     <div class="col-sm-6">
                         <div class="mobile_left mobile_left_m">
                             <figure class="deal_img">
                                 <a href="{{route('front.product.details',$mobile_product[0]->slug)}}" class="mobile_img_ancher">
                                     <img src="{{asset($mobile_product[0]->image)}}" alt="">
                                 </a>
                                 <a class=" mobile_heart blue_heart" href="#">
                                     <svg class="blue_heart_fill" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                         <path d="M26.05 5.76088C25.4116 5.12213 24.6535 4.61543 23.8192 4.26973C22.9849 3.92403 22.0906 3.74609 21.1875 3.74609C20.2844 3.74609 19.3902 3.92403 18.5558 4.26973C17.7215 4.61543 16.9635 5.12213 16.325 5.76088L15 7.08588L13.675 5.76088C12.3854 4.47126 10.6363 3.74676 8.81253 3.74676C6.98874 3.74676 5.23964 4.47126 3.95003 5.76088C2.66041 7.05049 1.93591 8.79958 1.93591 10.6234C1.93591 12.4472 2.66041 14.1963 3.95003 15.4859L5.27503 16.8109L15 26.5359L24.725 16.8109L26.05 15.4859C26.6888 14.8474 27.1955 14.0894 27.5412 13.2551C27.8869 12.4207 28.0648 11.5265 28.0648 10.6234C28.0648 9.72027 27.8869 8.82601 27.5412 7.99168C27.1955 7.15736 26.6888 6.39932 26.05 5.76088Z" stroke="#631096" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                     </svg>
                                 </a>
                             </figure>
                             <div class="mobile_img_sec_text">
                                 <a href="{{route('front.product.details',$mobile_product[0]->slug)}}" class="product_text">
                                     <h4>{{$mobile_product[0]->name}}</h4>
                                 </a>
                                 <div class="swiper_deal_flex">
                                 @if($mobile_product[0]->offer_price>0)
                                 <h5>₹{{$mobile_product[0]->offer_price}}<span>₹{{$mobile_product[0]->price}}</span></h5>
                                 @endif
                                     <a href="#" class="swiper_deal_btn"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <g clip-path="url(#clip0_53_867)">
                                                 <path d="M7.50002 18.3346C7.96026 18.3346 8.33335 17.9615 8.33335 17.5013C8.33335 17.0411 7.96026 16.668 7.50002 16.668C7.03978 16.668 6.66669 17.0411 6.66669 17.5013C6.66669 17.9615 7.03978 18.3346 7.50002 18.3346Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                 <path d="M16.6666 18.3346C17.1269 18.3346 17.5 17.9615 17.5 17.5013C17.5 17.0411 17.1269 16.668 16.6666 16.668C16.2064 16.668 15.8333 17.0411 15.8333 17.5013C15.8333 17.9615 16.2064 18.3346 16.6666 18.3346Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                 <path d="M0.833313 0.832031H4.16665L6.39998 11.9904C6.47618 12.374 6.6849 12.7187 6.9896 12.9639C7.2943 13.2092 7.67556 13.3395 8.06665 13.332H16.1666C16.5577 13.3395 16.939 13.2092 17.2437 12.9639C17.5484 12.7187 17.7571 12.374 17.8333 11.9904L19.1666 4.9987H4.99998" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                             </g>
                                             <defs>
                                                 <clipPath id="clip0_53_867">
                                                     <rect width="20" height="20" fill="white" />
                                                 </clipPath>
                                             </defs>
                                         </svg>

                                     </a>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-sm-6">
                         <div class="mobile_left mobile_left_m">
                             <figure class="deal_img">
                                 <a href="{{route('front.product.details',$mobile_product[1]->slug)}}" class="mobile_img_ancher">
                                     <img src="{{asset($mobile_product[1]->image)}}" alt="">
                                 </a>
                                 <a class="mobile_heart blue_heart" href="#">
                                     <svg class="blue_heart_fill" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                         <path d="M26.05 5.76088C25.4116 5.12213 24.6535 4.61543 23.8192 4.26973C22.9849 3.92403 22.0906 3.74609 21.1875 3.74609C20.2844 3.74609 19.3902 3.92403 18.5558 4.26973C17.7215 4.61543 16.9635 5.12213 16.325 5.76088L15 7.08588L13.675 5.76088C12.3854 4.47126 10.6363 3.74676 8.81253 3.74676C6.98874 3.74676 5.23964 4.47126 3.95003 5.76088C2.66041 7.05049 1.93591 8.79958 1.93591 10.6234C1.93591 12.4472 2.66041 14.1963 3.95003 15.4859L5.27503 16.8109L15 26.5359L24.725 16.8109L26.05 15.4859C26.6888 14.8474 27.1955 14.0894 27.5412 13.2551C27.8869 12.4207 28.0648 11.5265 28.0648 10.6234C28.0648 9.72027 27.8869 8.82601 27.5412 7.99168C27.1955 7.15736 26.6888 6.39932 26.05 5.76088Z" stroke="#631096" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                     </svg>
                                 </a>
                             </figure>
                             <div class="mobile_img_sec_text">
                                 <a href="{{route('front.product.details',$mobile_product[1]->slug)}}" class="product_text">
                                     <h4>{{$mobile_product[1]->name}}</h4>
                                 </a>
                                 <div class="swiper_deal_flex">
                                     @if($mobile_product[1]->offer_price>0)
                                     <h5>₹{{$mobile_product[1]->offer_price}}<span>₹{{$mobile_product[1]->price}}</span></h5>
                                     @endif
                                     <a href="#" class="swiper_deal_btn"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <g clip-path="url(#clip0_53_867)">
                                                 <path d="M7.50002 18.3346C7.96026 18.3346 8.33335 17.9615 8.33335 17.5013C8.33335 17.0411 7.96026 16.668 7.50002 16.668C7.03978 16.668 6.66669 17.0411 6.66669 17.5013C6.66669 17.9615 7.03978 18.3346 7.50002 18.3346Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                 <path d="M16.6666 18.3346C17.1269 18.3346 17.5 17.9615 17.5 17.5013C17.5 17.0411 17.1269 16.668 16.6666 16.668C16.2064 16.668 15.8333 17.0411 15.8333 17.5013C15.8333 17.9615 16.2064 18.3346 16.6666 18.3346Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                 <path d="M0.833313 0.832031H4.16665L6.39998 11.9904C6.47618 12.374 6.6849 12.7187 6.9896 12.9639C7.2943 13.2092 7.67556 13.3395 8.06665 13.332H16.1666C16.5577 13.3395 16.939 13.2092 17.2437 12.9639C17.5484 12.7187 17.7571 12.374 17.8333 11.9904L19.1666 4.9987H4.99998" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                             </g>
                                             <defs>
                                                 <clipPath id="clip0_53_867">
                                                     <rect width="20" height="20" fill="white" />
                                                 </clipPath>
                                             </defs>
                                         </svg>

                                     </a>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-sm-6">
                         <div class="mobile_left">
                             <figure class="deal_img">
                                 <a href="{{route('front.product.details',$mobile_product[2]->slug)}}" class="mobile_img_ancher">
                                     <img src="{{asset($mobile_product[2]->image)}}" alt="">
                                 </a>
                                 <a class=" mobile_heart blue_heart" href="#">
                                     <svg class="blue_heart_fill" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                         <path d="M26.05 5.76088C25.4116 5.12213 24.6535 4.61543 23.8192 4.26973C22.9849 3.92403 22.0906 3.74609 21.1875 3.74609C20.2844 3.74609 19.3902 3.92403 18.5558 4.26973C17.7215 4.61543 16.9635 5.12213 16.325 5.76088L15 7.08588L13.675 5.76088C12.3854 4.47126 10.6363 3.74676 8.81253 3.74676C6.98874 3.74676 5.23964 4.47126 3.95003 5.76088C2.66041 7.05049 1.93591 8.79958 1.93591 10.6234C1.93591 12.4472 2.66041 14.1963 3.95003 15.4859L5.27503 16.8109L15 26.5359L24.725 16.8109L26.05 15.4859C26.6888 14.8474 27.1955 14.0894 27.5412 13.2551C27.8869 12.4207 28.0648 11.5265 28.0648 10.6234C28.0648 9.72027 27.8869 8.82601 27.5412 7.99168C27.1955 7.15736 26.6888 6.39932 26.05 5.76088Z" stroke="#631096" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                     </svg>
                                 </a>
                             </figure>
                             <div class="mobile_img_sec_text">
                                 <a href="{{route('front.product.details',$mobile_product[2]->slug)}}" class="product_text">
                                     <h4>{{$mobile_product[2]->name}}</h4>
                                 </a>
                                 <div class="swiper_deal_flex">
                                     @if($mobile_product[2]->offer_price>0)
                                     <h5>₹{{$mobile_product[2]->offer_price}}<span>₹{{$mobile_product[2]->price}}</span></h5>
                                     @endif
                                     <a href="#" class="swiper_deal_btn"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <g clip-path="url(#clip0_53_867)">
                                                 <path d="M7.50002 18.3346C7.96026 18.3346 8.33335 17.9615 8.33335 17.5013C8.33335 17.0411 7.96026 16.668 7.50002 16.668C7.03978 16.668 6.66669 17.0411 6.66669 17.5013C6.66669 17.9615 7.03978 18.3346 7.50002 18.3346Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                 <path d="M16.6666 18.3346C17.1269 18.3346 17.5 17.9615 17.5 17.5013C17.5 17.0411 17.1269 16.668 16.6666 16.668C16.2064 16.668 15.8333 17.0411 15.8333 17.5013C15.8333 17.9615 16.2064 18.3346 16.6666 18.3346Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                 <path d="M0.833313 0.832031H4.16665L6.39998 11.9904C6.47618 12.374 6.6849 12.7187 6.9896 12.9639C7.2943 13.2092 7.67556 13.3395 8.06665 13.332H16.1666C16.5577 13.3395 16.939 13.2092 17.2437 12.9639C17.5484 12.7187 17.7571 12.374 17.8333 11.9904L19.1666 4.9987H4.99998" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                             </g>
                                             <defs>
                                                 <clipPath id="clip0_53_867">
                                                     <rect width="20" height="20" fill="white" />
                                                 </clipPath>
                                             </defs>
                                         </svg>

                                     </a>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-sm-6">
                         <div class="mobile_left">
                             <figure class="deal_img">
                                 <a href="{{route('front.product.details',$mobile_product[3]->slug)}}" class="mobile_img_ancher">
                                     <img src="{{asset($mobile_product[3]->image)}}" alt="">
                                 </a>
                                 <a class=" mobile_heart blue_heart" href="#">
                                     <svg class="blue_heart_fill" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                         <path d="M26.05 5.76088C25.4116 5.12213 24.6535 4.61543 23.8192 4.26973C22.9849 3.92403 22.0906 3.74609 21.1875 3.74609C20.2844 3.74609 19.3902 3.92403 18.5558 4.26973C17.7215 4.61543 16.9635 5.12213 16.325 5.76088L15 7.08588L13.675 5.76088C12.3854 4.47126 10.6363 3.74676 8.81253 3.74676C6.98874 3.74676 5.23964 4.47126 3.95003 5.76088C2.66041 7.05049 1.93591 8.79958 1.93591 10.6234C1.93591 12.4472 2.66041 14.1963 3.95003 15.4859L5.27503 16.8109L15 26.5359L24.725 16.8109L26.05 15.4859C26.6888 14.8474 27.1955 14.0894 27.5412 13.2551C27.8869 12.4207 28.0648 11.5265 28.0648 10.6234C28.0648 9.72027 27.8869 8.82601 27.5412 7.99168C27.1955 7.15736 26.6888 6.39932 26.05 5.76088Z" stroke="#631096" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                     </svg>
                                 </a>
                             </figure>
                             <div class="mobile_img_sec_text">
                                 <a href="{{route('front.product.details',$mobile_product[3]->slug)}}" class="product_text">
                                     <h4>{{$mobile_product[3]->name}}</h4>
                                 </a>
                                 <div class="swiper_deal_flex">
                                     @if($mobile_product[3]->offer_price>0)
                                     <h5>₹{{$mobile_product[3]->offer_price}}<span>₹{{$mobile_product[3]->price}}</span></h5>
                                     @endif
                                     <a href="#" class="swiper_deal_btn"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <g clip-path="url(#clip0_53_867)">
                                                 <path d="M7.50002 18.3346C7.96026 18.3346 8.33335 17.9615 8.33335 17.5013C8.33335 17.0411 7.96026 16.668 7.50002 16.668C7.03978 16.668 6.66669 17.0411 6.66669 17.5013C6.66669 17.9615 7.03978 18.3346 7.50002 18.3346Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                 <path d="M16.6666 18.3346C17.1269 18.3346 17.5 17.9615 17.5 17.5013C17.5 17.0411 17.1269 16.668 16.6666 16.668C16.2064 16.668 15.8333 17.0411 15.8333 17.5013C15.8333 17.9615 16.2064 18.3346 16.6666 18.3346Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                 <path d="M0.833313 0.832031H4.16665L6.39998 11.9904C6.47618 12.374 6.6849 12.7187 6.9896 12.9639C7.2943 13.2092 7.67556 13.3395 8.06665 13.332H16.1666C16.5577 13.3395 16.939 13.2092 17.2437 12.9639C17.5484 12.7187 17.7571 12.374 17.8333 11.9904L19.1666 4.9987H4.99998" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                             </g>
                                             <defs>
                                                 <clipPath id="clip0_53_867">
                                                     <rect width="20" height="20" fill="white" />
                                                 </clipPath>
                                             </defs>
                                         </svg>

                                     </a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-lg-6">
                 <div class="mobile_one">
                     <div class="m_logo_text">
                         <div class="m_logo">
                             <a href="{{route('front.product.details',$mobile_product[4]->slug)}}" class="mobile_img_ancher"></a>
                             <img src="{{asset('frontend/images/OPPO_LOGO_2019 1.png')}}" alt="">
                         </div>
                         <div class="m_text">
                             <p>
                                 Up To <span>60% OFF</span> on
                                 Oppo Mobile Phones
                             </p>
                         </div>
                     </div>
                     <div class="mobile_oppo_img">
                         <a href="{{route('front.product.details',$mobile_product[4]->slug)}}" class="mobileone_img_ancher">
                             <img src="{{asset($mobile_product[4]->image)}}" alt="">
                         </a>
                     </div>

                 </div>
             </div>
         </div>
     </div>
 </section>
 @endif
 
@endsection

@section('script')

@endsection