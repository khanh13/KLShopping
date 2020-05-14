@extends('layouts.app')

@section('content')
    <main class="main">
        <div class="page-header text-center" style="background-image: url({{asset('client_assets/assets/images/page-header-bg.jpg')}})">
            <div class="container">
                <h1 class="page-title">Tracking Order<span></span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">

                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="checkout">
                <div class="container">
                    <div class="checkout-discount">

                    </div><!-- End .checkout-discount -->
                    <form action="#">
                        <div class="row">
                            <aside class="col-lg-5">
                                <div class="summary">
                                    <h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

                                    <table class="table table-summary">
                                        <thead>
                                        <tr>

                                        </tr>
                                        </thead>

                                        <tbody>
                                        <tr>
                                            <td>Payment Type:</td>
                                            <td>{{ $track->payment_type  }}</td>
                                        </tr>

                                        <tr>
                                            <td>Transection ID:</td>
                                            <td>{{ $track->payment_id  }}</td>
                                        </tr>
                                        <tr>
                                            <td>Balance ID:</td>
                                            <td>{{ $track->blnc_transection  }}</td>
                                        </tr><!-- End .summary-subtotal -->
                                        <tr>
                                            <td>Shipping:</td>
                                            <td>Free shipping</td>
                                        </tr>
                                        <tr>
                                            <td>Vat:</td>
                                            <td>$ {{ $track->vat  }}</td>
                                        </tr>
                                        <tr class="summary-total">
                                            <td >Total:</td>
                                            <td>$ {{ $track->total  }}</td>
                                        </tr>
                                        <tr>
                                            <td>Month:</td>
                                            <td>{{ $track->month  }}</td>
                                        </tr>
                                        <tr>
                                            <td>Date:</td>
                                            <td>{{ $track->date  }}</td>
                                        </tr>
                                        <tr>
                                            <td>Year:</td>
                                            <td>{{ $track->year  }}</td>
                                        </tr><!-- End .summary-total -->
                                        </tbody>
                                    </table><!-- End .table table-summary -->

                                </div><!-- End .summary -->
                            </aside><!-- End .col-lg-3 -->

                            <div class="col-lg-7" style="top: 150px">
                                <div class="contact_form_title"> <h4> Your Order Status </h4></div>


                                <div class="progress">
                                    @if($track->status == 0)
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>

                                    @elseif($track->status == 1)
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>

                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>

                                    @elseif($track->status == 2)
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>

                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>

                                        <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>

                                    @elseif($track->status == 3)
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>

                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>

                                        <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>

                                        <div class="progress-bar bg-success" role="progressbar" style="width: 35%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>

                                    @else

                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                    @endif

                                </div><br>

                                @if($track->status == 0)
                                    <h4>Note :</h4><h4 style="color: #c2c1c2"> Your Order is Under Review  </h4>

                                @elseif($track->status == 1)
                                   <h4>Note : </h4> <h4 style="color: #3399ff">Payment Accept Under Process  </h4>

                                @elseif($track->status == 2)
                                    <h4>Note :</h4> <h4 style="color: #0a95be">Packing Done Handover Process  </h4>

                                @elseif($track->status == 3)
                                    <h4>Note :</h4> <h4 style="color: #1f9446" > Order Completed  </h4>

                                @else

                                   <h4>Note:</h4> <h4 style="color: #e83838">Order Cancel  </h4>

                                @endif


                            </div><!-- End .col-lg-9 -->
                        </div><!-- End .row -->
                    </form>
                </div><!-- End .container -->
            </div><!-- End .checkout -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
