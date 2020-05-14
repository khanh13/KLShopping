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
                        <h2 class="pageheader-title">Product</h2>
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
                        <a href="{{route('products.create')}}" class="btn btn-success float-right">Add Product</a>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Product Code</th>
                                        <th>Product Name</th>
                                        <th>Image</th>
                                        <th>Category</th>
                                        <th>Brand</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{ $product->code }}</td>
                                            <td>{{ $product->product_name }}</td>
                                            <td><img src="{{ URL::to($product->image_one) }}" alt="" style="max-width: 100%; max-height: 50px"></td>
                                            <td>{{ $product->category->category_name }}</td>
                                            <td>{{ $product->brand->brand_name }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>${{ $product->price }}</td>
                                            <td>
                                                @if($product->status == 1)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-secondary">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('products.edit', $product->id)}}" title="Edit" class="btn btn-rounded btn-info"><i class="fas fa-edit"></i></a>
                                                <a href="{{route('products.delete', $product->id)}}" class="btn btn-rounded btn-danger" title="Delete" id="delete" ><i class="far fa-trash-alt"></i></a>
                                                <a href="{{route('products.show', $product->id)}}" title="Show" class="btn btn-rounded btn-primary"><i class="fas fa-eye"></i></a>
                                                @if($product->status == 1)
                                                    <a href="{{route('products.deactivated', $product->id)}}" title="Deactivated" class="btn btn-rounded btn-secondary"><i class="fas fa-thumbs-down"></i></a>

                                                @else
                                                    <a href="{{route('products.activated', $product->id)}}" title="Activated" class="btn btn-rounded btn-success"><i class="fas fa-thumbs-up"></i></a>

                                                @endif
                                            </td>


                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Product Code</th>
                                        <th>Product Name</th>
                                        <th>Image</th>
                                        <th>Category</th>
                                        <th>Brand</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
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
{{--    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">--}}
{{--        <div class="modal-dialog" role="document">--}}
{{--            <form action="" method="POST" id="deleteForm">--}}
{{--                @csrf--}}
{{--                @method('DELETE')--}}
{{--                <div class="modal-content">--}}
{{--                    <div class="modal-header">--}}
{{--                        <h5 class="modal-title" id="deleteModalLabel">Are you sure to delete?</h5>--}}
{{--                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                            <span aria-hidden="true">&times;</span>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                    <div class="modal-body">--}}
{{--                        <p class="text-center text-bold">--}}
{{--                            Once Delete, This will be Permanently Delete!--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                    <div class="modal-footer">--}}
{{--                        <button type="button" class="btn btn-rounded btn-light" data-dismiss="modal">No, goback</button>--}}
{{--                        <button type="submit" class="btn btn-rounded btn-danger">Yes, Delete</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection

@section('scripts')
{{--    <script>--}}
{{--        function handleDelete(id) {--}}
{{--            // console.log('delete', id)--}}
{{--            var form = document.getElementById('deleteForm')--}}

{{--            form.action = "/admin/products/" + id--}}
{{--            // console.log('deleting', form)--}}
{{--            --}}{{--$(form).attr("action", "{{route('categories.destroy')}}")--}}
{{--            $('#deleteModal').modal('show')--}}
{{--        }--}}
{{--    </script>--}}
@endsection
