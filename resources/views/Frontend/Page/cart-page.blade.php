@extends('Frontend.main')
@section('Cart')
    active
@endsection
@section('index')
    <div class="breadcrumb_section">
        <div class="container">
            <ul class="breadcrumb_nav ul_li">
                <li><a href="{{ route('Fontend') }}">Home</a></li>
                <li>Cart</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb_section - end-->

    <!-- Cart_section - end-->

    <section class="cart_section section_space">
        <div class="container">

            <form class="cart_table">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th class="w-25">Product Image</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Color</th>
                            <th class="text-center">Size</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Total</th>
                            <th class="text-center">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total=0;
                        @endphp
                        @foreach ($carts as $cart)
                        <input type="hidden" name="cart_id[]" value="{{ $cart->id }}">
                            <tr>
                                <td>
                                    <div class="cart_product">
                                        <img src="{{ asset('Product/Thumbnail/' . $cart->product->created_at->format('Y/m/') . $cart->product->id . '/' . $cart->product->thumbnail) }}" style="max-width: 25%">
                                        <h6>
                                            <a class="text-secondary" href="{{ route('SingleProduct', $cart->product->slug) }}">{{ $cart->product->product_title }}</a>
                                        </h6>
                                    </div>
                                </td>
                                <td class="text-center"><span class="price_text">${{ $cart->product->price }}</span></td>
                                <td class="text-center"><span class="price_text">{{ $cart->color->color_name }}</span></td>
                                <td class="text-center"><span class="price_text">{{ $cart->size->size_name }}</span></td>
                                <td class="text-center">
                                    <div class="quantity_input">
                                        <button type="button" class="inc input_number_decrement{{ $cart->id }}">
                                            <i class="fal fa-minus"></i>
                                        </button>
                                        <input class="input_number" name="quantity[]" type="text" value="{{ $cart->quantity }}"/>
                                        <button type="button" class="dsc input_number_increment{{ $cart->id }}">
                                            <i class="fal fa-plus"></i>
                                        </button>
                                    </div>
                                </td>
                                @php
                                    $total +=($cart->product->price*$cart->quantity);
                                @endphp
                                <td class="text-center">
                                    <span class="price_text">${{ $cart->product->price*$cart->quantity  }}</span>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="remove_btn">
                                        <i class="fal fa-trash-alt">
                                        </i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>

            <form action="{{ route('CartUpdate') }}">
                <div class="cart_btns_wrap">
                    <div class="row">
                        <div class="col col-lg-6">
                            <div class="coupon_form form_item mb-0">
                                <input type="text" name="coupon" placeholder="Coupon Code...">
                                <button type="submit" class="btn btn_dark">Apply Coupon</button>
                                <div class="info_icon">
                                    <i class="fas fa-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Your Info Here"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col col-lg-6">
                            <ul class="btns_group ul_li_right">
                                <li><a class="btn border_black" href="#!">Update Cart</a></li>
                                <li><a class="btn btn_dark" href="#!">Prceed To Checkout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </form>

            <div class="row">
                <div class="col col-lg-6">
                    <div class="calculate_shipping">
                        <h3 class="wrap_title">Calculate Shipping <span class="icon"><i class="far fa-arrow-up"></i></span></h3>
                        <div class="select_option clearfix">
                            <select>
                                <option value="">Select Your Option</option>
                                <option value="1">Inside City</option>
                                <option value="2">Outside City</option>
                            </select>
                        </div>
                        <br>
                        <button type="submit" class="btn btn_primary rounded-pill">Update Total</button>
                    </div>
                </div>

                <div class="col col-lg-6">
                    <div class="cart_total_table">
                        <h3 class="wrap_title">Cart Totals</h3>
                        <ul class="ul_li_block">
                            <li>
                                <span>Cart Subtotal</span>
                                <span>${{ $total }}</span>
                            </li>
                            <li>
                                <span>Delivery Charge</span>
                                <span>$5</span>
                            </li>
                            <li>
                                <span>Order Total</span>
                                <span class="total_price">${{ $total }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('footer_js')

@endsection
