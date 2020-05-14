@extends('layouts.app')

@section('content')
    @php
        $setting = DB::table('settings')->first();
        $charge = $setting->shipping_charge;
        $vat = $setting->vat;
        $subTotal =str_replace( ',', '', Cart::Subtotal() );
    @endphp
    <main class="main">
        <div class="page-header text-center" style="background-image: url({{ asset('client_assets/assets/images/page-header-bg.jpg') }})">
            <div class="container">
                <h1 class="page-title">Checkout<span>Shop</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">

            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="checkout">
                <div class="container">
                    <div class="checkout-discount">

                    </div><!-- End .checkout-discount -->

                        <div class="row">
                            <div class="col-lg-9">
                                <table class="table table-cart table-mobile">
                                    <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Color</th>
                                        <th>Size</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($cart as $row)

                                        <tr>
                                            <td class="product-col" style="max-width: 400px">
                                                <div class="product">
                                                    <figure class="product-media">
                                                        <a href="#">
                                                            <img src="{{ asset($row->options->image) }}" alt="Product image">
                                                        </a>
                                                    </figure>

                                                    <h3 class="product-title">
                                                        <a href="#">{{ $row->name  }}</a>
                                                    </h3><!-- End .product-title -->
                                                </div><!-- End .product -->
                                            </td>
                                            @if($row->options->color == NULL)
                                                <td class="price-col"> No color</td>
                                            @else
                                                <td class="price-col"> {{ $row->options->color }}</td>
                                            @endif
                                            @if($row->options->size == NULL)
                                                <td class="price-col"> No size</td>
                                            @else
                                                <td class="price-col">{{ $row->options->size }}</td>
                                            @endif
                                            <td class="price-col">${{ $row->price  }}</td>
                                            <form action="{{ route('update.cart') }}" method="POST" >
                                                @csrf
                                                <input type="hidden" name="productid" value="{{ $row->rowId }}">
                                                <td class="quantity-col">
                                                    {{ $row->qty }}

                                                </td>

                                            </form>

                                            <td class="total-col">${{ $row->price*$row->qty }}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table><!-- End .table table-wishlist -->

                            </div>
                            <aside class="col-lg-3">
                                <div class="summary">
                                    <h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

                                    <table class="table table-summary">
                                        <thead>
                                        <tr>

                                        </tr>
                                        </thead>

                                        <tbody>

                                        @if(Session::has('coupon'))
                                            <tr class="summary-subtotal">
                                                <td>Subtotal:</td>
                                                <td><h5>${{  Session::get('coupon')['balance'] }}</h5></td>
                                            </tr><!-- End .summary-subtotal -->
                                            <tr>
                                                <td>Coupon name: <h6>{{  Session::get('coupon')['name'] }}</h6></td>
                                                <td><a href="{{ route('coupon.remove') }}" style="float: left" ><i class="icon-close"></i></a>
                                                    - ${{  Session::get('coupon')['discount'] }}
                                                </td>
                                            </tr>
                                        @else

                                            <tr class="summary-subtotal">
                                                <td>Subtotal:</td>
                                                <td>${{  Cart::Subtotal() }}</td>
                                            </tr><!-- End .summary-subtotal -->

                                        @endif

                                        <tr>
                                            <td>Vat:</td>
                                            <td>+ ${{$vat}}</td>
                                        </tr>
                                        <tr>
                                            <td>Shipping:</td>
                                            <td>+ ${{ $charge  }} </td>
                                        </tr>

                                        @if(Session::has('coupon'))
                                            <tr class="summary-total">
                                                <td>Total:</td>
                                                <td>${{ Session::get('coupon')['balance'] + $charge + $vat }}</td>
                                            </tr><!-- End .summary-total -->
                                        @else
                                            <tr class="summary-total">
                                                <td>Total:</td>
                                                <td>${{ $subTotal + $charge + $vat }}</td>
                                            </tr><!-- End .summary-total -->
                                        @endif
                                        </tbody>
                                    </table><!-- End .table table-summary -->

                                    <hr>


                                    <a href="{{ route('payment.step') }}" class="btn btn-outline-primary-2 btn-order btn-block"><br>
                                        <span class="btn-text">Place Order</span>
                                        <span class="btn-hover-text">Proceed to Checkout</span>
                                    </a>
                                </div><!-- End .summary -->
                                @if(Session::has('coupon'))

                                @else
                                    <form action="{{ route('apply.coupon') }}" method="POST">
                                        @csrf
                                        <div class="col-sm-6">

                                            <input type="text" class="form-control" name="coupon" placeholder="Coupon">
                                            <button class="btn btn-primary btn-round btn-shadow" type="submit">Apply<i class="icon-long-arrow-right"></i></button>

                                            <div class="input-group-append">
                                            </div><!-- .End .input-group-append -->
                                        </div>
                                    </form>
                                @endif
                            </aside><!-- End .col-lg-3 -->

                        </div><!-- End .col-lg-9 -->

                </div><!-- End .row -->

                </div><!-- End .container -->
            </div><!-- End .checkout -->
    </main><!-- End .main -->
@endsection
