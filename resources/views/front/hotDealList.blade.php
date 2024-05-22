@extends('front.layout.app')
   @section('content')
   <style>
    .blue_heart.active {
    background-color: red;
   
}
</style>
    <section class="all_product_sec">
        <div class="container">
            <form action="" class="all_product_form">
                <h4>All Products</h4>
                <div class="select_from">
                    <select name="" id="" class="product_select_from">
                        <option value="" selected hidden>Filter by price</option>
                        @if(count($priceRanges)>0)
                            @foreach($priceRanges as $key =>$item)
                                <option value="{{$item}}">{{$item}}</option>
                            @endforeach
                        @endif
                    </select>
                    <select name="" id="" class="product_select_from">
                        <option value="">Arrange by</option>
                        <option value="">Filter by Price 2</option>
                        <option value="">Filter by Price 3</option>
                        <option value="">Filter by Price 4</option>
                    </select>
                </div>
            </form>
        </div>
    </section>
    <section class="product_listing_sec">
        <div class="container">
            <div class="row">
                @if($data)
                @foreach($data as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                    <div class="swiper_slide_deal_product_p">
                        <div class="swiper_slide_deal_product">
                            <figure class="deal_img">
                                <a href="{{route('front.product.details',$product->slug)}}" class="deal_img_anch">
                                    <img src="{{asset($product->image)}}" alt="">
                                </a>
                                         @php
                                            $discount_percentage = (($product->price - $product->offer_price) / $product->price) * 100;
                                        @endphp

                                        @if($discount_percentage > 0)
                                            <div class="deal_offer_sec_text">
                                                {{(int)$discount_percentage}}% <br>Off
                                            </div>
                                        @endif

                                        @php
                                            $active_wishhList = active_wishhList($product->id);
                                        @endphp
                                <a href="{{route('front.wishlist.add',$product->id)}}" class="blue_heart {{$active_wishhList?'active':''}}">
                                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M26.05 5.76088C25.4116 5.12213 24.6535 4.61543 23.8192 4.26973C22.9849 3.92403 22.0906 3.74609 21.1875 3.74609C20.2844 3.74609 19.3902 3.92403 18.5558 4.26973C17.7215 4.61543 16.9635 5.12213 16.325 5.76088L15 7.08588L13.675 5.76088C12.3854 4.47126 10.6363 3.74676 8.81253 3.74676C6.98874 3.74676 5.23964 4.47126 3.95003 5.76088C2.66041 7.05049 1.93591 8.79958 1.93591 10.6234C1.93591 12.4472 2.66041 14.1963 3.95003 15.4859L5.27503 16.8109L15 26.5359L24.725 16.8109L26.05 15.4859C26.6888 14.8474 27.1955 14.0894 27.5412 13.2551C27.8869 12.4207 28.0648 11.5265 28.0648 10.6234C28.0648 9.72027 27.8869 8.82601 27.5412 7.99168C27.1955 7.15736 26.6888 6.39932 26.05 5.76088Z"
                                            stroke="#631096" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </figure>
                            <div class="swiper_deal_text">
                                <a href="{{route('front.product.details',$product->slug)}}" class="product_text">
                                    <h4>{{$product->name}}</h4>
                                </a>
                                <div class="swiper_deal_flex">
                                    @if($product->price != $product->offer_price)
                                            @if($product->offer_price>0)
                                                <h5>₹{{$product->offer_price}}<span>₹{{$product->price}}</span></h5>
                                                @else
                                                <h5>₹{{ $product->price }}</h5>
                                                @endif
                                            @else
                                            <h5>₹{{ $product->offer_price }}</h5>         
                                            @endif
                                    <a href="{{route('front.product.details',$product->slug)}}" class="swiper_deal_btn"><svg width="20" height="20" viewBox="0 0 20 20"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_53_867)">
                                                <path
                                                    d="M7.50002 18.3346C7.96026 18.3346 8.33335 17.9615 8.33335 17.5013C8.33335 17.0411 7.96026 16.668 7.50002 16.668C7.03978 16.668 6.66669 17.0411 6.66669 17.5013C6.66669 17.9615 7.03978 18.3346 7.50002 18.3346Z"
                                                    stroke="white" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M16.6666 18.3346C17.1269 18.3346 17.5 17.9615 17.5 17.5013C17.5 17.0411 17.1269 16.668 16.6666 16.668C16.2064 16.668 15.8333 17.0411 15.8333 17.5013C15.8333 17.9615 16.2064 18.3346 16.6666 18.3346Z"
                                                    stroke="white" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M0.833313 0.832031H4.16665L6.39998 11.9904C6.47618 12.374 6.6849 12.7187 6.9896 12.9639C7.2943 13.2092 7.67556 13.3395 8.06665 13.332H16.1666C16.5577 13.3395 16.939 13.2092 17.2437 12.9639C17.5484 12.7187 17.7571 12.374 17.8333 11.9904L19.1666 4.9987H4.99998"
                                                    stroke="white" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
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
    </section>

    @endsection
   
   @section('script')

   @endsection
   