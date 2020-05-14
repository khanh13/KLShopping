@extends('admin.admin_layouts')

@section('css')
    <link rel="stylesheet" href="{{ asset('admin_assets/vendor/select2/css/select2.css') }}">
    <link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet"/>
    <style>
        .bootstrap-tagsinput input{
            width: 500px;
        }
        .bootstrap-tagsinput .tag{
            background-color: #5591d7;
            font-size: medium;
        }
        /*.product-banner .banner-content.center{*/
        /*    left:50%;*/
        /*    transform: translateX(-50%);*/
        /*    top:unset;*/
        /*    bottom: 5rem;*/
        /*    display: flex;*/
        /*    flex-direction: column;*/
        /*}*/
    </style>
@endsection
@section('content')
    <div class="dashboard-wrapper">
        <div class="container-fluid  dashboard-content">
            <!-- ============================================================== -->
            <!-- pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">

                        <h2 class="pageheader-title">Create Admin</h2>
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
                <!-- validation form -->
                <!-- ============================================================== -->

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="d-flex justify-content-end mb-2">
                        <a href="{{ route('admin.all.user')}}" class="btn btn-success float-right"> All User Role</a>
                    </div>
                    <div class="card">
                        <h5 class="card-header">Create User ROle</h5>
                        <div class="card-body">
                            <form action="{{ route('store.admin') }}" method="POST" >
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="inputText3" class="col-form-label"> Name</label>
                                            <input id="inputText3" name="name" type="text" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputText3" class="col-form-label">Phone</label>
                                            <input id="inputText3" name="phone" type="text" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="inputText3" class="col-form-label">Email</label>
                                            <input id="inputText3" name="email" type="email" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputText3" class="col-form-label">Password</label>
                                            <input id="inputText3" name="password" type="password" class="form-control" required>
                                        </div>
                                    </div>



                                </div>

                                <br><hr>

                                <div class="row">
                                    <div class="col-lg-3">
                                        <label class="custom-control custom-checkbox custom-control-inline">
                                            <input name="category" type="checkbox" class="custom-control-input" value="1" >
                                            <span class="custom-control-label">Category</span>
                                        </label>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="custom-control custom-checkbox custom-control-inline">
                                            <input name="coupon" type="checkbox" class="custom-control-input" value="1">
                                            <span class="custom-control-label">Coupon</span>
                                        </label>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="custom-control custom-checkbox custom-control-inline">
                                            <input name="product" type="checkbox" class="custom-control-input" value="1" >
                                            <span class="custom-control-label">Product</span>
                                        </label>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" name="stock" class="custom-control-input" value="1" >
                                            <span class="custom-control-label">Stock</span>
                                        </label>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="custom-control custom-checkbox custom-control-inline">
                                            <input name="blog" type="checkbox" class="custom-control-input" value="1">
                                            <span class="custom-control-label">Blog</span>
                                        </label>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="custom-control custom-checkbox custom-control-inline">
                                            <input name="order" type="checkbox" class="custom-control-input" value="1" >
                                            <span class="custom-control-label">Order</span>
                                        </label>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="custom-control custom-checkbox custom-control-inline">
                                            <input name="other" type="checkbox" class="custom-control-input" value="1" >
                                            <span class="custom-control-label">Other</span>
                                        </label>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" name="report" class="custom-control-input" value="1" >
                                            <span class="custom-control-label">Report</span>
                                        </label>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" name="role" class="custom-control-input" value="1" >
                                            <span class="custom-control-label">Role</span>
                                        </label>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" name="return" class="custom-control-input" value="1" >
                                            <span class="custom-control-label">Return</span>
                                        </label>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" name="contact" class="custom-control-input" value="1" >
                                            <span class="custom-control-label">Contact</span>
                                        </label>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" name="comment" class="custom-control-input" value="1" >
                                            <span class="custom-control-label">Comment</span>
                                        </label>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" name="setting" class="custom-control-input" value="1" >
                                            <span class="custom-control-label">Setting</span>
                                        </label>
                                    </div>

                                </div>


                                <br>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <button class="btn btn-primary" type="submit">Submit form</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end validation form -->
                <!-- ============================================================== -->
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


