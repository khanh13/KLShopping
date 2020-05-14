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
                        <h2 class="pageheader-title">Edit Sub Category</h2>
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
                        <h5 class="card-header">Sub Category</h5>
                        <div class="card-body">
                            <form action="{{ route('subcategories.update', $subcategory->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name" class="col-form-label">Edit</label>
                                    <input id="name" name="subcategory_name" type="text" class="form-control" value="{{ isset($subcategory) ? $subcategory->subcategory_name : '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="category">Category</label>
{{--                                    <select name="category_id" id="category_id" class="form-control">--}}
{{--                                        @foreach($categories as $category)--}}
{{--                                            <option value="{{ $category->id }}" @if($category->id == $subcategory->category_id) selected @endif>--}}
{{--                                                {{$category->name}}--}}
{{--                                            </option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
                                    <select name="category_id" class="form-control">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" @if($category->id == $subcategory->category_id) selected @endif>
                                                {{ $category->category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <button class="btn btn-rounded btn-success">Update Category</button>
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


