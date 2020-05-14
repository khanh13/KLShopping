@extends('admin.admin_layouts')

@section('content')
    <div class="dashboard-wrapper">
        <div class="container-fluid  dashboard-content">
            <!-- ============================================================== -->
            <!-- pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Return Request</h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
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
                <!-- basic table  -->
                <!-- ============================================================== -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <h2 class="pageheader-title">Return Request</h2>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Order id</th>
                                        <th>Payment Type</th>
                                        <th>Transaction Id</th>
                                        <th>SubTotal</th>
                                        <th>Shipping</th>
                                        <th>Total</th>
                                        <th>Date</th>
                                        <th>Return</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->payment_type }}</td>
                                            <td>{{ $product->blnc_transection }}</td>
                                            <td>${{ $product->subtotal }}</td>
                                            <td>${{ $product->shipping}}</td>
                                            <td>${{ $product->total}}</td>
                                            <td>{{ $product->date }}</td>
                                            <td>
                                                @if($product->return_order == 1)
                                                    <span class="badge badge-warning">Pending</span>
                                                @elseif($product->return_order == 2)
                                                    <span class="badge badge-success">Success</span>
                                                @endif
                                            </td>

                                            <td>
                                                <a href="{{ URL::to('admin/approve/return/'.$product->id) }}" title="Edit" class="btn btn-rounded btn-info">Approve</a>
                                            </td>


                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Order id</th>
                                        <th>Payment Type</th>
                                        <th>Transaction Id</th>
                                        <th>SubTotal</th>
                                        <th>Shipping</th>
                                        <th>Total</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end basic table  -->
                <!-- ============================================================== -->
            </div>
        </div>
    </div>

