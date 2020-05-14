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
                        <h2 class="pageheader-title">Blog</h2>
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
                    <div class="d-flex justify-content-end mb-2">
                        <a href="{{ route('blogs.create')}}" class="btn btn-success float-right"> Add Blog</a>
                    </div>
                        <div class="tab-content" id="myTabContent">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered first">
                                            <thead>
                                            <tr>
                                                <th>Id </th>
                                                <th>Title English Name</th>
                                                <th>Title Vietnamese Name</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($blogs as $blogs)
                                                <tr>
                                                    <td>{{ $blogs->id }}</td>
                                                    <td>{{ $blogs->title_en }}</td>
                                                    <td>{{ $blogs->title_vi }}</td>
                                                    <td><img src="{{ URL::to($blogs->image) }}" alt="" style="max-width: 100%; max-height: 70px"></td>
                                                    <td>
                                                        <a href="{{route('blogs.edit', $blogs->id)}}" class="btn btn-info btn-sm">Edit</a>
                                                        {{--                                                            <button id="delete" class="btn btn-danger btn-sm" href="{{route('categories.destroy', $category->id)}}">Delete</button>--}}
                                                        <a href="{{route('blogs.delete', $blogs->id)}}" class="btn btn-danger btn-sm" id="delete">Delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>Id </th>
                                                <th>Title English Name</th>
                                                <th>Title Vietnamese Name</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
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
@endsection

