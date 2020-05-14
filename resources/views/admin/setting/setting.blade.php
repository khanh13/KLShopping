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

                    <div class="card">
                        <h5 class="card-header">Site Setting</h5>
                        <div class="card-body">
                            <form method="post" action="{{ route('update.sitesetting')  }}" >
                                @csrf

                                <input type="hidden" name="id" value="{{ $setting->id }}">
                                <div class="row">
                               <div class="col-lg-4">
                                   <div class="form-group">
                                       <label for="inputText3" class="col-form-label"> Phone One</label>
                                       <input id="inputText3" name="phone_one" value="{{ $setting->phone_one }}" type="text" class="form-control" required>
                                   </div>
                               </div>
                               <div class="col-lg-4">
                                   <div class="form-group">
                                       <label for="inputText3" class="col-form-label"> Phone Two</label>
                                       <input id="inputText3" name="phone_two"value="{{ $setting->phone_two }}" type="text" class="form-control" required>
                                   </div>
                               </div>
                               <div class="col-lg-4">
                                   <div class="form-group">
                                       <label for="inputText3" class="col-form-label"> Email</label>
                                       <input id="inputText3" name="email"value="{{ $setting->email }}" type="email" class="form-control" required>
                                   </div>
                               </div>
                               <div class="col-lg-4">
                                   <div class="form-group">
                                       <label for="inputText3" class="col-form-label"> Company Name</label>
                                       <input id="inputText3"value="{{ $setting->company_name }}" name="company_name" type="text" class="form-control" required>
                                   </div>
                               </div>
                               <div class="col-lg-4">
                                   <div class="form-group">
                                       <label for="inputText3" class="col-form-label"> Company Address</label>
                                       <input id="inputText3"value="{{ $setting->company_address }}" name="company_address" type="text" class="form-control" required>
                                   </div>
                               </div>
                               <div class="col-lg-4">
                                   <div class="form-group">
                                       <label for="inputText3" class="col-form-label"> Facebook</label>
                                       <input id="inputText3" value="{{ $setting->facebook }}"name="facebook" type="text" class="form-control" required>
                                   </div>
                               </div>
                               <div class="col-lg-4">
                                   <div class="form-group">
                                       <label for="inputText3" class="col-form-label"> YouTube</label>
                                       <input id="inputText3"value="{{ $setting->youtube }}" name="youtube" type="text" class="form-control" required>
                                   </div>
                               </div>
                               <div class="col-lg-4">
                                   <div class="form-group">
                                       <label for="inputText3" class="col-form-label"> Instagram</label>
                                       <input id="inputText3"value="{{ $setting->instagram }}" name="instagram" type="text" class="form-control" required>
                                   </div>
                               </div>
                               <div class="col-lg-4">
                                   <div class="form-group">
                                       <label for="inputText3" class="col-form-label"> Twitter</label>
                                       <input id="inputText3"value="{{ $setting->twitter }}" name="twitter" type="text" class="form-control" required>
                                   </div>
                               </div>
                               <div class="col-lg-4">
                                   <button class="btn btn-info">Update</button>
                               </div>
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


