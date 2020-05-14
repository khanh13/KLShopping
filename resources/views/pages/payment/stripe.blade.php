@extends('layouts.app')

@section('content')
    @php
        $setting = DB::table('settings')->first();
        $charge = $setting->shipping_charge;
        $vat = $setting->vat;
        $subTotal =str_replace( ',', '', Cart::Subtotal() );
    @endphp


    <style>
        /**
        * The CSS shown here will not be introduced in the Quickstart guide, but shows
        * how you can use CSS to style your Element's container.
        */
        .StripeElement {
            box-sizing: border-box;

            height: 40px;
            width: 100%;

            padding: 10px 12px;

            border: 1px solid transparent;
            border-radius: 4px;
            background-color: white;

            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }
    </style>
    <main class="main">
        <div class="page-header text-center" style="background-image: url({{ asset('client_assets/assets/images/page-header-bg.jpg') }})">
            <div class="container">
                <h1 class="page-title">Stripe Payment<span></span></h1>
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

                        <div class="col-lg-9"><br><br><br>
                                <div class="col-lg-5" style="left: 30%">
                                    <form action="{{ route('stripe.charge') }}" method="post" id="payment-form">
                                        @csrf
                                            <div class="form-row">
                                                <label for="card-element">
                                                    <h4 style="color: #145ba2">Credit or debit card</h4>

                                                </label>
                                                <div id="card-element">
                                                    <!-- A Stripe Element will be inserted here. -->
                                                </div>

                                                <!-- Used to display form errors. -->
                                                <div id="card-errors" role="alert"></div>
                                            </div>

                                        <input type="hidden" name="shipping" value="{{ $charge }} ">
                                        <input type="hidden" name="vat" value="{{ $vat }} ">
                                        <input type="hidden" name="total" value="{{ $subTotal + $charge + $vat }} ">

                                        <input type="hidden" name="ship_name" value="{{ $data['name'] }} ">
                                        <input type="hidden" name="ship_phone" value="{{ $data['phone'] }} ">
                                        <input type="hidden" name="ship_email" value="{{ $data['email'] }} ">
                                        <input type="hidden" name="ship_address" value="{{ $data['address'] }} ">
                                        <input type="hidden" name="ship_city" value="{{ $data['city'] }} ">
                                        <input type="hidden" name="payment_type" value="{{ $data['payment'] }} ">

                                            <div class="col-6"><br>
                                                <button class="btn btn-outline-primary-2">Submit Payment</button>
                                            </div>

                                    </form>


                            </div>

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
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        // Create a Stripe client.
        var stripe = Stripe('pk_test_FDFqRuHqySAEhExud8XLTAzX00WeyRUVaz');

        // Create an instance of Elements.
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        // Create an instance of the card Element.
        var card = elements.create('card', {style: style});

        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });

        // Submit the form with the token ID.
        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Submit the form
            form.submit();
        }
    </script>
@endsection
