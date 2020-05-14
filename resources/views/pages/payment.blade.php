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
                <h1 class="page-title">Payment<span></span></h1>
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
                            <form action="{{ route('payment.process') }}" id="contact_form" method="post">
                                @csrf
                            <h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->
                            <label>Full name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Your Full Name" required>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control"placeholder="Enter Your Email" required>
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label>Phone</label>
                                    <input type="text" name="phone" class="form-control" placeholder="Enter Your Phone" required>
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Address</label>
                                    <input type="text" name="address" class="form-control" placeholder="Enter Your Address" required>
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label>Town / City *</label>
                                    <input type="text" name="city" class="form-control" placeholder="Enter Your Town/ City" required>
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->
                                <br>
                                <div class="contact_form_title text-center"> <h4>Payment By</h4> </div>
                                <div class="row">
                                    <div class="col-6 col-lg-4 col-xl-2">
                                        <input type="radio" name="payment" value="stripe"><img src="{{ asset('public/images/payment/mastercard.png') }}" style="width: 100px; height: 60px;">

                                    </div>
{{--                                    <div class="col-6 col-lg-4 col-xl-2">--}}
{{--                                        <input type="radio" name="payment" value="paypal"><img src="{{ asset('public/images/payment/paypal.png') }}" style="width: 100px; height: 60px;">--}}

{{--                                    </div>--}}
                                    <div class="col-6 col-lg-4 col-xl-2">
                                        <input type="radio" name="payment" value="oncash"><img src="{{ asset('public/images/payment/delivery.png') }}" style="width: 100px; height: 60px;">

                                    </div>
                                </div><br>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block" style="width: 100px">Confirm</button>
                                        </div>

                            </form>

                        </div><!-- End .col-lg-9 -->

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
                                            <td>
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



                            </div><!-- End .summary -->
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->

                </div><!-- End .container -->
            </div><!-- End .checkout -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
