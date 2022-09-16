@extends('Frontend.main')
@section('Fontend')
    active
@endsection
@section('index')
    <main>
        <!-- product quick view modal - start-->
        @foreach ($products as $product)
            <div class="modal fade" id="quickview_popup{{ $product->id }}" aria-labelledby="exampleModalToggleLabel2"
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
                                                <img src="{{ asset('Product/Thumbnail/' . $product->created_at->format('Y/m/') . $product->id . '/' . $product->thumbnail) }}"
                                                    alt="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="product_details_content">
                                                <h2 class="item_title">{{ $product->product_title }}</h2>
                                                <p>{{ $product->summery }}</p>
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
                                                    <div class="total_price">

                                                        <span>Total: $</span>{{ $product->price }}

                                                        <del>$720.00</del>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="item_attribute">
                                                    <h3 class="title_text">Options <span class="underline"></span></h3>
                                                    <form action="#">
                                                        <div class="row">
                                                            <div class="col col-md-6">
                                                                <div class="select_option clearfix">
                                                                <h4 class="input_title">Size *</h4>
                                                                @foreach ($attributes as $value)
                                                                    <select style="display: none;">
                                                                        <option>- Please select Size -</option>
                                                                        <option value="">{{ $value->size_name }}</option>
                                                                    </select>
                                                                @endforeach
                                                                </div>
                                                            </div>
                                                            <div class="col col-md-6">
                                                                <div class="select_option clearfix">
                                                                    <h4 class="input_title">Color *</h4>
                                                                    <select style="display: none;">
                                                                        <option>- Please select Color -</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <span class="repuired_text">Repuired Fiields *</span>
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
                                                        Total: ${{ $product->price }}
                                                    </div>
                                                </div>

                                                <ul class="default_btns_group ul_li">
                                                    <li><a class="addtocart_btn" href="{{ route('SingleCart', $product->slug) }}">Add To Cart</a></li>
                                                    <li><a href="#!"><i class="far fa-compress-alt"></i></a></li>
                                                    <li><a href="#!"><i class="fas fa-heart"></i></a></li>
                                                </ul>

                                                <ul class="default_share_links ul_li">
                                                    <li>
                                                        <a class="facebook" href="#!">
                                                            <span><i class="fab fa-facebook-square"></i> Like</span>
                                                            <small>10K</small>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="twitter" href="#!">
                                                            <span><i class="fab fa-twitter-square"></i> Tweet</span>
                                                            <small>15K</small>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="google" href="#!">
                                                            <span><i class="fab fa-google-plus-square"></i> Google+</span>
                                                            <small>20K</small>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="share" href="#!">
                                                            <span><i class="fas fa-plus-square"></i> Share</span>
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
        @endforeach


        <!-- slider_section - start-->

        <div class="container">
            <div class="row pt-4">
                <div class="col-3 mt-5 p-5">
                    <div class="p-2">
                        <a href="#"><img src="https://m.media-amazon.com/images/G/01/AdProductsWebsite/images/logos/OG_image_Squid_Ink.png" alt=""></a>
                    </div>
                    <div class="p-2">
                        <a href="#"><img src="https://1000logos.net/wp-content/uploads/2018/10/Alibaba-Logo.jpg" alt=""></a>
                    </div>
                </div>
                <div class="col-9">
                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('fontend/assets/images/slider/slide-2.jpg') }}" class="d-block w-100"
                                    alt="...">
                                <div class="carousel-caption">

                                    <div class="item_price mb-1" data-animation="fadeInUp2" data-delay=".6s">
                                        <h2 class="fw-bold text-white">Smart blood</h2>
                                    </div>
                                    <div class="item_price mb-3" data-animation="fadeInUp2" data-delay=".6s">
                                        <h1 class="fw-bold text-white">Pressure monitor</h1>
                                    </div>
                                    <div class="item_price mt-3" data-animation="fadeInUp2" data-delay=".6s">
                                        <h6 class="fw-bold">The best gadgets collection 2021</h6>
                                    </div>
                                    <div class="item_price mb-3" data-animation="fadeInUp2" data-delay=".6s">
                                        <del class="fw-bold">$430.00</del>
                                        <span class="sale_price fw-bold">$350.00</span>
                                    </div>
                                    <div class="item_price mt-3" data-animation="fadeInUp2" data-delay=".6s">
                                        <a class="btn btn_primary" href="shop_details.html" data-animation="fadeInUp2"
                                            data-delay=".8s">Start Buying</a>
                                    </div>

                                </div>

                            </div>

                            <div class="carousel-item">
                                <img src="{{ asset('fontend/assets/images/slider/slide-1.jpg') }}" class="d-block w-100"
                                    alt="...">
                                <div class="carousel-caption">

                                    <div class="item_price mb-1" data-animation="fadeInUp2" data-delay=".6s">
                                        <h2 class="fw-bold text-white">Smart blood</h2>
                                    </div>
                                    <div class="item_price mb-3" data-animation="fadeInUp2" data-delay=".6s">
                                        <h1 class="fw-bold text-white">Pressure monitor</h1>
                                    </div>
                                    <div class="item_price mt-3" data-animation="fadeInUp2" data-delay=".6s">
                                        <h6 class="fw-bold">The best gadgets collection 2021</h6>
                                    </div>
                                    <div class="item_price mb-3" data-animation="fadeInUp2" data-delay=".6s">
                                        <del class="fw-bold">$430.00</del>
                                        <span class="sale_price fw-bold">$350.00</span>
                                    </div>
                                    <div class="item_price mt-3" data-animation="fadeInUp2" data-delay=".6s">
                                        <a class="btn btn_primary" href="shop_details.html" data-animation="fadeInUp2"
                                            data-delay=".8s">Start Buying</a>
                                    </div>

                                </div>

                            </div>

                            <div class="carousel-item">
                                <img src="{{ asset('fontend/assets/images/slider/slide-3.jpg') }}" class="d-block w-100"
                                    alt="...">
                                <div class="carousel-caption">

                                    <div class="item_price mb-1" data-animation="fadeInUp2" data-delay=".6s">
                                        <h2 class="fw-bold text-white">Smart blood</h2>
                                    </div>
                                    <div class="item_price mb-3" data-animation="fadeInUp2" data-delay=".6s">
                                        <h1 class="fw-bold text-white">Pressure monitor</h1>
                                    </div>
                                    <div class="item_price mt-3" data-animation="fadeInUp2" data-delay=".6s">
                                        <h6 class="fw-bold">The best gadgets collection 2021</h6>
                                    </div>
                                    <div class="item_price mb-3" data-animation="fadeInUp2" data-delay=".6s">
                                        <del class="fw-bold">$430.00</del>
                                        <span class="sale_price fw-bold">$350.00</span>
                                    </div>
                                    <div class="item_price mt-3" data-animation="fadeInUp2" data-delay=".6s">
                                        <a class="btn btn_primary" href="shop_details.html" data-animation="fadeInUp2"
                                            data-delay=".8s">Start Buying</a>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- slider_section - end -->

        <!-- policy_section - start= -->
        <section class="policy_section">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="policy-wrap">
                            <div class="policy_item">
                                <div class="item_icon">
                                    <i class="icon icon-Truck"></i>
                                </div>
                                <div class="item_content">
                                    <h3 class="item_title">Free Shipping</h3>
                                    <p>
                                        Free shipping on all US order
                                    </p>
                                </div>
                            </div>

                            <div class="policy_item">
                                <div class="item_icon">
                                    <i class="icon icon-Headset"></i>
                                </div>
                                <div class="item_content">
                                    <h3 class="item_title">Support 24/ 7</h3>
                                    <p>
                                        Contact us 24 hours a day
                                    </p>
                                </div>
                            </div>

                            <div class="policy_item">
                                <div class="item_icon">
                                    <i class="icon icon-Wallet"></i>
                                </div>
                                <div class="item_content">
                                    <h3 class="item_title">100% Money Back</h3>
                                    <p>
                                        You have 30 days to Return
                                    </p>
                                </div>
                            </div>

                            <div class="policy_item">
                                <div class="item_icon">
                                    <i class="icon icon-Starship"></i>
                                </div>
                                <div class="item_content">
                                    <h3 class="item_title">90 Days Return</h3>
                                    <p>
                                        If goods have problems
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- policy_section - end-->


        <!-- products-with-sidebar-section - start -->
        <section class="products-with-sidebar-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 order-lg-3">
                        <div class="best-selling-products">
                            <div class="sec-title-link">
                                <h3>Best selling</h3>
                                <div class="view-all"><a href="#">View all<i
                                            class="fal fa-long-arrow-right"></i></a></div>
                            </div>
                            <div class="product-area clearfix">

                                @foreach ($products as $product)
                                    <div class="grid">
                                        <div class="product-pic">
                                            <img src="{{ asset('Product/Thumbnail/' . $product->created_at->format('Y/m/') . $product->id . '/' . $product->thumbnail) }}"
                                                alt="">
                                            <div class="actions">
                                                <ul>
                                                    <li>
                                                        <a href="#">
                                                            <svg role="img"
                                                                xmlns="http://www.w3.org/2000/svg" width="48px"
                                                                height="48px" viewBox="0 0 24 24" stroke="#2329D6"
                                                                stroke-width="1" stroke-linecap="square"
                                                                stroke-linejoin="miter" fill="none" color="#2329D6">
                                                                <title>Favourite</title>
                                                                <path
                                                                    d="M12,21 L10.55,19.7051771 C5.4,15.1242507 2,12.1029973 2,8.39509537 C2,5.37384196 4.42,3 7.5,3 C9.24,3 10.91,3.79455041 12,5.05013624 C13.09,3.79455041 14.76,3 16.5,3 C19.58,3 22,5.37384196 22,8.39509537 C22,12.1029973 18.6,15.1242507 13.45,19.7149864 L12,21 Z">
                                                                </path>
                                                            </svg>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <svg role="img"
                                                                xmlns="http://www.w3.org/2000/svg" width="48px"
                                                                height="48px" viewBox="0 0 24 24" stroke="#2329D6"
                                                                stroke-width="1" stroke-linecap="square"
                                                                stroke-linejoin="miter" fill="none" color="#2329D6">
                                                                <title>Shuffle</title>
                                                                <path
                                                                    d="M21 16.0399H17.7707C15.8164 16.0399 13.9845 14.9697 12.8611 13.1716L10.7973 9.86831C9.67384 8.07022 7.84196 7 5.88762 7L3 7">
                                                                </path>
                                                                <path
                                                                    d="M21 7H17.7707C15.8164 7 13.9845 8.18388 12.8611 10.1729L10.7973 13.8271C9.67384 15.8161 7.84196 17 5.88762 17L3 17">
                                                                </path>
                                                                <path d="M19 4L22 7L19 10"></path>
                                                                <path d="M19 13L22 16L19 19"></path>
                                                            </svg>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="quickview_btn" data-bs-toggle="modal"
                                                            href="#quickview_popup{{ $product->id }}" role="button"
                                                            tabindex="0">
                                                            <svg width="48px" height="48px"
                                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                                                stroke="#2329D6" stroke-width="1" stroke-linecap="square"
                                                                stroke-linejoin="miter" fill="none" color="#2329D6">
                                                                <title>Visible (eye)</title>
                                                                <path
                                                                    d="M22 12C22 12 19 18 12 18C5 18 2 12 2 12C2 12 5 6 12 6C19 6 22 12 22 12Z">
                                                                </path>
                                                                <circle cx="12" cy="12" r="3">
                                                                </circle>
                                                            </svg>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="details">
                                            <h4><a
                                                    href="{{ route('SingleProduct', $product->slug) }}">{{ $product->product_title }}</a>
                                            </h4>
                                            <p><a href="#">Apple MacBook Pro13.3″ Laptop with new Touch bar ID </a>
                                            </p>
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
                                                        <div>
                                                            <span>${{ $product->price }}</span>
                                                        </div>
                                                    </span>
                                                </ins>
                                            </span>
                                            <div class="add-cart-area">
                                                <a class="btn btn-outline-secondary"
                                                    style="padding-left: 70px;padding-right: 60px; border-radius:5px; color:rgb(150, 8, 79)"
                                                    href="{{ route('SingleCart', $product->slug) }}">Add To Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                        <div class="top_category_wrap">
                            <div class="sec-title-link">
                                <h3>Top categories</h3>
                            </div>
                            <div class="top_category_carousel2 slick-initialized slick-slider"
                                data-slick="{&quot;dots&quot;: false}">
                                <div class="slick-list draggable">
                                    <div class="slick-track"
                                        style="opacity: 1; width: 5700px; transform: translate3d(-900px, 0px, 0px);">
                                        <div class="slider_item slick-slide slick-cloned" data-slick-index="-3"
                                            id="" aria-hidden="true" tabindex="-1" style="width: 276px;">
                                            <div class="category_boxed">
                                                <a href="#!" tabindex="-1">
                                                    <span class="item_image">
                                                        <img src="fontend/assets/images/categories/category_1.png"
                                                            alt="image_not_found">
                                                    </span>
                                                    <span class="item_title">Men's Watches</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="slider_item slick-slide slick-cloned" data-slick-index="-2"
                                            id="" aria-hidden="true" tabindex="-1" style="width: 276px;">
                                            <div class="category_boxed">
                                                <a href="#!" tabindex="-1">
                                                    <span class="item_image">
                                                        <img src="fontend/assets/images/categories/category_2.png"
                                                            alt="image_not_found">
                                                    </span>
                                                    <span class="item_title">CCTV Camera</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="slider_item slick-slide slick-cloned" data-slick-index="-1"
                                            id="" aria-hidden="true" tabindex="-1" style="width: 276px;">
                                            <div class="category_boxed">
                                                <a href="#!" tabindex="-1">
                                                    <span class="item_image">
                                                        <img src="fontend/assets/images/categories/category_3.png"
                                                            alt="image_not_found">
                                                    </span>
                                                    <span class="item_title">CCTV Camera</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="slider_item slick-slide slick-current slick-active"
                                            data-slick-index="0" aria-hidden="false" tabindex="0"
                                            style="width: 276px;">
                                            <div class="category_boxed">
                                                <a href="#!" tabindex="0">
                                                    <span class="item_image">
                                                        <img src="fontend/assets/images/categories/category_1.png"
                                                            alt="image_not_found">
                                                    </span>
                                                    <span class="item_title">Men's Watches</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="slider_item slick-slide slick-active" data-slick-index="1"
                                            aria-hidden="false" tabindex="0" style="width: 276px;">
                                            <div class="category_boxed">
                                                <a href="#!" tabindex="0">
                                                    <span class="item_image">
                                                        <img src="fontend/assets/images/categories/category_2.png"
                                                            alt="image_not_found">
                                                    </span>
                                                    <span class="item_title">iPad</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="slider_item slick-slide slick-active" data-slick-index="2"
                                            aria-hidden="false" tabindex="0" style="width: 276px;">
                                            <div class="category_boxed">
                                                <a href="#!" tabindex="0">
                                                    <span class="item_image">
                                                        <img src="fontend/assets/images/categories/category_3.png"
                                                            alt="image_not_found">
                                                    </span>
                                                    <span class="item_title">iPhone</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="slider_item slick-slide" data-slick-index="3" aria-hidden="true"
                                            tabindex="-1" style="width: 276px;">
                                            <div class="category_boxed">
                                                <a href="#!" tabindex="-1">
                                                    <span class="item_image">
                                                        <img src="fontend/assets/images/categories/category_4.png"
                                                            alt="image_not_found">
                                                    </span>
                                                    <span class="item_title">Headphone</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="slider_item slick-slide" data-slick-index="4" aria-hidden="true"
                                            tabindex="-1" style="width: 276px;">
                                            <div class="category_boxed">
                                                <a href="#!" tabindex="-1">
                                                    <span class="item_image">
                                                        <img src="fontend/assets/images/categories/category_5.png"
                                                            alt="image_not_found">
                                                    </span>
                                                    <span class="item_title">Mac Mini</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="slider_item slick-slide" data-slick-index="5" aria-hidden="true"
                                            tabindex="-1" style="width: 276px;">
                                            <div class="category_boxed">
                                                <a href="#!" tabindex="-1">
                                                    <span class="item_image">
                                                        <img src="fontend/assets/images/categories/category_1.png"
                                                            alt="image_not_found">
                                                    </span>
                                                    <span class="item_title">Men's Watches</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="slider_item slick-slide" data-slick-index="6" aria-hidden="true"
                                            tabindex="-1" style="width: 276px;">
                                            <div class="category_boxed">
                                                <a href="#!" tabindex="-1">
                                                    <span class="item_image">
                                                        <img src="fontend/assets/images/categories/category_2.png"
                                                            alt="image_not_found">
                                                    </span>
                                                    <span class="item_title">CCTV Camera</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="slider_item slick-slide" data-slick-index="7" aria-hidden="true"
                                            tabindex="-1" style="width: 276px;">
                                            <div class="category_boxed">
                                                <a href="#!" tabindex="-1">
                                                    <span class="item_image">
                                                        <img src="fontend/assets/images/categories/category_3.png"
                                                            alt="image_not_found">
                                                    </span>
                                                    <span class="item_title">CCTV Camera</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="slider_item slick-slide slick-cloned" data-slick-index="8"
                                            id="" aria-hidden="true" tabindex="-1" style="width: 276px;">
                                            <div class="category_boxed">
                                                <a href="#!" tabindex="-1">
                                                    <span class="item_image">
                                                        <img src="fontend/assets/images/categories/category_1.png"
                                                            alt="image_not_found">
                                                    </span>
                                                    <span class="item_title">Men's Watches</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="slider_item slick-slide slick-cloned" data-slick-index="9"
                                            id="" aria-hidden="true" tabindex="-1" style="width: 276px;">
                                            <div class="category_boxed">
                                                <a href="#!" tabindex="-1">
                                                    <span class="item_image">
                                                        <img src="fontend/assets/images/categories/category_2.png"
                                                            alt="image_not_found">
                                                    </span>
                                                    <span class="item_title">iPad</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="slider_item slick-slide slick-cloned" data-slick-index="10"
                                            id="" aria-hidden="true" tabindex="-1" style="width: 276px;">
                                            <div class="category_boxed">
                                                <a href="#!" tabindex="-1">
                                                    <span class="item_image">
                                                        <img src="fontend/assets/images/categories/category_3.png"
                                                            alt="image_not_found">
                                                    </span>
                                                    <span class="item_title">iPhone</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="slider_item slick-slide slick-cloned" data-slick-index="11"
                                            id="" aria-hidden="true" tabindex="-1" style="width: 276px;">
                                            <div class="category_boxed">
                                                <a href="#!" tabindex="-1">
                                                    <span class="item_image">
                                                        <img src="fontend/assets/images/categories/category_4.png"
                                                            alt="image_not_found">
                                                    </span>
                                                    <span class="item_title">Headphone</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="slider_item slick-slide slick-cloned" data-slick-index="12"
                                            id="" aria-hidden="true" tabindex="-1" style="width: 276px;">
                                            <div class="category_boxed">
                                                <a href="#!" tabindex="-1">
                                                    <span class="item_image">
                                                        <img src="fontend/assets/images/categories/category_5.png"
                                                            alt="image_not_found">
                                                    </span>
                                                    <span class="item_title">Mac Mini</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="slider_item slick-slide slick-cloned" data-slick-index="13"
                                            id="" aria-hidden="true" tabindex="-1" style="width: 276px;">
                                            <div class="category_boxed">
                                                <a href="#!" tabindex="-1">
                                                    <span class="item_image">
                                                        <img src="fontend/assets/images/categories/category_1.png"
                                                            alt="image_not_found">
                                                    </span>
                                                    <span class="item_title">Men's Watches</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="slider_item slick-slide slick-cloned" data-slick-index="14"
                                            id="" aria-hidden="true" tabindex="-1" style="width: 276px;">
                                            <div class="category_boxed">
                                                <a href="#!" tabindex="-1">
                                                    <span class="item_image">
                                                        <img src="fontend/assets/images/categories/category_2.png"
                                                            alt="image_not_found">
                                                    </span>
                                                    <span class="item_title">CCTV Camera</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="slider_item slick-slide slick-cloned" data-slick-index="15"
                                            id="" aria-hidden="true" tabindex="-1" style="width: 276px;">
                                            <div class="category_boxed">
                                                <a href="#!" tabindex="-1">
                                                    <span class="item_image">
                                                        <img src="fontend/assets/images/categories/category_3.png"
                                                            alt="image_not_found">
                                                    </span>
                                                    <span class="item_title">CCTV Camera</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="carousel_nav carousel-nav-top-right">
                                <button type="button" class="tc_left_arrow slick-arrow" style=""><i
                                        class="fal fa-long-arrow-alt-left"></i></button>
                                <button type="button" class="tc_right_arrow slick-arrow" style=""><i
                                        class="fal fa-long-arrow-alt-right"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 order-lg-9">
                        <div class="product-sidebar">
                            <div class="widget latest_product_carousel">
                                <div class="title_wrap">
                                    <h3 class="area_title">Latest Products</h3>
                                    <div class="carousel_nav">
                                        <button type="button" class="vs4i_left_arrow slick-arrow" style=""><i
                                                class="fal fa-angle-left"></i></button>
                                        <button type="button" class="vs4i_right_arrow slick-arrow" style=""><i
                                                class="fal fa-angle-right"></i></button>
                                    </div>
                                </div>
                                <div class="vertical_slider_4item slick-initialized slick-slider slick-vertical"
                                    data-slick="{&quot;dots&quot;: false}">
                                    <div class="slick-list draggable" style="height: 488px;">
                                        <div class="slick-track"
                                            style="opacity: 1; height: 2440px; transform: translate3d(0px, -976px, 0px);">
                                            <div class="slider_item slick-slide slick-cloned" data-slick-index="-4"
                                                id="" aria-hidden="true" tabindex="-1" style="width: 274px;">
                                                <div class="small_product_layout">
                                                    <a class="item_image" href="shop_details.html" tabindex="-1">
                                                        <img src="fontend/assets/images/latest_product/latest_product_1.png"
                                                            alt="image_not_found">
                                                    </a>
                                                    <div class="item_content">
                                                        <h3 class="item_title">
                                                            <a href="shop_details.html" tabindex="-1">Product
                                                                Sample</a>
                                                        </h3>
                                                        <ul class="rating_star ul_li">
                                                            <li>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star-half-alt"></i>
                                                            </li>
                                                        </ul>
                                                        <div class="item_price">
                                                            <span>$690.99</span>
                                                            <del>$720.00</del>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slider_item slick-slide slick-cloned" data-slick-index="-3"
                                                id="" aria-hidden="true" tabindex="-1" style="width: 274px;">
                                                <div class="small_product_layout">
                                                    <a class="item_image" href="shop_details.html" tabindex="-1">
                                                        <img src="fontend/assets/images/latest_product/latest_product_2.png"
                                                            alt="image_not_found">
                                                    </a>
                                                    <div class="item_content">
                                                        <h3 class="item_title">
                                                            <a href="shop_details.html" tabindex="-1">Product
                                                                Sample</a>
                                                        </h3>
                                                        <ul class="rating_star ul_li">
                                                            <li>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star-half-alt"></i>
                                                            </li>
                                                        </ul>
                                                        <div class="item_price">
                                                            <span>$690.99</span>
                                                            <del>$720.00</del>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slider_item slick-slide slick-cloned" data-slick-index="-2"
                                                id="" aria-hidden="true" tabindex="-1" style="width: 274px;">
                                                <div class="small_product_layout">
                                                    <a class="item_image" href="shop_details.html" tabindex="-1">
                                                        <img src="fontend/assets/images/latest_product/latest_product_3.png"
                                                            alt="image_not_found">
                                                    </a>
                                                    <div class="item_content">
                                                        <h3 class="item_title">
                                                            <a href="shop_details.html" tabindex="-1">Product
                                                                Sample</a>
                                                        </h3>
                                                        <ul class="rating_star ul_li">
                                                            <li>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star-half-alt"></i>
                                                            </li>
                                                        </ul>
                                                        <div class="item_price">
                                                            <span>$690.99</span>
                                                            <del>$720.00</del>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slider_item slick-slide slick-cloned" data-slick-index="-1"
                                                id="" aria-hidden="true" tabindex="-1" style="width: 274px;">
                                                <div class="small_product_layout">
                                                    <a class="item_image" href="shop_details.html" tabindex="-1">
                                                        <img src="fontend/assets/images/latest_product/latest_product_4.png"
                                                            alt="image_not_found">
                                                    </a>
                                                    <div class="item_content">
                                                        <h3 class="item_title">
                                                            <a href="shop_details.html" tabindex="-1">Product
                                                                Sample</a>
                                                        </h3>
                                                        <ul class="rating_star ul_li">
                                                            <li>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star-half-alt"></i>
                                                            </li>
                                                        </ul>
                                                        <div class="item_price">
                                                            <span>$690.99</span>
                                                            <del>$720.00</del>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slider_item slick-slide" data-slick-index="0" aria-hidden="true"
                                                tabindex="-1" style="width: 274px;">
                                                <div class="small_product_layout">
                                                    <a class="item_image" href="shop_details.html" tabindex="-1">
                                                        <img src="fontend/assets/images/latest_product/latest_product_1.png"
                                                            alt="image_not_found">
                                                    </a>
                                                    <div class="item_content">
                                                        <h3 class="item_title">
                                                            <a href="shop_details.html" tabindex="-1">Product
                                                                Sample</a>
                                                        </h3>
                                                        <ul class="rating_star ul_li">
                                                            <li>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star-half-alt"></i>
                                                            </li>
                                                        </ul>
                                                        <div class="item_price">
                                                            <span>$690.99</span>
                                                            <del>$720.00</del>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slider_item slick-slide" data-slick-index="1" aria-hidden="true"
                                                tabindex="-1" style="width: 274px;">
                                                <div class="small_product_layout">
                                                    <a class="item_image" href="shop_details.html" tabindex="-1">
                                                        <img src="fontend/assets/images/latest_product/latest_product_2.png"
                                                            alt="image_not_found">
                                                    </a>
                                                    <div class="item_content">
                                                        <h3 class="item_title">
                                                            <a href="shop_details.html" tabindex="-1">Product
                                                                Sample</a>
                                                        </h3>
                                                        <ul class="rating_star ul_li">
                                                            <li>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star-half-alt"></i>
                                                            </li>
                                                        </ul>
                                                        <div class="item_price">
                                                            <span>$690.99</span>
                                                            <del>$720.00</del>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slider_item slick-slide" data-slick-index="2" aria-hidden="true"
                                                tabindex="-1" style="width: 274px;">
                                                <div class="small_product_layout">
                                                    <a class="item_image" href="shop_details.html" tabindex="-1">
                                                        <img src="fontend/assets/images/latest_product/latest_product_3.png"
                                                            alt="image_not_found">
                                                    </a>
                                                    <div class="item_content">
                                                        <h3 class="item_title">
                                                            <a href="shop_details.html" tabindex="-1">Product
                                                                Sample</a>
                                                        </h3>
                                                        <ul class="rating_star ul_li">
                                                            <li>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star-half-alt"></i>
                                                            </li>
                                                        </ul>
                                                        <div class="item_price">
                                                            <span>$690.99</span>
                                                            <del>$720.00</del>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slider_item slick-slide" data-slick-index="3" aria-hidden="true"
                                                tabindex="-1" style="width: 274px;">
                                                <div class="small_product_layout">
                                                    <a class="item_image" href="shop_details.html" tabindex="-1">
                                                        <img src="fontend/assets/images/latest_product/latest_product_4.png"
                                                            alt="image_not_found">
                                                    </a>
                                                    <div class="item_content">
                                                        <h3 class="item_title">
                                                            <a href="shop_details.html" tabindex="-1">Product
                                                                Sample</a>
                                                        </h3>
                                                        <ul class="rating_star ul_li">
                                                            <li>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star-half-alt"></i>
                                                            </li>
                                                        </ul>
                                                        <div class="item_price">
                                                            <span>$690.99</span>
                                                            <del>$720.00</del>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slider_item slick-slide slick-current slick-active"
                                                data-slick-index="4" aria-hidden="false" tabindex="0"
                                                style="width: 274px;">
                                                <div class="small_product_layout">
                                                    <a class="item_image" href="shop_details.html" tabindex="0">
                                                        <img src="fontend/assets/images/latest_product/latest_product_1.png"
                                                            alt="image_not_found">
                                                    </a>
                                                    <div class="item_content">
                                                        <h3 class="item_title">
                                                            <a href="shop_details.html" tabindex="0">Product
                                                                Sample</a>
                                                        </h3>
                                                        <ul class="rating_star ul_li">
                                                            <li>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star-half-alt"></i>
                                                            </li>
                                                        </ul>
                                                        <div class="item_price">
                                                            <span>$690.99</span>
                                                            <del>$720.00</del>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slider_item slick-slide slick-active" data-slick-index="5"
                                                aria-hidden="false" tabindex="0" style="width: 274px;">
                                                <div class="small_product_layout">
                                                    <a class="item_image" href="shop_details.html" tabindex="0">
                                                        <img src="fontend/assets/images/latest_product/latest_product_2.png"
                                                            alt="image_not_found">
                                                    </a>
                                                    <div class="item_content">
                                                        <h3 class="item_title">
                                                            <a href="shop_details.html" tabindex="0">Product
                                                                Sample</a>
                                                        </h3>
                                                        <ul class="rating_star ul_li">
                                                            <li>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star-half-alt"></i>
                                                            </li>
                                                        </ul>
                                                        <div class="item_price">
                                                            <span>$690.99</span>
                                                            <del>$720.00</del>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slider_item slick-slide slick-active" data-slick-index="6"
                                                aria-hidden="false" tabindex="0" style="width: 274px;">
                                                <div class="small_product_layout">
                                                    <a class="item_image" href="shop_details.html" tabindex="0">
                                                        <img src="fontend/assets/images/latest_product/latest_product_3.png"
                                                            alt="image_not_found">
                                                    </a>
                                                    <div class="item_content">
                                                        <h3 class="item_title">
                                                            <a href="shop_details.html" tabindex="0">Product
                                                                Sample</a>
                                                        </h3>
                                                        <ul class="rating_star ul_li">
                                                            <li>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star-half-alt"></i>
                                                            </li>
                                                        </ul>
                                                        <div class="item_price">
                                                            <span>$690.99</span>
                                                            <del>$720.00</del>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slider_item slick-slide slick-active" data-slick-index="7"
                                                aria-hidden="false" tabindex="0" style="width: 274px;">
                                                <div class="small_product_layout">
                                                    <a class="item_image" href="shop_details.html" tabindex="0">
                                                        <img src="fontend/assets/images/latest_product/latest_product_4.png"
                                                            alt="image_not_found">
                                                    </a>
                                                    <div class="item_content">
                                                        <h3 class="item_title">
                                                            <a href="shop_details.html" tabindex="0">Product
                                                                Sample</a>
                                                        </h3>
                                                        <ul class="rating_star ul_li">
                                                            <li>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star-half-alt"></i>
                                                            </li>
                                                        </ul>
                                                        <div class="item_price">
                                                            <span>$690.99</span>
                                                            <del>$720.00</del>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slider_item slick-slide slick-cloned" data-slick-index="8"
                                                id="" aria-hidden="true" tabindex="-1" style="width: 274px;">
                                                <div class="small_product_layout">
                                                    <a class="item_image" href="shop_details.html" tabindex="-1">
                                                        <img src="fontend/assets/images/latest_product/latest_product_1.png"
                                                            alt="image_not_found">
                                                    </a>
                                                    <div class="item_content">
                                                        <h3 class="item_title">
                                                            <a href="shop_details.html" tabindex="-1">Product
                                                                Sample</a>
                                                        </h3>
                                                        <ul class="rating_star ul_li">
                                                            <li>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star-half-alt"></i>
                                                            </li>
                                                        </ul>
                                                        <div class="item_price">
                                                            <span>$690.99</span>
                                                            <del>$720.00</del>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slider_item slick-slide slick-cloned" data-slick-index="9"
                                                id="" aria-hidden="true" tabindex="-1" style="width: 274px;">
                                                <div class="small_product_layout">
                                                    <a class="item_image" href="shop_details.html" tabindex="-1">
                                                        <img src="fontend/assets/images/latest_product/latest_product_2.png"
                                                            alt="image_not_found">
                                                    </a>
                                                    <div class="item_content">
                                                        <h3 class="item_title">
                                                            <a href="shop_details.html" tabindex="-1">Product
                                                                Sample</a>
                                                        </h3>
                                                        <ul class="rating_star ul_li">
                                                            <li>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star-half-alt"></i>
                                                            </li>
                                                        </ul>
                                                        <div class="item_price">
                                                            <span>$690.99</span>
                                                            <del>$720.00</del>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slider_item slick-slide slick-cloned" data-slick-index="10"
                                                id="" aria-hidden="true" tabindex="-1" style="width: 274px;">
                                                <div class="small_product_layout">
                                                    <a class="item_image" href="shop_details.html" tabindex="-1">
                                                        <img src="fontend/assets/images/latest_product/latest_product_3.png"
                                                            alt="image_not_found">
                                                    </a>
                                                    <div class="item_content">
                                                        <h3 class="item_title">
                                                            <a href="shop_details.html" tabindex="-1">Product
                                                                Sample</a>
                                                        </h3>
                                                        <ul class="rating_star ul_li">
                                                            <li>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star-half-alt"></i>
                                                            </li>
                                                        </ul>
                                                        <div class="item_price">
                                                            <span>$690.99</span>
                                                            <del>$720.00</del>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slider_item slick-slide slick-cloned" data-slick-index="11"
                                                id="" aria-hidden="true" tabindex="-1" style="width: 274px;">
                                                <div class="small_product_layout">
                                                    <a class="item_image" href="shop_details.html" tabindex="-1">
                                                        <img src="fontend/assets/images/latest_product/latest_product_4.png"
                                                            alt="image_not_found">
                                                    </a>
                                                    <div class="item_content">
                                                        <h3 class="item_title">
                                                            <a href="shop_details.html" tabindex="-1">Product
                                                                Sample</a>
                                                        </h3>
                                                        <ul class="rating_star ul_li">
                                                            <li>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star-half-alt"></i>
                                                            </li>
                                                        </ul>
                                                        <div class="item_price">
                                                            <span>$690.99</span>
                                                            <del>$720.00</del>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slider_item slick-slide slick-cloned" data-slick-index="12"
                                                id="" aria-hidden="true" tabindex="-1" style="width: 274px;">
                                                <div class="small_product_layout">
                                                    <a class="item_image" href="shop_details.html" tabindex="-1">
                                                        <img src="fontend/assets/images/latest_product/latest_product_1.png"
                                                            alt="image_not_found">
                                                    </a>
                                                    <div class="item_content">
                                                        <h3 class="item_title">
                                                            <a href="shop_details.html" tabindex="-1">Product
                                                                Sample</a>
                                                        </h3>
                                                        <ul class="rating_star ul_li">
                                                            <li>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star-half-alt"></i>
                                                            </li>
                                                        </ul>
                                                        <div class="item_price">
                                                            <span>$690.99</span>
                                                            <del>$720.00</del>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slider_item slick-slide slick-cloned" data-slick-index="13"
                                                id="" aria-hidden="true" tabindex="-1" style="width: 274px;">
                                                <div class="small_product_layout">
                                                    <a class="item_image" href="shop_details.html" tabindex="-1">
                                                        <img src="fontend/assets/images/latest_product/latest_product_2.png"
                                                            alt="image_not_found">
                                                    </a>
                                                    <div class="item_content">
                                                        <h3 class="item_title">
                                                            <a href="shop_details.html" tabindex="-1">Product
                                                                Sample</a>
                                                        </h3>
                                                        <ul class="rating_star ul_li">
                                                            <li>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star-half-alt"></i>
                                                            </li>
                                                        </ul>
                                                        <div class="item_price">
                                                            <span>$690.99</span>
                                                            <del>$720.00</del>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slider_item slick-slide slick-cloned" data-slick-index="14"
                                                id="" aria-hidden="true" tabindex="-1" style="width: 274px;">
                                                <div class="small_product_layout">
                                                    <a class="item_image" href="shop_details.html" tabindex="-1">
                                                        <img src="fontend/assets/images/latest_product/latest_product_3.png"
                                                            alt="image_not_found">
                                                    </a>
                                                    <div class="item_content">
                                                        <h3 class="item_title">
                                                            <a href="shop_details.html" tabindex="-1">Product
                                                                Sample</a>
                                                        </h3>
                                                        <ul class="rating_star ul_li">
                                                            <li>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star-half-alt"></i>
                                                            </li>
                                                        </ul>
                                                        <div class="item_price">
                                                            <span>$690.99</span>
                                                            <del>$720.00</del>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slider_item slick-slide slick-cloned" data-slick-index="15"
                                                id="" aria-hidden="true" tabindex="-1" style="width: 274px;">
                                                <div class="small_product_layout">
                                                    <a class="item_image" href="shop_details.html" tabindex="-1">
                                                        <img src="fontend/assets/images/latest_product/latest_product_4.png"
                                                            alt="image_not_found">
                                                    </a>
                                                    <div class="item_content">
                                                        <h3 class="item_title">
                                                            <a href="shop_details.html" tabindex="-1">Product
                                                                Sample</a>
                                                        </h3>
                                                        <ul class="rating_star ul_li">
                                                            <li>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star-half-alt"></i>
                                                            </li>
                                                        </ul>
                                                        <div class="item_price">
                                                            <span>$690.99</span>
                                                            <del>$720.00</del>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget product-add">
                                <div class="product-img">
                                    <img src="fontend/assets/images/shop/product_img_10.png" alt="">
                                </div>
                                <div class="details">
                                    <h4>iPad pro</h4>
                                    <p>iPad pro with M1 chipe</p>
                                    <a class="btn btn_primary" href="#">Start Buying</a>
                                </div>
                            </div>
                            <div class="widget audio-widget">
                                <h5>Audio <span>5</span></h5>
                                <ul>
                                    <li><a href="#">MI headphone</a></li>
                                    <li><a href="#">Bluetooth AirPods</a></li>
                                    <li><a href="#">Music system</a></li>
                                    <li><a href="#">JBL bar 5.1</a></li>
                                    <li><a href="#">Edifier Computer Speaker</a></li>
                                    <li><a href="#">Macbook pro</a></li>
                                    <li><a href="#">Men's watch</a></li>
                                    <li><a href="#">Washing metchin</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end container  -->
        </section>
        <!-- products-with-sidebar-section - end -->


        <!-- promotion_section - start -->
        <section class="promotion_section">
            <div class="container">
                <div class="row promotion_banner_wrap">
                    <div class="col col-lg-6">
                        <div class="promotion_banner">
                            <div class="item_image">
                                <img src="fontend/assets/images/promotion/banner_img_1.png" alt="">
                            </div>
                            <div class="item_content">
                                <h3 class="item_title">Protective sleeves <span>combo.</span></h3>
                                <p>It is a long established fact that a reader will be distracted</p>
                                <a class="btn btn_primary" href="shop_details.html">Shop Now</a>
                            </div>
                        </div>
                    </div>

                    <div class="col col-lg-6">
                        <div class="promotion_banner">
                            <div class="item_image">
                                <img src="fontend/assets/images/promotion/banner_img_2.png" alt="">
                            </div>
                            <div class="item_content">
                                <h3 class="item_title">Nutrillet blender <span>combo.</span></h3>
                                <p>
                                    It is a long established fact that a reader will be distracted
                                </p>
                                <a class="btn btn_primary" href="shop_details.html">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- promotion_section - end -->

        <!-- new_arrivals_section - start -->
        <section class="new_arrivals_section section_space">
            <div class="container">
                <div class="sec-title-link">
                    <h3>New Arrivals</h3>
                </div>

                <div class="row newarrivals_products">
                    <div class="col col-lg-5">
                        <div class="deals_product_layout1">
                            <div class="bg_area">
                                <h3 class="item_title">Best <span>Product</span> Deals</h3>
                                <p>
                                    Get a 20% Cashback when buying TWS Product From SoundPro Audio Technology.
                                </p>
                                <a class="btn btn_primary" href="shop_details.html">Shop Now</a>
                            </div>
                        </div>
                    </div>

                    <div class="col col-lg-7">
                        <div class="new-arrivals-grids clearfix">
                            <div class="grid">
                                <div class="product-pic">
                                    <img src="fontend/assets/images/shop/product-img-28.png" alt="">
                                    <div class="actions">
                                        <ul>
                                            <li>
                                                <a href="#"><svg role="img"
                                                        xmlns="http://www.w3.org/2000/svg" width="48px"
                                                        height="48px" viewBox="0 0 24 24" stroke="#2329D6"
                                                        stroke-width="1" stroke-linecap="square"
                                                        stroke-linejoin="miter" fill="none" color="#2329D6">
                                                        <title>Favourite</title>
                                                        <path
                                                            d="M12,21 L10.55,19.7051771 C5.4,15.1242507 2,12.1029973 2,8.39509537 C2,5.37384196 4.42,3 7.5,3 C9.24,3 10.91,3.79455041 12,5.05013624 C13.09,3.79455041 14.76,3 16.5,3 C19.58,3 22,5.37384196 22,8.39509537 C22,12.1029973 18.6,15.1242507 13.45,19.7149864 L12,21 Z">
                                                        </path>
                                                    </svg></a>
                                            </li>
                                            <li>
                                                <a href="#"><svg role="img"
                                                        xmlns="http://www.w3.org/2000/svg" width="48px"
                                                        height="48px" viewBox="0 0 24 24" stroke="#2329D6"
                                                        stroke-width="1" stroke-linecap="square"
                                                        stroke-linejoin="miter" fill="none" color="#2329D6">
                                                        <title>Shuffle</title>
                                                        <path
                                                            d="M21 16.0399H17.7707C15.8164 16.0399 13.9845 14.9697 12.8611 13.1716L10.7973 9.86831C9.67384 8.07022 7.84196 7 5.88762 7L3 7">
                                                        </path>
                                                        <path
                                                            d="M21 7H17.7707C15.8164 7 13.9845 8.18388 12.8611 10.1729L10.7973 13.8271C9.67384 15.8161 7.84196 17 5.88762 17L3 17">
                                                        </path>
                                                        <path d="M19 4L22 7L19 10"></path>
                                                        <path d="M19 13L22 16L19 19"></path>
                                                    </svg></a>
                                            </li>
                                            <li>
                                                <a href="#"><svg width="48px" height="48px"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                                        stroke="#2329D6" stroke-width="1" stroke-linecap="square"
                                                        stroke-linejoin="miter" fill="none" color="#2329D6">
                                                        <title>Visible (eye)</title>
                                                        <path
                                                            d="M22 12C22 12 19 18 12 18C5 18 2 12 2 12C2 12 5 6 12 6C19 6 22 12 22 12Z">
                                                        </path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="details">
                                    <h4><a href="#">iPhone 13 pro</a></h4>
                                    <p><a href="#">A dramatically more powerful camera system a display</a></p>
                                    <span class="price">
                                        <ins>
                                            <span class="woocommerce-Price-amount amount">
                                                <bdi>
                                                    <span class="woocommerce-Price-currencySymbol">$</span>471.48
                                                </bdi>
                                            </span>
                                        </ins>
                                    </span>
                                    <div class="add-cart-area">
                                        <button class="add-to-cart">Add to cart</button>
                                    </div>
                                </div>
                            </div>
                            <div class="grid">
                                <div class="product-pic">
                                    <img src="fontend/assets/images/shop/product-img-26.png" alt="">
                                    <span class="theme-badge-2">20% off</span>
                                    <div class="actions">
                                        <ul>
                                            <li>
                                                <a href="#"><svg role="img"
                                                        xmlns="http://www.w3.org/2000/svg" width="48px"
                                                        height="48px" viewBox="0 0 24 24" stroke="#2329D6"
                                                        stroke-width="1" stroke-linecap="square"
                                                        stroke-linejoin="miter" fill="none" color="#2329D6">
                                                        <title>Favourite</title>
                                                        <path
                                                            d="M12,21 L10.55,19.7051771 C5.4,15.1242507 2,12.1029973 2,8.39509537 C2,5.37384196 4.42,3 7.5,3 C9.24,3 10.91,3.79455041 12,5.05013624 C13.09,3.79455041 14.76,3 16.5,3 C19.58,3 22,5.37384196 22,8.39509537 C22,12.1029973 18.6,15.1242507 13.45,19.7149864 L12,21 Z">
                                                        </path>
                                                    </svg></a>
                                            </li>
                                            <li>
                                                <a href="#"><svg role="img"
                                                        xmlns="http://www.w3.org/2000/svg" width="48px"
                                                        height="48px" viewBox="0 0 24 24" stroke="#2329D6"
                                                        stroke-width="1" stroke-linecap="square"
                                                        stroke-linejoin="miter" fill="none" color="#2329D6">
                                                        <title>Shuffle</title>
                                                        <path
                                                            d="M21 16.0399H17.7707C15.8164 16.0399 13.9845 14.9697 12.8611 13.1716L10.7973 9.86831C9.67384 8.07022 7.84196 7 5.88762 7L3 7">
                                                        </path>
                                                        <path
                                                            d="M21 7H17.7707C15.8164 7 13.9845 8.18388 12.8611 10.1729L10.7973 13.8271C9.67384 15.8161 7.84196 17 5.88762 17L3 17">
                                                        </path>
                                                        <path d="M19 4L22 7L19 10"></path>
                                                        <path d="M19 13L22 16L19 19"></path>
                                                    </svg></a>
                                            </li>
                                            <li>
                                                <a href="#"><svg width="48px" height="48px"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                                        stroke="#2329D6" stroke-width="1" stroke-linecap="square"
                                                        stroke-linejoin="miter" fill="none" color="#2329D6">
                                                        <title>Visible (eye)</title>
                                                        <path
                                                            d="M22 12C22 12 19 18 12 18C5 18 2 12 2 12C2 12 5 6 12 6C19 6 22 12 22 12Z">
                                                        </path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="details">
                                    <h4><a href="#">Apple</a></h4>
                                    <p><a href="#">Apple MacBook Pro13.3″ Laptop with Touch bar ID </a></p>
                                    <span class="price">
                                        <ins>
                                            <span class="woocommerce-Price-amount amount">
                                                <bdi>
                                                    <span class="woocommerce-Price-currencySymbol">$</span>471.48
                                                </bdi>
                                            </span>
                                        </ins>
                                        <del aria-hidden="true">
                                            <span class="woocommerce-Price-amount amount">
                                                <bdi>
                                                    <span class="woocommerce-Price-currencySymbol">$</span>904.21
                                                </bdi>
                                            </span>
                                        </del>
                                    </span>
                                    <div class="add-cart-area">
                                        <button class="add-to-cart">Add to cart</button>
                                    </div>
                                </div>
                            </div>
                            <div class="grid">
                                <div class="product-pic">
                                    <img src="fontend/assets/images/shop/product-img-27.png" alt="">
                                    <span class="theme-badge-2">15% off</span>
                                    <div class="actions">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <svg role="img" xmlns="http://www.w3.org/2000/svg"
                                                        width="48px" height="48px" viewBox="0 0 24 24"
                                                        stroke="#2329D6" stroke-width="1" stroke-linecap="square"
                                                        stroke-linejoin="miter" fill="none" color="#2329D6">
                                                        <title>Favourite</title>
                                                        <path
                                                            d="M12,21 L10.55,19.7051771 C5.4,15.1242507 2,12.1029973 2,8.39509537 C2,5.37384196 4.42,3 7.5,3 C9.24,3 10.91,3.79455041 12,5.05013624 C13.09,3.79455041 14.76,3 16.5,3 C19.58,3 22,5.37384196 22,8.39509537 C22,12.1029973 18.6,15.1242507 13.45,19.7149864 L12,21 Z">
                                                        </path>
                                                    </svg>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <svg role="img" xmlns="http://www.w3.org/2000/svg"
                                                        width="48px" height="48px" viewBox="0 0 24 24"
                                                        stroke="#2329D6" stroke-width="1" stroke-linecap="square"
                                                        stroke-linejoin="miter" fill="none" color="#2329D6">
                                                        <title>Shuffle</title>
                                                        <path
                                                            d="M21 16.0399H17.7707C15.8164 16.0399 13.9845 14.9697 12.8611 13.1716L10.7973 9.86831C9.67384 8.07022 7.84196 7 5.88762 7L3 7">
                                                        </path>
                                                        <path
                                                            d="M21 7H17.7707C15.8164 7 13.9845 8.18388 12.8611 10.1729L10.7973 13.8271C9.67384 15.8161 7.84196 17 5.88762 17L3 17">
                                                        </path>
                                                        <path d="M19 4L22 7L19 10"></path>
                                                        <path d="M19 13L22 16L19 19"></path>
                                                    </svg>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <svg width="48px" height="48px" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg" stroke="#2329D6"
                                                        stroke-width="1" stroke-linecap="square"
                                                        stroke-linejoin="miter" fill="none" color="#2329D6">
                                                        <title>Visible (eye)</title>
                                                        <path
                                                            d="M22 12C22 12 19 18 12 18C5 18 2 12 2 12C2 12 5 6 12 6C19 6 22 12 22 12Z">
                                                        </path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="details">
                                    <h4><a href="#">Mac Mini</a></h4>
                                    <p><a href="#">Apple MacBook Pro13.3″ Laptop with Touch ID </a></p>
                                    <span class="price">
                                        <ins>
                                            <span class="woocommerce-Price-amount amount">
                                                <bdi>
                                                    <span class="woocommerce-Price-currencySymbol">$</span>471.48
                                                </bdi>
                                            </span>
                                        </ins>
                                        <del aria-hidden="true">
                                            <span class="woocommerce-Price-amount amount">
                                                <bdi>
                                                    <span class="woocommerce-Price-currencySymbol">$</span>904.21
                                                </bdi>
                                            </span>
                                        </del>
                                    </span>
                                    <div class="add-cart-area">
                                        <button class="add-to-cart">Add to cart</button>
                                    </div>
                                </div>
                            </div>
                            <div class="grid">
                                <div class="product-pic">
                                    <img src="fontend/assets/images/shop/product_img_12.png" alt="">
                                    <span class="theme-badge">Sale</span>
                                    <div class="actions">
                                        <ul>
                                            <li>
                                                <a href="#"><svg role="img"
                                                        xmlns="http://www.w3.org/2000/svg" width="48px"
                                                        height="48px" viewBox="0 0 24 24" stroke="#2329D6"
                                                        stroke-width="1" stroke-linecap="square"
                                                        stroke-linejoin="miter" fill="none" color="#2329D6">
                                                        <title>Favourite</title>
                                                        <path
                                                            d="M12,21 L10.55,19.7051771 C5.4,15.1242507 2,12.1029973 2,8.39509537 C2,5.37384196 4.42,3 7.5,3 C9.24,3 10.91,3.79455041 12,5.05013624 C13.09,3.79455041 14.76,3 16.5,3 C19.58,3 22,5.37384196 22,8.39509537 C22,12.1029973 18.6,15.1242507 13.45,19.7149864 L12,21 Z">
                                                        </path>
                                                    </svg></a>
                                            </li>
                                            <li>
                                                <a href="#"><svg role="img"
                                                        xmlns="http://www.w3.org/2000/svg" width="48px"
                                                        height="48px" viewBox="0 0 24 24" stroke="#2329D6"
                                                        stroke-width="1" stroke-linecap="square"
                                                        stroke-linejoin="miter" fill="none" color="#2329D6">
                                                        <title>Shuffle</title>
                                                        <path
                                                            d="M21 16.0399H17.7707C15.8164 16.0399 13.9845 14.9697 12.8611 13.1716L10.7973 9.86831C9.67384 8.07022 7.84196 7 5.88762 7L3 7">
                                                        </path>
                                                        <path
                                                            d="M21 7H17.7707C15.8164 7 13.9845 8.18388 12.8611 10.1729L10.7973 13.8271C9.67384 15.8161 7.84196 17 5.88762 17L3 17">
                                                        </path>
                                                        <path d="M19 4L22 7L19 10"></path>
                                                        <path d="M19 13L22 16L19 19"></path>
                                                    </svg></a>
                                            </li>
                                            <li>
                                                <a href="#"><svg width="48px" height="48px"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                                        stroke="#2329D6" stroke-width="1" stroke-linecap="square"
                                                        stroke-linejoin="miter" fill="none" color="#2329D6">
                                                        <title>Visible (eye)</title>
                                                        <path
                                                            d="M22 12C22 12 19 18 12 18C5 18 2 12 2 12C2 12 5 6 12 6C19 6 22 12 22 12Z">
                                                        </path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="details">
                                    <h4><a href="#">Apple</a></h4>
                                    <p><a href="#">Apple MacBook Pro13.3″ Laptop with Touch ID </a></p>
                                    <span class="price">
                                        <ins>
                                            <span class="woocommerce-Price-amount amount">
                                                <bdi>
                                                    <span class="woocommerce-Price-currencySymbol">$</span>471.48
                                                </bdi>
                                            </span>
                                        </ins>
                                        <del aria-hidden="true">
                                            <span class="woocommerce-Price-amount amount">
                                                <bdi>
                                                    <span class="woocommerce-Price-currencySymbol">$</span>904.21
                                                </bdi>
                                            </span>
                                        </del>
                                    </span>
                                    <div class="add-cart-area">
                                        <button class="add-to-cart">Add to cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- new_arrivals_section - end -->

        <!-- brand_section - start -->
        <div class="brand_section pb-0">
            <div class="container">
                <div class="brand_carousel slick-initialized slick-slider">
                    <div class="slick-list draggable">
                        <div class="slick-track"
                            style="opacity: 1; width: 1170px; transform: translate3d(0px, 0px, 0px);">
                            <div class="slider_item slick-slide slick-current slick-active" data-slick-index="0"
                                aria-hidden="false" tabindex="0" style="width: 234px;">
                                <a class="product_brand_logo" href="#!" tabindex="0">
                                    <img src="fontend/assets/images/brand/brand_1.png" alt="image_not_found">
                                    <img src="fontend/assets/images/brand/brand_1.png" alt="image_not_found">
                                </a>
                            </div>
                            <div class="slider_item slick-slide slick-active" data-slick-index="1" aria-hidden="false"
                                tabindex="0" style="width: 234px;">
                                <a class="product_brand_logo" href="#!" tabindex="0">
                                    <img src="fontend/assets/images/brand/brand_2.png" alt="image_not_found">
                                    <img src="fontend/assets/images/brand/brand_2.png" alt="image_not_found">
                                </a>
                            </div>
                            <div class="slider_item slick-slide slick-active" data-slick-index="2" aria-hidden="false"
                                tabindex="0" style="width: 234px;">
                                <a class="product_brand_logo" href="#!" tabindex="0">
                                    <img src="fontend/assets/images/brand/brand_3.png" alt="image_not_found">
                                    <img src="fontend/assets/images/brand/brand_3.png" alt="image_not_found">
                                </a>
                            </div>
                            <div class="slider_item slick-slide slick-active" data-slick-index="3" aria-hidden="false"
                                tabindex="0" style="width: 234px;">
                                <a class="product_brand_logo" href="#!" tabindex="0">
                                    <img src="fontend/assets/images/brand/brand_4.png" alt="image_not_found">
                                    <img src="fontend/assets/images/brand/brand_4.png" alt="image_not_found">
                                </a>
                            </div>
                            <div class="slider_item slick-slide slick-active" data-slick-index="4" aria-hidden="false"
                                tabindex="0" style="width: 234px;">
                                <a class="product_brand_logo" href="#!" tabindex="0">
                                    <img src="fontend/assets/images/brand/brand_5.png" alt="image_not_found">
                                    <img src="fontend/assets/images/brand/brand_5.png" alt="image_not_found">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- brand_section - end -->

        <!-- viewed_products_section - start -->
        <section class="viewed_products_section section_space">
            <div class="container">

                <div class="sec-title-link mb-0">
                    <h3>Recently Viewed Products</h3>
                </div>

                <div class="viewed_products_wrap arrows_topright">
                    <div class="viewed_products_carousel row slick-initialized slick-slider"
                        data-slick="{&quot;dots&quot;: false}">
                        <div class="slick-list draggable">
                            <div class="slick-track"
                                style="opacity: 1; width: 6000px; transform: translate3d(-1200px, 0px, 0px);">
                                <div class="slider_item col slick-slide slick-cloned" data-slick-index="-3"
                                    id="" aria-hidden="true" tabindex="-1" style="width: 400px;">
                                    <div class="viewed_product_item">
                                        <div class="item_image">
                                            <img src="fontend/assets/images/viewed_products/viewed_product_img_1.png"
                                                alt="image_not_found">
                                        </div>
                                        <div class="item_content">
                                            <h3 class="item_title">Electronics</h3>
                                            <ul class="ul_li_block">
                                                <li><a href="#!" tabindex="-1">Computers</a></li>
                                                <li><a href="#!" tabindex="-1">Laptop</a></li>
                                                <li><a href="#!" tabindex="-1">Macbook</a></li>
                                                <li><a href="#!" tabindex="-1">Accessories</a></li>
                                                <li><a href="#!" tabindex="-1">More...</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="viewed_product_item">
                                        <div class="item_image">
                                            <img src="fontend/assets/images/viewed_products/viewed_product_img_2.png"
                                                alt="image_not_found">
                                        </div>
                                        <div class="item_content">
                                            <h3 class="item_title">PC &amp; Laptop</h3>
                                            <ul class="ul_li_block">
                                                <li><a href="#!" tabindex="-1">Computers</a></li>
                                                <li><a href="#!" tabindex="-1">Laptop</a></li>
                                                <li><a href="#!" tabindex="-1">Macbook</a></li>
                                                <li><a href="#!" tabindex="-1">Accessories</a></li>
                                                <li><a href="#!" tabindex="-1">More...</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="slider_item col slick-slide slick-cloned" data-slick-index="-2"
                                    id="" aria-hidden="true" tabindex="-1" style="width: 400px;">
                                    <div class="viewed_product_item">
                                        <div class="item_image">
                                            <img src="fontend/assets/images/viewed_products/viewed_product_img_3.png"
                                                alt="image_not_found">
                                        </div>
                                        <div class="item_content">
                                            <h3 class="item_title">Tables &amp; Mobiles</h3>
                                            <ul class="ul_li_block">
                                                <li><a href="#!" tabindex="-1">Computers</a></li>
                                                <li><a href="#!" tabindex="-1">Laptop</a></li>
                                                <li><a href="#!" tabindex="-1">Macbook</a></li>
                                                <li><a href="#!" tabindex="-1">Accessories</a></li>
                                                <li><a href="#!" tabindex="-1">More...</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="viewed_product_item">
                                        <div class="item_image">
                                            <img src="fontend/assets/images/viewed_products/viewed_product_img_4.png"
                                                alt="image_not_found">
                                        </div>
                                        <div class="item_content">
                                            <h3 class="item_title">Accessories</h3>
                                            <ul class="ul_li_block">
                                                <li><a href="#!" tabindex="-1">Computers</a></li>
                                                <li><a href="#!" tabindex="-1">Laptop</a></li>
                                                <li><a href="#!" tabindex="-1">Macbook</a></li>
                                                <li><a href="#!" tabindex="-1">Accessories</a></li>
                                                <li><a href="#!" tabindex="-1">More...</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="slider_item col slick-slide slick-cloned" data-slick-index="-1"
                                    id="" aria-hidden="true" tabindex="-1" style="width: 400px;">
                                    <div class="viewed_product_item">
                                        <div class="item_image">
                                            <img src="fontend/assets/images/viewed_products/viewed_product_img_5.png"
                                                alt="image_not_found">
                                        </div>
                                        <div class="item_content">
                                            <h3 class="item_title">TV &amp; Audio</h3>
                                            <ul class="ul_li_block">
                                                <li><a href="#!" tabindex="-1">Computers</a></li>
                                                <li><a href="#!" tabindex="-1">Laptop</a></li>
                                                <li><a href="#!" tabindex="-1">Macbook</a></li>
                                                <li><a href="#!" tabindex="-1">Accessories</a></li>
                                                <li><a href="#!" tabindex="-1">More...</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="viewed_product_item">
                                        <div class="item_image">
                                            <img src="fontend/assets/images/viewed_products/viewed_product_img_6.png"
                                                alt="image_not_found">
                                        </div>
                                        <div class="item_content">
                                            <h3 class="item_title">Games &amp; Consoles</h3>
                                            <ul class="ul_li_block">
                                                <li><a href="#!" tabindex="-1">Computers</a></li>
                                                <li><a href="#!" tabindex="-1">Laptop</a></li>
                                                <li><a href="#!" tabindex="-1">Macbook</a></li>
                                                <li><a href="#!" tabindex="-1">Accessories</a></li>
                                                <li><a href="#!" tabindex="-1">More...</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="slider_item col slick-slide slick-current slick-active" data-slick-index="0"
                                    aria-hidden="false" tabindex="0" style="width: 400px;">
                                    <div class="viewed_product_item">
                                        <div class="item_image">
                                            <img src="fontend/assets/images/viewed_products/viewed_product_img_1.png"
                                                alt="image_not_found">
                                        </div>
                                        <div class="item_content">
                                            <h3 class="item_title">Electronics</h3>
                                            <ul class="ul_li_block">
                                                <li><a href="#!" tabindex="0">Computers</a></li>
                                                <li><a href="#!" tabindex="0">Laptop</a></li>
                                                <li><a href="#!" tabindex="0">Macbook</a></li>
                                                <li><a href="#!" tabindex="0">Accessories</a></li>
                                                <li><a href="#!" tabindex="0">More...</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="viewed_product_item">
                                        <div class="item_image">
                                            <img src="fontend/assets/images/viewed_products/viewed_product_img_2.png"
                                                alt="image_not_found">
                                        </div>
                                        <div class="item_content">
                                            <h3 class="item_title">PC &amp; Laptop</h3>
                                            <ul class="ul_li_block">
                                                <li><a href="#!" tabindex="0">Computers</a></li>
                                                <li><a href="#!" tabindex="0">Laptop</a></li>
                                                <li><a href="#!" tabindex="0">Macbook</a></li>
                                                <li><a href="#!" tabindex="0">Accessories</a></li>
                                                <li><a href="#!" tabindex="0">More...</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="slider_item col slick-slide slick-active" data-slick-index="1"
                                    aria-hidden="false" tabindex="0" style="width: 400px;">
                                    <div class="viewed_product_item">
                                        <div class="item_image">
                                            <img src="fontend/assets/images/viewed_products/viewed_product_img_3.png"
                                                alt="image_not_found">
                                        </div>
                                        <div class="item_content">
                                            <h3 class="item_title">Tables &amp; Mobiles</h3>
                                            <ul class="ul_li_block">
                                                <li><a href="#!" tabindex="0">Computers</a></li>
                                                <li><a href="#!" tabindex="0">Laptop</a></li>
                                                <li><a href="#!" tabindex="0">Macbook</a></li>
                                                <li><a href="#!" tabindex="0">Accessories</a></li>
                                                <li><a href="#!" tabindex="0">More...</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="viewed_product_item">
                                        <div class="item_image">
                                            <img src="fontend/assets/images/viewed_products/viewed_product_img_4.png"
                                                alt="image_not_found">
                                        </div>
                                        <div class="item_content">
                                            <h3 class="item_title">Accessories</h3>
                                            <ul class="ul_li_block">
                                                <li><a href="#!" tabindex="0">Computers</a></li>
                                                <li><a href="#!" tabindex="0">Laptop</a></li>
                                                <li><a href="#!" tabindex="0">Macbook</a></li>
                                                <li><a href="#!" tabindex="0">Accessories</a></li>
                                                <li><a href="#!" tabindex="0">More...</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="slider_item col slick-slide slick-active" data-slick-index="2"
                                    aria-hidden="false" tabindex="0" style="width: 400px;">
                                    <div class="viewed_product_item">
                                        <div class="item_image">
                                            <img src="fontend/assets/images/viewed_products/viewed_product_img_5.png"
                                                alt="image_not_found">
                                        </div>
                                        <div class="item_content">
                                            <h3 class="item_title">TV &amp; Audio</h3>
                                            <ul class="ul_li_block">
                                                <li><a href="#!" tabindex="0">Computers</a></li>
                                                <li><a href="#!" tabindex="0">Laptop</a></li>
                                                <li><a href="#!" tabindex="0">Macbook</a></li>
                                                <li><a href="#!" tabindex="0">Accessories</a></li>
                                                <li><a href="#!" tabindex="0">More...</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="viewed_product_item">
                                        <div class="item_image">
                                            <img src="fontend/assets/images/viewed_products/viewed_product_img_6.png"
                                                alt="image_not_found">
                                        </div>
                                        <div class="item_content">
                                            <h3 class="item_title">Games &amp; Consoles</h3>
                                            <ul class="ul_li_block">
                                                <li><a href="#!" tabindex="0">Computers</a></li>
                                                <li><a href="#!" tabindex="0">Laptop</a></li>
                                                <li><a href="#!" tabindex="0">Macbook</a></li>
                                                <li><a href="#!" tabindex="0">Accessories</a></li>
                                                <li><a href="#!" tabindex="0">More...</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="slider_item col slick-slide" data-slick-index="3" aria-hidden="true"
                                    tabindex="-1" style="width: 400px;">
                                    <div class="viewed_product_item">
                                        <div class="item_image">
                                            <img src="fontend/assets/images/viewed_products/viewed_product_img_1.png"
                                                alt="image_not_found">
                                        </div>
                                        <div class="item_content">
                                            <h3 class="item_title">Electronics</h3>
                                            <ul class="ul_li_block">
                                                <li><a href="#!" tabindex="-1">Computers</a></li>
                                                <li><a href="#!" tabindex="-1">Laptop</a></li>
                                                <li><a href="#!" tabindex="-1">Macbook</a></li>
                                                <li><a href="#!" tabindex="-1">Accessories</a></li>
                                                <li><a href="#!" tabindex="-1">More...</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="viewed_product_item">
                                        <div class="item_image">
                                            <img src="fontend/assets/images/viewed_products/viewed_product_img_2.png"
                                                alt="image_not_found">
                                        </div>
                                        <div class="item_content">
                                            <h3 class="item_title">PC &amp; Laptop</h3>
                                            <ul class="ul_li_block">
                                                <li><a href="#!" tabindex="-1">Computers</a></li>
                                                <li><a href="#!" tabindex="-1">Laptop</a></li>
                                                <li><a href="#!" tabindex="-1">Macbook</a></li>
                                                <li><a href="#!" tabindex="-1">Accessories</a></li>
                                                <li><a href="#!" tabindex="-1">More...</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="slider_item col slick-slide" data-slick-index="4" aria-hidden="true"
                                    tabindex="-1" style="width: 400px;">
                                    <div class="viewed_product_item">
                                        <div class="item_image">
                                            <img src="fontend/assets/images/viewed_products/viewed_product_img_3.png"
                                                alt="image_not_found">
                                        </div>
                                        <div class="item_content">
                                            <h3 class="item_title">Tables &amp; Mobiles</h3>
                                            <ul class="ul_li_block">
                                                <li><a href="#!" tabindex="-1">Computers</a></li>
                                                <li><a href="#!" tabindex="-1">Laptop</a></li>
                                                <li><a href="#!" tabindex="-1">Macbook</a></li>
                                                <li><a href="#!" tabindex="-1">Accessories</a></li>
                                                <li><a href="#!" tabindex="-1">More...</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="viewed_product_item">
                                        <div class="item_image">
                                            <img src="fontend/assets/images/viewed_products/viewed_product_img_4.png"
                                                alt="image_not_found">
                                        </div>
                                        <div class="item_content">
                                            <h3 class="item_title">Accessories</h3>
                                            <ul class="ul_li_block">
                                                <li><a href="#!" tabindex="-1">Computers</a></li>
                                                <li><a href="#!" tabindex="-1">Laptop</a></li>
                                                <li><a href="#!" tabindex="-1">Macbook</a></li>
                                                <li><a href="#!" tabindex="-1">Accessories</a></li>
                                                <li><a href="#!" tabindex="-1">More...</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="slider_item col slick-slide" data-slick-index="5" aria-hidden="true"
                                    tabindex="-1" style="width: 400px;">
                                    <div class="viewed_product_item">
                                        <div class="item_image">
                                            <img src="fontend/assets/images/viewed_products/viewed_product_img_5.png"
                                                alt="image_not_found">
                                        </div>
                                        <div class="item_content">
                                            <h3 class="item_title">TV &amp; Audio</h3>
                                            <ul class="ul_li_block">
                                                <li><a href="#!" tabindex="-1">Computers</a></li>
                                                <li><a href="#!" tabindex="-1">Laptop</a></li>
                                                <li><a href="#!" tabindex="-1">Macbook</a></li>
                                                <li><a href="#!" tabindex="-1">Accessories</a></li>
                                                <li><a href="#!" tabindex="-1">More...</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="viewed_product_item">
                                        <div class="item_image">
                                            <img src="fontend/assets/images/viewed_products/viewed_product_img_6.png"
                                                alt="image_not_found">
                                        </div>
                                        <div class="item_content">
                                            <h3 class="item_title">Games &amp; Consoles</h3>
                                            <ul class="ul_li_block">
                                                <li><a href="#!" tabindex="-1">Computers</a></li>
                                                <li><a href="#!" tabindex="-1">Laptop</a></li>
                                                <li><a href="#!" tabindex="-1">Macbook</a></li>
                                                <li><a href="#!" tabindex="-1">Accessories</a></li>
                                                <li><a href="#!" tabindex="-1">More...</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="slider_item col slick-slide slick-cloned" data-slick-index="6"
                                    id="" aria-hidden="true" tabindex="-1" style="width: 400px;">
                                    <div class="viewed_product_item">
                                        <div class="item_image">
                                            <img src="fontend/assets/images/viewed_products/viewed_product_img_1.png"
                                                alt="image_not_found">
                                        </div>
                                        <div class="item_content">
                                            <h3 class="item_title">Electronics</h3>
                                            <ul class="ul_li_block">
                                                <li><a href="#!" tabindex="-1">Computers</a></li>
                                                <li><a href="#!" tabindex="-1">Laptop</a></li>
                                                <li><a href="#!" tabindex="-1">Macbook</a></li>
                                                <li><a href="#!" tabindex="-1">Accessories</a></li>
                                                <li><a href="#!" tabindex="-1">More...</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="viewed_product_item">
                                        <div class="item_image">
                                            <img src="fontend/assets/images/viewed_products/viewed_product_img_2.png"
                                                alt="image_not_found">
                                        </div>
                                        <div class="item_content">
                                            <h3 class="item_title">PC &amp; Laptop</h3>
                                            <ul class="ul_li_block">
                                                <li><a href="#!" tabindex="-1">Computers</a></li>
                                                <li><a href="#!" tabindex="-1">Laptop</a></li>
                                                <li><a href="#!" tabindex="-1">Macbook</a></li>
                                                <li><a href="#!" tabindex="-1">Accessories</a></li>
                                                <li><a href="#!" tabindex="-1">More...</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="slider_item col slick-slide slick-cloned" data-slick-index="7"
                                    id="" aria-hidden="true" tabindex="-1" style="width: 400px;">
                                    <div class="viewed_product_item">
                                        <div class="item_image">
                                            <img src="fontend/assets/images/viewed_products/viewed_product_img_3.png"
                                                alt="image_not_found">
                                        </div>
                                        <div class="item_content">
                                            <h3 class="item_title">Tables &amp; Mobiles</h3>
                                            <ul class="ul_li_block">
                                                <li><a href="#!" tabindex="-1">Computers</a></li>
                                                <li><a href="#!" tabindex="-1">Laptop</a></li>
                                                <li><a href="#!" tabindex="-1">Macbook</a></li>
                                                <li><a href="#!" tabindex="-1">Accessories</a></li>
                                                <li><a href="#!" tabindex="-1">More...</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="viewed_product_item">
                                        <div class="item_image">
                                            <img src="fontend/assets/images/viewed_products/viewed_product_img_4.png"
                                                alt="image_not_found">
                                        </div>
                                        <div class="item_content">
                                            <h3 class="item_title">Accessories</h3>
                                            <ul class="ul_li_block">
                                                <li><a href="#!" tabindex="-1">Computers</a></li>
                                                <li><a href="#!" tabindex="-1">Laptop</a></li>
                                                <li><a href="#!" tabindex="-1">Macbook</a></li>
                                                <li><a href="#!" tabindex="-1">Accessories</a></li>
                                                <li><a href="#!" tabindex="-1">More...</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="slider_item col slick-slide slick-cloned" data-slick-index="8"
                                    id="" aria-hidden="true" tabindex="-1" style="width: 400px;">
                                    <div class="viewed_product_item">
                                        <div class="item_image">
                                            <img src="fontend/assets/images/viewed_products/viewed_product_img_5.png"
                                                alt="image_not_found">
                                        </div>
                                        <div class="item_content">
                                            <h3 class="item_title">TV &amp; Audio</h3>
                                            <ul class="ul_li_block">
                                                <li><a href="#!" tabindex="-1">Computers</a></li>
                                                <li><a href="#!" tabindex="-1">Laptop</a></li>
                                                <li><a href="#!" tabindex="-1">Macbook</a></li>
                                                <li><a href="#!" tabindex="-1">Accessories</a></li>
                                                <li><a href="#!" tabindex="-1">More...</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="viewed_product_item">
                                        <div class="item_image">
                                            <img src="fontend/assets/images/viewed_products/viewed_product_img_6.png"
                                                alt="image_not_found">
                                        </div>
                                        <div class="item_content">
                                            <h3 class="item_title">Games &amp; Consoles</h3>
                                            <ul class="ul_li_block">
                                                <li><a href="#!" tabindex="-1">Computers</a></li>
                                                <li><a href="#!" tabindex="-1">Laptop</a></li>
                                                <li><a href="#!" tabindex="-1">Macbook</a></li>
                                                <li><a href="#!" tabindex="-1">Accessories</a></li>
                                                <li><a href="#!" tabindex="-1">More...</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="slider_item col slick-slide slick-cloned" data-slick-index="9"
                                    id="" aria-hidden="true" tabindex="-1" style="width: 400px;">
                                    <div class="viewed_product_item">
                                        <div class="item_image">
                                            <img src="fontend/assets/images/viewed_products/viewed_product_img_1.png"
                                                alt="image_not_found">
                                        </div>
                                        <div class="item_content">
                                            <h3 class="item_title">Electronics</h3>
                                            <ul class="ul_li_block">
                                                <li><a href="#!" tabindex="-1">Computers</a></li>
                                                <li><a href="#!" tabindex="-1">Laptop</a></li>
                                                <li><a href="#!" tabindex="-1">Macbook</a></li>
                                                <li><a href="#!" tabindex="-1">Accessories</a></li>
                                                <li><a href="#!" tabindex="-1">More...</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="viewed_product_item">
                                        <div class="item_image">
                                            <img src="fontend/assets/images/viewed_products/viewed_product_img_2.png"
                                                alt="image_not_found">
                                        </div>
                                        <div class="item_content">
                                            <h3 class="item_title">PC &amp; Laptop</h3>
                                            <ul class="ul_li_block">
                                                <li><a href="#!" tabindex="-1">Computers</a></li>
                                                <li><a href="#!" tabindex="-1">Laptop</a></li>
                                                <li><a href="#!" tabindex="-1">Macbook</a></li>
                                                <li><a href="#!" tabindex="-1">Accessories</a></li>
                                                <li><a href="#!" tabindex="-1">More...</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="slider_item col slick-slide slick-cloned" data-slick-index="10"
                                    id="" aria-hidden="true" tabindex="-1" style="width: 400px;">
                                    <div class="viewed_product_item">
                                        <div class="item_image">
                                            <img src="fontend/assets/images/viewed_products/viewed_product_img_3.png"
                                                alt="image_not_found">
                                        </div>
                                        <div class="item_content">
                                            <h3 class="item_title">Tables &amp; Mobiles</h3>
                                            <ul class="ul_li_block">
                                                <li><a href="#!" tabindex="-1">Computers</a></li>
                                                <li><a href="#!" tabindex="-1">Laptop</a></li>
                                                <li><a href="#!" tabindex="-1">Macbook</a></li>
                                                <li><a href="#!" tabindex="-1">Accessories</a></li>
                                                <li><a href="#!" tabindex="-1">More...</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="viewed_product_item">
                                        <div class="item_image">
                                            <img src="fontend/assets/images/viewed_products/viewed_product_img_4.png"
                                                alt="image_not_found">
                                        </div>
                                        <div class="item_content">
                                            <h3 class="item_title">Accessories</h3>
                                            <ul class="ul_li_block">
                                                <li><a href="#!" tabindex="-1">Computers</a></li>
                                                <li><a href="#!" tabindex="-1">Laptop</a></li>
                                                <li><a href="#!" tabindex="-1">Macbook</a></li>
                                                <li><a href="#!" tabindex="-1">Accessories</a></li>
                                                <li><a href="#!" tabindex="-1">More...</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="slider_item col slick-slide slick-cloned" data-slick-index="11"
                                    id="" aria-hidden="true" tabindex="-1" style="width: 400px;">
                                    <div class="viewed_product_item">
                                        <div class="item_image">
                                            <img src="fontend/assets/images/viewed_products/viewed_product_img_5.png"
                                                alt="image_not_found">
                                        </div>
                                        <div class="item_content">
                                            <h3 class="item_title">TV &amp; Audio</h3>
                                            <ul class="ul_li_block">
                                                <li><a href="#!" tabindex="-1">Computers</a></li>
                                                <li><a href="#!" tabindex="-1">Laptop</a></li>
                                                <li><a href="#!" tabindex="-1">Macbook</a></li>
                                                <li><a href="#!" tabindex="-1">Accessories</a></li>
                                                <li><a href="#!" tabindex="-1">More...</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="viewed_product_item">
                                        <div class="item_image">
                                            <img src="fontend/assets/images/viewed_products/viewed_product_img_6.png"
                                                alt="image_not_found">
                                        </div>
                                        <div class="item_content">
                                            <h3 class="item_title">Games &amp; Consoles</h3>
                                            <ul class="ul_li_block">
                                                <li><a href="#!" tabindex="-1">Computers</a></li>
                                                <li><a href="#!" tabindex="-1">Laptop</a></li>
                                                <li><a href="#!" tabindex="-1">Macbook</a></li>
                                                <li><a href="#!" tabindex="-1">Accessories</a></li>
                                                <li><a href="#!" tabindex="-1">More...</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel_nav">
                        <button type="button" class="vpc_left_arrow slick-arrow" style=""><i
                                class="fal fa-long-arrow-alt-left"></i></button>
                        <button type="button" class="vpc_right_arrow slick-arrow" style=""><i
                                class="fal fa-long-arrow-alt-right"></i></button>
                    </div>
                </div>
            </div>
        </section>
        <!-- viewed_products_section - end-->
    </main>
@endsection
