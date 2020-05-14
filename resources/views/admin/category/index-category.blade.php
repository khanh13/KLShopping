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
                        <h2 class="pageheader-title">Category</h2>
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
                    <div class="tab-regular">
                        <ul class="nav nav-tabs " id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">All Categories</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Add Category</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered first">
                                                <thead>
                                                <tr>
                                                    <th>Id </th>
                                                    <th>Category name</th>
                                                    <th>Sub Categories Count</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($categories as $category)
                                                    <tr>
                                                        <td>{{ $category->id }}</td>
                                                        <td>{{ $category->category_name }}</td>
                                                        <td>{{ $category->subcategories->count() }}</td>
                                                        <td>
                                                            <a href="{{route('categories.edit', $category->id)}}" class="btn btn-info btn-sm">Edit</a>
{{--                                                            <button id="delete" class="btn btn-danger btn-sm" href="{{route('categories.destroy', $category->id)}}">Delete</button>--}}

                                                            <button class="btn btn-danger btn-sm" onclick="handleDelete({{$category->id}})">Delete</button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Category Name</th>
                                                    <th>Sub Categories Count</th>
                                                    <th>Action</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <h3>Add a new category</h3>
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('categories.store') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name" class="col-form-label">Category name</label>
                                                <input id="name" name="category_name" type="text" class="form-control">
                                            </div>
                                            <button class="btn btn-rounded btn-success">Add Category</button>
                                        </form>
                                    </div>
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
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="" method="POST" id="deleteForm">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Are you sure to delete?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-center text-bold">
                            Once Delete, This will be Permanently Delete!
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-rounded btn-light" data-dismiss="modal">No, goback</button>
                        <button type="submit" class="btn btn-rounded btn-danger">Yes, Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function handleDelete(id) {
            // console.log('delete', id)
            var form = document.getElementById('deleteForm')

            form.action = "/admin/categories/" + id
            // console.log('deleting', form)
            {{--$(form).attr("action", "{{route('categories.destroy')}}")--}}
            $('#deleteModal').modal('show')
        }
    </script>
@endsection
