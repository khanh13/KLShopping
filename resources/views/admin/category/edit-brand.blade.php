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
                        <h2 class="pageheader-title">Edit Brand</h2>
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

                    <div class="card">
                        <h5 class="card-header">Brand</h5>
                        <div class="card-body">
                            <form action="{{ route('brands.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name" class="col-form-label">Edit</label>
                                    <input id="name" name="brand_name" type="text" class="form-control" value="{{ isset($brand) ? $brand->brand_name : '' }}">
                                </div>
                                <div class="form-group">
                                    <p>Old Image</p>
                                </div><br><br>
                                @if(isset($brand))
                                    <div class="form-group">
                                        <img src="{{ asset('storage/'.$brand->image) }}" max-width="500px" height="auto" alt="">
{{--                                        <input type="hidden" name="oldImage" value="{{ $brand->image }}">--}}
                                    </div>
                                @endif
                                <br><br>
                                <div class="form-group">
                                    <input type="file" class="form-control" name="image" >
                                </div><br>
                                <button class="btn btn-rounded btn-success">Update Brand</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end basic table  -->
                <!-- ============================================================== -->
            </div>
        </div>
    </div>
@endsection


