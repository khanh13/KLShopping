@extends('admin.admin_layouts')

@section('content')
    <div class="dashboard-wrapper">
        <div class="container-fluid dashboard-content">
            <!-- ============================================================== -->
            <!-- pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <div class="d-flex justify-content-end mb-2">
                                        <a href="{{ route('admin.neworder') }}" class="btn btn-success float-right"> All Pending Orders</a>
                                    </div>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <!-- ============================================================== -->
                <!-- basic map -->
                <!-- ============================================================== -->
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">

                    <div class="card">
                        <h5 class="card-header">Order details</h5>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th> Name: </th>
                                    <th> {{ $order->name }} </th>
                                </tr>
                                <tr>
                                    <th> Phone: </th>
                                    <th> {{ $order->phone }} </th>
                                </tr>
                                <tr>
                                    <th> Payment Type: </th>
                                    <th>{{ $order->payment_type }} </th>
                                </tr>
                                <tr>
                                    <th> Payment Id: </th>
                                    <th> {{ $order->payment_id }} </th>
                                </tr>
                                <tr>
                                    <th> Total : </th>
                                    <th> {{ $order->total }} $ </th>
                                </tr>
                                <tr>
                                    <th> Month: </th>
                                    <th> {{ $order->month }} </th>
                                </tr>
                                <tr>
                                    <th> Date: </th>
                                    <th> {{ $order->date }} </th>
                                </tr>
                            </table>

                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end basic map -->
                <!-- ============================================================== -->
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <!-- ============================================================== -->
                    <!-- map events -->
                    <!-- ============================================================== -->
                    <div class="card">
                        <h5 class="card-header">Shipping Details</h5>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th> Name: </th>
                                    <th> {{ $shipping->ship_name }} </th>
                                </tr>
                                <tr>
                                    <th> Phone: </th>
                                    <th> {{ $shipping->ship_phone }} </th>
                                </tr>
                                <tr>
                                    <th> Email: </th>
                                    <th>{{ $shipping->ship_email }} </th>
                                </tr>
                                <tr>
                                    <th> Address: </th>
                                    <th> {{ $shipping->ship_address }} </th>
                                </tr>
                                <tr>
                                    <th> City : </th>
                                    <th> {{ $shipping->ship_city }} </th>
                                </tr>
                                <tr>
                                    <th> Status: </th>
                                    <th>
                                        @if($order->status == 0)
                                            <span class="badge badge-warning">Pending</span>
                                        @elseif($order->status == 1)
                                            <span class="badge badge-info">Payment Accept</span>
                                        @elseif($order->status == 2)
                                            <span class="badge badge-warning">Progress</span>
                                        @elseif($order->status == 3)
                                            <span class="badge badge-success">Delevered</span>
                                        @else
                                            <span class="badge badge-danger">Cancle</span>
                                        @endif
                                    </th>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end map events -->
                    <!-- ============================================================== -->
                </div>
                <div class="card pd-20 pd-sm-40 col-lg-12">
                    <h5 class="card-header">Product details</h5>


                    <div class="table-wrapper">
                        <table class="table display responsive nowrap">
                            <thead>
                            <tr>
                                <th class="wd-15p">Product ID</th>
                                <th class="wd-15p">Product Name</th>
                                <th class="wd-15p">Image</th>
                                <th class="wd-15p">Color</th>
                                <th class="wd-15p">Size</th>
                                <th class="wd-15p">Quantity</th>
                                <th class="wd-15p">Unit Price</th>
                                <th class="wd-20p">Total</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($details as $row)
                                <tr>
                                    <td>{{ $row->code }}</td>
                                    <td>{{ $row->product_name }}</td>

                                    <td> <img src="{{ URL::to($row->image_one) }}" height="50px;" width="50px;"> </td>
                                    <td>{{ $row->color }}</td>
                                    <td>{{ $row->size }}</td>
                                    <td>{{ $row->quantity }}</td>
                                    <td>${{ $row->singleprice }}</td>
                                    <td>${{ $row->totalprice }}</td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div><!-- table-wrapper -->
                    <div class="card-body">
                        @if($order->status == 0)
                            <a href="{{ url('admin/payment/accept/'.$order->id) }}" class="btn btn-info"> Accept Payment </a>
                            <a href="{{ url('admin/payment/cancel/'.$order->id) }}" class="btn btn-danger"> Cancel Order </a>
                        @elseif($order->status == 1)
                            <a href="{{ url('admin/delevery/process/'.$order->id) }}" class="btn btn-info">Process Delevery </a>
                        @elseif($order->status == 2)
                            <a href="{{ url('admin/delevery/done/'.$order->id) }}" class="btn btn-success">Delevery Done </a>
                        @elseif($order->status == 4)
                            <strong class="text-danger text-center"> This order are not valid  </strong>
                        @else
                            <strong class="text-success text-center">This product delivered successfully   </strong>
                        @endif

                    </div>
                </div><!-- card -->

            </div>

        </div>
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="text-md-right footer-links d-none d-sm-block">
                            <a href="javascript: void(0);">About</a>
                            <a href="javascript: void(0);">Support</a>
                            <a href="javascript: void(0);">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end footer -->
        <!-- ============================================================== -->
    </div>
@endsection
