@extends('front.layout.app')
   @section('content')

    <section class="product_details_sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                        class="swiper wallet_swiper2">
                        <div class="swiper-wrapper" id="color_wise_image">
                        @if($primaryColorSizes)
                            @foreach($primaryColorSizes['images'] as $item)
                            <div class="swiper-slide">
                                <img src="{{asset($item->image)}}" alt="">
                            </div>
                            @endforeach
                        @endif   
                        </div>
                    </div>
                    <div thumbsSlider="" class="swiper wallet_swiper">
                        <div class="swiper-wrapper" id="color_wise_slider_images">
                        @if($primaryColorSizes)
                            @foreach($primaryColorSizes['images'] as $item)
                            <div class="swiper-slide">
                                <div class="product_d_slider_img">
                                    <img src="{{asset($item->image)}}" alt="">
                                </div>
                            </div>
                            @endforeach
                        @endif 
                      
                        </div>

                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>


                </div>
                <div class="col-lg-6">
                    <div class="product_details_text">
                        <span class="sku">#UK 100</span>
                        <!--  -->
                        <h3>{{$data->name}}</h3>
                        <div class="product_details_amoutn">
                            <div class="product_span_amoutn">
                                 @if($data->offer_price>0)
                                    <div id="price_module"><h4>₹{{$data->offer_price}}<span>₹{{$data->price}}</span></h4></div>
                                @else
                                <h4>₹{{$data->price}}</h4>
                                @endif
                            </div>
                            <a href="#" class="product_details_wishlist">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M17.3666 3.84319C16.941 3.41736 16.4356 3.07956 15.8794 2.84909C15.3232 2.61862 14.727 2.5 14.1249 2.5C13.5229 2.5 12.9267 2.61862 12.3705 2.84909C11.8143 3.07956 11.3089 3.41736 10.8833 3.84319L9.99994 4.72652L9.1166 3.84319C8.25686 2.98344 7.0908 2.50045 5.87494 2.50045C4.65908 2.50045 3.49301 2.98344 2.63327 3.84319C1.77353 4.70293 1.29053 5.86899 1.29053 7.08485C1.29053 8.30072 1.77353 9.46678 2.63327 10.3265L3.5166 11.2099L9.99994 17.6932L16.4833 11.2099L17.3666 10.3265C17.7924 9.90089 18.1302 9.39553 18.3607 8.83932C18.5912 8.2831 18.7098 7.68693 18.7098 7.08485C18.7098 6.48278 18.5912 5.88661 18.3607 5.33039C18.1302 4.77418 17.7924 4.26882 17.3666 3.84319Z"
                                        stroke="black" stroke-width="1.2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>

                                <span class="product_d_wishlist">Wish list</span>
                            </a>
                        </div>
                        <form action="{{route('front.product.add.to.cart')}}" method="post" id="myForm">
                            <div class="product_color">
                                @csrf
                                <div class="product_info_form">
                                    <label for="#" class="form_colo_label">AVAILABLE COLOUR</label>
                                    <div class="product_info_form_color">
                                        @if($availableColor)
                                        @foreach($availableColor as $itemKey =>$color)
                                        <input style="background-color: {{$color->code}};" class="form-check-input form_color_input" type="radio" name="choose_color" id="inline_Radio{{$color->id}}" value="{{$color->id}}" onclick="getColorId({{$color->id}},{{$data->id}})">
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="product_size_info">
                                    <label for="#" class="form_colo_label">AVAILABLE SIZE</label>
                                    @if($primaryColorSizes)
                                     <div id="form_product_size">
                                        @foreach($primaryColorSizes['sizes'] as $k=> $size)
                                            <div class="form-check form-check-inline form_product_size" onclick="form_color_input_size('{{$size->price}}', '{{$size->offer_price}}', '{{$size->id}}')">
                                                <input class="form-check-input form_color_input_size" type="radio"
                                                    name="size_name" id="inlineRadio{{$k+1}}" value="{{$size->size}}" >
                                                    <label for="inlineRadio{{$k+1}}">{{$size->size_name}}</label>
                                            </div>
                                        @endforeach
                                     </div>
                                    @endif
                                </div>
                            </div>
                            <div class="product_counter">
                                <div class="product-1">
                                    <input type="hidden"  name="productId" value="{{$data->id}}">
                                    <input type="hidden"  name="productName" value="{{$data->name}}">
                                    <input type="hidden"  name="productStyleNo" value="{{$data->style_no}}">
                                    <input type="hidden"  name="productImage" value="{{$data->image}}">
                                    <input type="hidden"  name="productSlug" value="{{$data->slug}}">
                                    <input type="hidden" id="variationId"  name="variationId">
                                    <input type="hidden" id="price"  name="price">
                                    <input type="hidden" id="offer_price"  name="offer_price">
                                    <button type="button"   class="product_counter_btn product_counter1">-</button>
                                    <input  type="text" class="input_text"  id="quantity" name="quantity"  value="1" min="1" />
                                    <button type="button" class="product_counter_btn product_counter2">+</button>
                                    <button type="submit" href="#" data-id="1" data-quantity="1" class="add-to-cart ajax product-1" id="checkout_button">Add to
                                        Cart</button>
                                           
                                </div>
                                            @if (session('warning'))
                                                <p class="text-danger" id="message_div">
                                                    {{ session('warning') }}
                                                </p>
                                            @elseif  (session('success'))
                                                <p class="text-success" id="message_div">
                                                    {{ session('success') }}
                                                </p>  
                                            @endif
                            </div>
                        </form>
                        <p id="Error_show" class="text-danger test-sm"></p>
                        <h4 class="product_details_h4">Product Details</h4>
                        @if ($data->desc) <p>{!! $data->desc !!}</p> @endif
                        <!-- <div class="product_info">
                            <h6>Fabric:<span>Cotton, Cotton Blend, 100% Cotton, Modal</span></h6>
                            <h6>Wash Care:<span>Machine Wash, Hand Wash, Do Not Bleach, Do Not Iron</span></h6>
                            <h6>Pattern:<span>Solid / Printed / Stripe /Colorblocked</span></h6>
                        </div> -->
                        <h5>*No returns or exchanges permitted. <a class="term_c" href="#">T&C apply</a></h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="product_listing_sec">
        <div class="container">
            <div class="product_listing_text">
                <h3>You may also like</h3>
            </div>
            <div class="row">
                @if($categoryWiseProducts)
                @foreach($categoryWiseProducts as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
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
                                    {{ $discount_percentage }}% <br>Off
                                    @endif
                                    </div>
                                    <a href="#" class="blue_heart">
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
                                        @if($product->offer_price>0)
                                        <h5>₹{{$product->offer_price}}<span>₹{{$product->price}}</span></h5>
                                        @else
                                        <h5>₹{{$product->price}}</h5>
                                        @endif
                                        <a href="#" class="swiper_deal_btn"><svg width="20" height="20" viewBox="0 0 20 20"
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

   <script>
    function getColorId(colorId,productId) {
        // console.log("Selected Color ID:", colorId);
        // console.log("Selected Color ID:", productId);
        $.ajax({
            type: 'GET',
            url: "{{route('front.product.color.wise.size')}}",
            data: {
                colorId: colorId,
                productId: productId,
            },
            success: function(response) {
                if(response.status == 200){
                    // console.log(response);
                
                    // $('#price_moodule').html("");
                    $('#form_product_size').html("");
                    response.data.forEach(function(size_data) {
                        const sizeHtml = `<div class="form-check form-check-inline form_product_size" onclick="form_color_input_size('${size_data.price}', '${size_data.offer_price}', '${size_data.id}')">
                        <input class="form-check-input form_color_input_size" type="radio" 
                                name="size_name" id="sizeOption${size_data.id}" value="${size_data.size}">
                            <label class="form-check-label" for="sizeOption${size_data.id}">
                                ${size_data.size_name}
                            </label>
                        </div>`;
                        
                        $('#form_product_size').append(sizeHtml);
                    });

                    $('#color_wise_image').html("");
                        var baseUrl = "{{ url('/') }}";
                        var isFirstImage = true; // Flag to track if it's the first image

                        response.images.forEach(function(image_data, index) {
                            if (isFirstImage) { // Check if it's the first image
                                const imageUrl = baseUrl + '/' + image_data.image; // Construct the image URL
                                const imageHtml = `<div class="swiper-slide swiper-slide-active" style="width: 636px; margin-right: 10px;">
                                    <img src="${imageUrl}" alt="">
                                </div>`;
                                
                                $('#color_wise_image').append(imageHtml);

                                isFirstImage = false; // Set the flag to false after processing the first image
                            }
                        });

                        
                    $('#color_wise_slider_images').html("");
                    var baseUrl = "{{ url('/') }}";
                    const countImages = response.images.length;
                    response.images.forEach(function(image_data, index) {
                                // console.log(image_data);
                                const imageUrl = baseUrl + '/' + image_data.image; // Construct the image URL
                                let slideClass;
                                if (index === 0) {
                                    index += 1;
                                    slideClass = 'swiper-slide-active swiper-slide-thumb-active';
                                } else if(index===1){
                                    index += 1;
                                    slideClass = 'swiper-slide-next';
                                }else{
                                    index += 1;
                                    slideClass = '';
                                }

                                const imageHtml = `<div class="swiper-slide swiper-slide-visible swiper-slide-fully-visible ${slideClass}" role="group" aria-label="${index} / ${countImages}" style="width: 149px;">
                                    <div class="product_d_slider_img">
                                        <img src="${imageUrl}" alt="">
                                    </div>
                                </div>`;

                                
                                $('#color_wise_slider_images').append(imageHtml);
                            
                        });



                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            },
        });

    }
    function form_color_input_size(price, offer_price, variation_id){
        $('#variationId').val(variation_id);
        $('#price').val(price);
        $('#offer_price').val(offer_price);
        if(!isNaN(price) && !isNaN(offer_price)){ // Check if both prices exist
            const price_data = `<h4>₹${offer_price}<span>₹${price}</span></h4>`;
            $('#price_module').html(price_data); // Use html() instead of append() to replace existing content
            // console.log('if')
        } else if (!isNaN(offer_price)) { // Check if only offer_price exists
            // console.log('else if')
            const price_data = `<h4>₹${offer_price}</h4>`;
            $('#price_module').html(price_data); // Use html() instead of append() to replace existing content
        } else {
            // Handle case where neither price nor offer_price exists
            // console.log('else')
            $('#price_module').empty(); // Clear the price module
        }
    }
    $(document).ready(function() {
        $('#checkout_button').on('click', function(){
            // Perform form validation here
            
            var choose_color = $('input[name="choose_color"]:checked').val();
            var size_name = $('input[name="size_name"]:checked').val();
            var quantity = $('input[name="quantity"]').val();

            $('#Error_show').empty();

            // Check if choose_color is not selected
            if (!choose_color) {
                $('#Error_show').text("Please select a color.").show();
                setTimeout(function() {
                    $('#Error_show').hide();
                }, 3000);
                return false; // Prevent further execution
            }

            // Check if size_name is not selected
            if (!size_name) {
                $('#Error_show').text("Please select a size.").show();
                setTimeout(function() {
                    $('#Error_show').hide();
                }, 3000);
                return false; // Prevent further execution
            }

            // Check if quantity is not provided or is not a valid number or is not within the range of 1 to 5
            if (!quantity || isNaN(quantity) || parseInt(quantity) < 1 || parseInt(quantity) > 5) {
                $('#Error_show').text("Please provide a valid quantity between 1 and 5.").show();
                setTimeout(function() {
                    $('#Error_show').hide();
                }, 3000);
                return false; // Prevent further execution
            }

            // If all validations pass, proceed with checkout
            // You can perform further actions here, such as AJAX request to submit the form
            // Example:
            // $('#myForm').submit();
            // or
            // $.ajax({ ... });
        });
    });
</script>
   
@endsection
