@extends('layouts.app')

@section('content')
    <main class="main">
        <div class="page-header text-center" style="background-image: url({{asset('client_assets/assets/images/page-header-bg.jpg')}})">
            <div class="container">
                <h1 class="page-title">Shopping Cart<span>Shop</span></h1>
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
                                        <div class="cart-product-quantity">
                                            <input type="number" class="form-control" name="qty" value="{{ $row->qty }}" step="1" data-decimals="0" required>
                                        </div><!-- End .cart-product-quantity -->
                                        <button type="submit" class="btn btn-outline-dark-2" style="min-width: 40px;"><span>UPDATE</span><i class="icon-refresh"></i></button>

                                    </td>

                                    </form>

                                    <td class="total-col">${{ $row->price*$row->qty }}</td>
                                    <td class="remove-col"><a href="{{ url('remove/cart/'.$row->rowId ) }}" class="btn-remove"><i class="icon-close"></i></a></td>
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
                            <div class="summary summary-cart">
                                <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

                                <table class="table table-summary">
                                    <tbody>

                                    <tr class="summary-total">
                                        <td>Total Orders:</td>
                                        <td>${{ Cart::total() }}</td>
                                    </tr><!-- End .summary-total -->
                                    </tbody>
                                </table><!-- End .table table-summary -->

                                <a href="{{ route('user.checkout') }}" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
                            </div><!-- End .summary -->

                            <a href="{{ url('/') }}" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .cart -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
