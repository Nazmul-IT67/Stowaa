@extends('Frontend.main')
@section('index')
    <!-- breadcrumb_section - start -->

    <div class="breadcrumb_section">
        <div class="container">
            <ul class="breadcrumb_nav ul_li">
                <li><a href="{{ route('Fontend') }}">Home</a></li>
                <li>Product Details</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb_section - end -->

    <!-- product_details - start -->

    <section class="product_details section_space pb-0">
        <div class="container">
            <div class="row">
                <div class="col col-lg-6">
                    <div class="product_details_image">
                        <div class="details_image_carousel">
                            @foreach ($products->ProductGallery as $gallery)
                                <div class="slider_item">
                                    <img src="{{ asset('Product/Gallerys/' . $gallery->created_at->format('Y/m/') . $gallery->product_id . '/' . $gallery->product_gallery) }}"
                                        alt="">
                                </div>
                            @endforeach
                        </div>

                        <div class="details_image_carousel_nav">
                            @foreach ($products->ProductGallery as $gallery)
                                <div class="slider_item">
                                    <img src="{{ asset('Product/Gallerys/' . $gallery->created_at->format('Y/m/') . $gallery->product_id . '/' . $gallery->product_gallery) }}"
                                        alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="product_details_content">
                        <h2 class="item_title">{{ $products->product_title }}</h2>
                        <p>{{ $products->description }}</p>
                        <div class="item_review">
                            <ul class="rating_star ul_li">
                                <li><i class="fas fa-star"></i>></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star-half-alt"></i></li>
                            </ul>
                            <span class="review_value">3 Rating(s)</span>
                        </div>

                        <div class="item_price row">
                            <div class="col-6">
                                <h4 class="price">$ {{ $products->price }}</h4>
                            </div>
                            <div class="col-6">
                                <h6>Avelable product:
                                    @foreach ($products->ProductAttribute as $item)
                                        {{ $item->quantity }}
                                    @endforeach
                                </h6>
                            </div>
                        </div>
                        <hr>

                        <div class="item_attribute">
                            <div class="row">
                                <div class="col col-md-6">
                                    <div class="select_option clearfix">
                                        <h4 class="input_title">Color *</h4>
                                        <select name="color_id" class="color_id">
                                            <option>- Please select Color -</option>
                                            @foreach ($groupby as $color)
                                                <option>{{ $color[0]->color->color_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col col-md-6">
                                    <div class="select_option clearfix">
                                        <h4 class="input_title">Size *</h4>
                                        <select class="sizecheck" style="display: none;">
                                            <option>- Please select Size -</option>
                                            @foreach ($groupby as $size)
                                                <option>{{ $size[0]->size->size_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="quantity_wrap">
                            <div class="quantity_input">
                                <button type="button" class="input_number_decrement">
                                    <i class="fal fa-minus"></i>
                                </button>
                                <input class="input_number" type="text" value="1">
                                <button type="button" class="input_number_increment">
                                    <i class="fal fa-plus"></i>
                                </button>
                            </div>
                            <div class="total_price">
                                <Span>Total: $</span>{{ $products->price }}
                            </div>
                        </div>

                        <ul class="default_btns_group ul_li">
                            <li>
                                <a class="btn btn_primary addtocart_btn"
                                    href="{{ route('SingleCart', $products->slug) }}">Add To Cart</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="details_information_tab">
                <ul class="tabs_nav nav ul_li" role=tablist>
                    <li>
                        <button class="active" data-bs-toggle="tab" data-bs-target="#description_tab" type="button"
                            role="tab" aria-controls="description_tab" aria-selected="true">
                            Description
                        </button>
                    </li>
                    <li>
                        <button data-bs-toggle="tab" data-bs-target="#additional_information_tab" type="button"
                            role="tab" aria-controls="additional_information_tab" aria-selected="false">
                            Additional information
                        </button>
                    </li>
                    <li>
                        <button data-bs-toggle="tab" data-bs-target="#reviews_tab" type="button" role="tab"
                            aria-controls="reviews_tab" aria-selected="false">
                            Reviews(2)
                        </button>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="description_tab" role="tabpanel">
                        <p>{{ $products->description }}</p>
                        <p class="mb-0">{{ $products->description }}</p>
                    </div>

                    <div class="tab-pane fade" id="additional_information_tab" role="tabpanel">
                        <p>
                            {{ $products->summery }}
                        </p>

                        <div class="additional_info_list">
                            <h4 class="info_title">Additional Info</h4>
                            <ul class="ul_li_block">
                                <li>No Side Effects</li>
                                <li>Made in USA</li>
                            </ul>
                        </div>

                        <div class="additional_info_list">
                            <h4 class="info_title">Product Features Info</h4>
                            <ul class="ul_li_block">
                                <li>Compatible for indoor and outdoor use</li>
                                <li>Wide polypropylene shell seat for unrivalled comfort</li>
                                <li>Rust-resistant frame</li>
                                <li>Durable UV and weather-resistant construction</li>
                                <li>Shell seat features water draining recess</li>
                                <li>Shell and base are stackable for transport</li>
                                <li>Choice of monochrome finishes and colourways</li>
                                <li>Designed by Nagi</li>
                            </ul>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="reviews_tab" role="tabpanel">
                        <div class="average_area">
                            <div class="row align-items-center">
                                <div class="col-md-12 order-last">
                                    <div class="average_rating_text">
                                        <ul class="rating_star ul_li_center">
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                        </ul>
                                        <p class="mb-0">
                                            Average Star Rating: <span>4 out of 5</span> (2 vote)
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="customer_reviews">
                            <h4 class="reviews_tab_title">2 reviews for this product</h4>
                            <div class="customer_review_item clearfix">
                                <div class="customer_image">
                                    <img src="{{ asset('fontend/assets/images/team/team_1.jpg') }}"
                                        alt="image_not_found">
                                </div>
                                <div class="customer_content">
                                    <div class="customer_info">
                                        <ul class="rating_star ul_li">
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star-half-alt"></i></li>
                                        </ul>
                                        <h4 class="customer_name">Aonathor troet</h4>
                                        <span class="comment_date">JUNE 2, 2021</span>
                                    </div>
                                    <p class="mb-0">Nice Product, I got one in black. Goes with anything!</p>
                                </div>
                            </div>

                            <div class="customer_review_item clearfix">
                                <div class="customer_image">
                                    <img src="{{ asset('fontend/assets/images/team/team_2.jpg') }}"
                                        alt="image_not_found">
                                </div>
                                <div class="customer_content">
                                    <div class="customer_info">
                                        <ul class="rating_star ul_li">
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star-half-alt"></i></li>
                                        </ul>
                                        <h4 class="customer_name">Danial obrain</h4>
                                        <span class="comment_date">JUNE 2, 2021</span>
                                    </div>
                                    <p class="mb-0">
                                        Great product quality, Great Design and Great Service.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="customer_review_form">
                            <h4 class="reviews_tab_title">Add a review</h4>
                            <form action="#">
                                <div class="form_item">
                                    <input type="text" name="name" placeholder="Your name*">
                                </div>
                                <div class="form_item">
                                    <input type="email" name="email" placeholder="Your Email*">
                                </div>
                                <div class="your_ratings">
                                    <h5>Your Ratings:</h5>
                                    <button type="button"><i class="fal fa-star"></i></button>
                                    <button type="button"><i class="fal fa-star"></i></button>
                                    <button type="button"><i class="fal fa-star"></i></button>
                                    <button type="button"><i class="fal fa-star"></i></button>
                                    <button type="button"><i class="fal fa-star"></i></button>
                                </div>
                                <div class="form_item">
                                    <textarea name="comment" placeholder="Your Review*"></textarea>
                                </div>
                                <button type="submit" class="btn btn_primary">Submit Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product_details - end -->

    <!-- related_products_section - start-->
    <section class="related_products_section section_space">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="best-selling-products related-product-area">
                        <div class="sec-title-link">
                            <h3>Related products</h3>
                            <div class="view-all"><a href="#">View all<i class="fal fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="product-area clearfix">
                            <div class="grid">
                                <div class="product-pic">
                                    <img src="{{ asset('Product/Thumbnail/' . $products->created_at->format('Y/m/') . $products->id . '/' . $products->thumbnail) }}"
                                        alt>
                                    <div class="actions">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <svg role="img" xmlns="http://www.w3.org/2000/svg" width="48px"
                                                        height="48px" viewBox="0 0 24 24" stroke="#2329D6"
                                                        stroke-width="1" stroke-linecap="square" stroke-linejoin="miter"
                                                        fill="none" color="#2329D6">
                                                        <title>Favourite</title>
                                                        <path
                                                            d="M12,21 L10.55,19.7051771 C5.4,15.1242507 2,12.1029973 2,8.39509537 C2,5.37384196 4.42,3 7.5,3 C9.24,3 10.91,3.79455041 12,5.05013624 C13.09,3.79455041 14.76,3 16.5,3 C19.58,3 22,5.37384196 22,8.39509537 C22,12.1029973 18.6,15.1242507 13.45,19.7149864 L12,21 Z" />
                                                    </svg>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <svg role="img" xmlns="http://www.w3.org/2000/svg" width="48px"
                                                        height="48px" viewBox="0 0 24 24" stroke="#2329D6"
                                                        stroke-width="1" stroke-linecap="square" stroke-linejoin="miter"
                                                        fill="none" color="#2329D6">
                                                        <title>Shuffle</title>
                                                        <path
                                                            d="M21 16.0399H17.7707C15.8164 16.0399 13.9845 14.9697 12.8611 13.1716L10.7973 9.86831C9.67384 8.07022 7.84196 7 5.88762 7L3 7" />
                                                        <path
                                                            d="M21 7H17.7707C15.8164 7 13.9845 8.18388 12.8611 10.1729L10.7973 13.8271C9.67384 15.8161 7.84196 17 5.88762 17L3 17" />
                                                        <path d="M19 4L22 7L19 10" />
                                                        <path d="M19 13L22 16L19 19" />
                                                    </svg>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="#quickview_popup" data-bs-toggle="modal"
                                                    href="#quickview_popup{{ $products->id }}" role="button"
                                                    tabindex="0"><svg width="48px" height="48px"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                                        stroke="#2329D6" stroke-width="1" stroke-linecap="square"
                                                        stroke-linejoin="miter" fill="none" color="#2329D6">
                                                        <title>Visible (eye)</title>
                                                        <path
                                                            d="M22 12C22 12 19 18 12 18C5 18 2 12 2 12C2 12 5 6 12 6C19 6 22 12 22 12Z" />
                                                        <circle cx="12" cy="12" r="3" />
                                                    </svg>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="details">
                                    <h4><a href="#">{{ $products->product_title }}</a></h4>
                                    <p><a href="#">Apple MacBook Pro13.3″ Laptop with Touch ID </a></p>
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <span class="price">
                                        <ins>
                                            <span>
                                                <Span>$</span>{{ $products->price }}
                                            </span>
                                        </ins>
                                    </span>
                                    <div class="add-cart-area">
                                        <a class="btn btn-outline-secondary"
                                            style="padding-left: 65px;padding-right: 65px; border-radius:5px; color:rgb(39, 38, 38)"
                                            href="{{ route('SingleCart', $products->slug) }}">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- related_products_section - end-->

    <div class="modal fade" id="quickview_popup{{ $products->id }}" aria-labelledby="exampleModalToggleLabel2"
        tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel2">Product Quick View</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="product_details">
                        <div class="container">
                            <div class="row">
                                <div class="col col-lg-6">
                                    <div class="product_details_image p-0">
                                        <img src="{{ asset('Product/Thumbnail/' . $products->created_at->format('Y/m/') . $products->id . '/' . $products->thumbnail) }}"
                                            alt="">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="product_details_content">
                                        <h2 class="item_title">{{ $products->product_title }}</h2>
                                        <p>{{ $products->summery }}</p>
                                        <div class="item_review">
                                            <ul class="rating_star ul_li">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                            </ul>
                                            <span class="review_value">3 Rating(s)</span>
                                        </div>
                                        <div class="item_price">
                                            <span>
                                                <Span>$</span>{{ $products->price }}
                                                <del>$720.00</del>
                                            </span>
                                        </div>
                                        <hr>
                                        <div class="item_attribute">
                                            <h3 class="title_text">Options <span class="underline"></span></h3>
                                            <form action="#">
                                                <div class="row">
                                                    <div class="col col-md-6">
                                                        <div class="select_option clearfix">
                                                            <h4 class="input_title">Size *</h4>
                                                            <select style="display: none;">
                                                                <option>- Please select Size -
                                                                </option>
                                                                {{-- @foreach ($size as $value) --}}
                                                                <option value="{{ $products->id }}">
                                                                    {{ $products->size_name }}
                                                                </option>
                                                                {{-- @endforeach --}}
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col col-md-6">
                                                        <div class="select_option clearfix">
                                                            <h4 class="input_title">Color *</h4>
                                                            <select style="display: none;">
                                                                <option>- Please select Color -
                                                                </option>
                                                                {{-- @foreach ($color as $value) --}}
                                                                <option value="{{ $products->id }}">
                                                                    {{ $products->color_name }}
                                                                </option>
                                                                {{-- @endforeach --}}
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="repuired_text">Repuired Fiields*</span>
                                            </form>
                                        </div>

                                        <div class="quantity_wrap">
                                            <form action="#">
                                                <div class="quantity_input">
                                                    <button type="button" class="input_number_decrement">
                                                        <i class="fal fa-minus"></i>
                                                    </button>
                                                    <input class="input_number" type="text" value="1">
                                                    <button type="button" class="input_number_increment">
                                                        <i class="fal fa-plus"></i>
                                                    </button>
                                                </div>
                                            </form>
                                            <div class="total_price">
                                                <Span>Total: $</span>{{ $products->price }}
                                            </div>
                                        </div>

                                        <ul class="default_btns_group ul_li">
                                            <li><a class="addtocart_btn"
                                                    href="{{ route('SingleCart', $products->slug) }}">Add To
                                                    Cart</a></li>
                                            <li><a href="#!"><i class="far fa-compress-alt"></i></a></li>
                                            <li><a href="#!"><i class="fas fa-heart"></i></a>
                                            </li>
                                        </ul>

                                        <ul class="default_share_links ul_li">
                                            <li>
                                                <a class="facebook" href="#!">
                                                    <span><i class="fab fa-facebook-square"></i>
                                                        Like</span>
                                                    <small>10K</small>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="twitter" href="#!">
                                                    <span><i class="fab fa-twitter-square"></i>
                                                        Tweet</span>
                                                    <small>15K</small>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="google" href="#!">
                                                    <span><i class="fab fa-google-plus-square"></i>
                                                        Google+</span>
                                                    <small>20K</small>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="share" href="#!">
                                                    <span><i class="fas fa-plus-square"></i>Share</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_js')
@endsection
