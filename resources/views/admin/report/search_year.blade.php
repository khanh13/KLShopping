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
                        <h2 class="pageheader-title">Report this Year | Total amount: <h1 style="color: #2147b3">${{$total}} </h1> </h2>
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
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Payment Type</th>
                                        <th>Transaction Id</th>
                                        <th>SubTotal</th>
                                        <th>Shipping</th>
                                        <th>Total</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order as $product)
                                        <tr>
                                            <td>{{ $product->payment_type }}</td>
                                            <td>{{ $product->blnc_transection }}</td>
                                            <td>${{ $product->subtotal }}</td>
                                            <td>${{ $product->shipping}}</td>
                                            <td>${{ $product->total}}</td>
                                            <td>{{ $product->date }}</td>
                                            <td>
                                                @if($product->status == 0)
                                                    <span class="badge badge-warning">Pending</span>
                                                @elseif($product->status == 1)
                                                    <span class="badge badge-info">Payment Accept</span>
                                                @elseif($product->status == 2)
                                                    <span class="badge badge-warning">Progress</span>
                                                @elseif($product->status == 3)
                                                    <span class="badge badge-success">Delevered</span>
                                                @else
                                                    <span class="badge badge-danger">Cancle</span>
                                                @endif
                                            </td>

                                            <td>
                                                <a href="{{URL::to('admin/view/order/'.$product->id)}}" title="Edit" class="btn btn-rounded btn-info">View</a>
                                            </td>


                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
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
