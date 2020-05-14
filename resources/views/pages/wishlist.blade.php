@extends('layouts.app')

@section('content')
    <main class="main">
        <div class="page-header text-center" style="background-image: url({{asset('client_assets/assets/images/page-header-bg.jpg')}})">
            <div class="container">
                <h1 class="page-title">Your Wishlist<span>Shop</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->


        <div class="page-content">
            <div class="cart">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">


                            <table class="table table-cart table-mobile">
                                <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($product as $row)

                                    <tr>
                                        <td class="product-col" style="max-width: 400px">
                                            <div class="product">
                                                <figure class="product-media">
                                                    <a href="#">
                                                        <img src="{{ asset($row->image_one) }}" alt="Product image">
                                                    </a>
                                                </figure>

                                                <h3 class="product-title">
                                                    <a href="#">{{ $row->product_name  }}</a>
                                                </h3><!-- End .product-title -->
                                            </div><!-- End .product -->
                                        </td>
                                        @if($row->color == NULL)
                                            <td class="price-col"> No color</td>
                                        @else
                                            <td class="price-col"> {{ $row->color }}</td>
                                        @endif
                                        @if($row->size == NULL)
                                            <td class="price-col"> No size</td>
                                        @else
                                            <td class="price-col">{{ $row->size }}</td>
                                        @endif
                                        <td class="price-col">${{ $row->price  }}</td>


                                        <td class="price-col">
                                            <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table><!-- End .table table-wishlist -->

                            <div class="cart-bottom">
                                <div class="cart-discount">
                                    <form action="#">
                                        <div class="input-group">

                                        </div><!-- End .input-group -->
                                    </form>
                                </div><!-- End .cart-discount -->

                            </div><!-- End .cart-bottom -->
                        </div><!-- End .col-lg-9 -->
                        <aside class="col-md-8 col-lg-6">

                        </aside><!-- End .col-lg-3 -->
                        <aside class="col-md-8 col-lg-6">
                            <a href="{{ url('/') }}" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .cart -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
