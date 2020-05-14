@extends('admin.admin_layouts')

@section('content')

    @php
    use Carbon\Carbon;
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
                $date = $dt->format('d-m-Y');



                $today = DB::table('orders')->where('date',$date)->sum('total');

                $month = date('F');
                $month = DB::table('orders')->where('month',$month)->sum('total');

                $year = date('Y');
                $year = DB::table('orders')->where('year',$year)->sum('total');

                $delevery = DB::table('orders')->where('date',$date)->where('status',3)->sum('total');

                $return = DB::table('orders')->where('return_order',2)->sum('total');

                $product = DB::table('products')->get();
                $brand = DB::table('brands')->get();
                $user = DB::table('users')->get();

    @endphp

    <!-- wrapper  -->
    <!-- ============================================================== -->
    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content ">
                <!-- ============================================================== -->
                <!-- pageheader  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">E-commerce Dashboard Template </h2>
                            <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">E-Commerce Dashboard Template</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader  -->
                <!-- ============================================================== -->
                <div class="ecommerce-widget">


                    <div class="row">
                        <!-- ============================================================== -->
                        <!-- sales  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card border-3 border-top border-top-primary">
                                <div class="card-body">
                                    <h5 class="text-muted">Today's Orders</h5>
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1">${{$today}}</h1>
                                    </div>
                                    <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end sales  -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- new customer  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card border-3 border-top border-top-primary">
                                <div class="card-body">
                                    <h5 class="text-muted">This Month's Sales</h5>
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1">${{$month}}</h1>
                                    </div>
                                    <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end new customer  -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- visitor  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card border-3 border-top border-top-primary">
                                <div class="card-body">
                                    <h5 class="text-muted">This Year's Sales</h5>
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1">${{$year}}</h1>
                                    </div>
                                    <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end visitor  -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- total orders  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card border-3 border-top border-top-primary">
                                <div class="card-body">
                                    <h5 class="text-muted">Today Delivered</h5>
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1">${{$delevery}}</h1>
                                    </div>
                                    <div class="metric-label d-inline-block float-right text-danger font-weight-bold">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end total orders  -->
                        <!-- ============================================================== -->
                    </div>
                    <div class="row">
                        <!-- ============================================================== -->
                        <!-- sales  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card border-3 border-top border-top-primary">
                                <div class="card-body">
                                    <h5 class="text-muted">Total Return</h5>
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1">${{$return}}</h1>
                                    </div>
                                    <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end sales  -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- new customer  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card border-3 border-top border-top-primary">
                                <div class="card-body">
                                    <h5 class="text-muted">Total Product</h5>
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1">{{count($product)}}</h1>
                                    </div>
                                    <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end new customer  -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- visitor  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card border-3 border-top border-top-primary">
                                <div class="card-body">
                                    <h5 class="text-muted">Total Brand</h5>
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1">{{count($brand)}}</h1>
                                    </div>
                                    <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end visitor  -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- total orders  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card border-3 border-top border-top-primary">
                                <div class="card-body">
                                    <h5 class="text-muted">Total User</h5>
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1">{{count($user)}}</h1>
                                    </div>
                                    <div class="metric-label d-inline-block float-right text-danger font-weight-bold">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end total orders  -->
                        <!-- ============================================================== -->
                    </div>

                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
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
    <!-- ============================================================== -->
    <!-- end wrapper  -->
@endsection
