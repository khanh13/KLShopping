@extends('layouts.app')

@section('content')

    @php
        $order = DB::table('orders')->where('user_id',Auth::id())->orderBy('id','DESC')->limit(10)->get();
    @endphp

    <main class="main">
        <div class="page-header text-center" style="background-image: url({{asset('client_assets/assets/images/page-header-bg.jpg')}})">
            <div class="container">
                <h1 class="page-title">My Account<span></span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
            <div class="container">
                <ol class="breadcrumb">

                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="dashboard">
                <div class="container">
                    <div class="row">
                        <aside class="col-md-4 col-lg-2">
                            <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="true">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="false">Tracking Your Order</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">Account Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('user.logout') }}">Sign Out</a>
                                </li>
                            </ul>
                        </aside><!-- End .col-lg-3 -->

                        <div class="col-md-8 col-lg-10">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
                                    <a href="{{ route('success.orderlist') }}" class="btn btn-warning mb-2" style="float:right;">Cancel My Orders</a>

                                    <div class="col-12 card">
                                        <table class="table table-response">
                                            <thead>
                                            <tr>
                                                <th scope="col">Payment Type </th>
                                                <th scope="col">Payment ID </th>
                                                <th scope="col">Amount </th>
                                                <th scope="col">Date </th>
                                                <th scope="col">Status  </th>
                                                <th scope="col">Status Code </th>
                                                <th scope="col">Action </th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($order as $row)
                                                <tr>
                                                    <td scope="col">{{ $row->payment_type }} </td>
                                                    <td scope="col">{{ $row->payment_id }} </td>
                                                    <td scope="col">${{ $row->total }} </td>
                                                    <td scope="col">{{ $row->date }}  </td>
                                                    <td scope="col">
                                                        @if($row->status == 0)
                                                            <span class="badge badge-warning">Pending</span>
                                                        @elseif($row->status == 1)
                                                            <span class="badge badge-info">Payment Accept</span>
                                                        @elseif($row->status == 2)
                                                            <span class="badge badge-warning">Progress</span>
                                                        @elseif($row->status == 3)
                                                            <span class="badge badge-success">Delevered</span>
                                                        @else
                                                            <span class="badge badge-danger">Cancle</span>

                                                        @endif
                                                    </td>
                                                    <td scope="col"> {{ $row->status_code }}  </td>
                                                    <td scope="col">
                                                        <a href="" class="btn btn-sm btn-info"> View</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>

                                        </table>
                                    </div>
                                </div><!-- .End .tab-pane -->

                                <div class="tab-pane fade" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">

                                    <form method="post" action="{{ route('order.tracking') }}">
                                        @csrf
                                        <div class="modal-body">
                                            <label> Status Code</label>
                                            <input type="text" name="code" required="" class="form-control" placeholder="Enter Your Status Code">
                                        </div>
                                        <button type="submit" class="btn btn-outline-primary-2"><span>Track Your Order</span><i class="icon-long-arrow-right"></i></button>
                                    </form>
                                </div><!-- .End .tab-pane -->

                                <div class="tab-pane fade" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <img src="{{ asset('/public/images/avt/download.png') }}" class="card-img-top" style="height: 90px; width: 90px; margin-left: 10%"><br>
                                            </div>
                                            <div class="col-lg-3">
                                                <label>Name:</label>
                                                <h4>{{ Auth::user()->name }}</h4>
                                            </div><!-- End .col-sm-6 -->

                                            <div class="col-lg-3">
                                                <label>Phone: </label>
                                                <h4>{{ Auth::user()->phone }}</h4>
                                            </div><!-- End .col-sm-6 -->
                                            <div class="col-lg-3">
                                                <a href="{{ route('password.change') }}">Change Password</a>
                                            </div>
                                            <div class="col-lg-3"><label>Email </label>
                                                <h4>{{ Auth::user()->email }}</h4>
                                            </div>

                                        </div><!-- End .row -->



                                    </form>
                                </div><!-- .End .tab-pane -->
                            </div>
                        </div><!-- End .col-lg-9 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .dashboard -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
