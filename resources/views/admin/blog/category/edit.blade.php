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
                        <h2 class="pageheader-title">Edit Blog Category</h2>
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
                        <h5 class="card-header">Blog Category</h5>
                        <div class="card-body">
                            <form action="{{ route('blogcategories.update', $blogcategory->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name" class="col-form-label">Blog Category English name</label>
                                    <input id="name" name="category_name_en" type="text" class="form-control" value="{{ isset($blogcategory) ? $blogcategory->category_name_en : '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-form-label">Blog Category Vietnamese name</label>
                                    <input id="name" name="category_name_vi" type="text" class="form-control" value="{{ isset($blogcategory) ? $blogcategory->category_name_vi : '' }}">
                                </div>
                                <button class="btn btn-rounded btn-success">Update Blog Category</button>

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


