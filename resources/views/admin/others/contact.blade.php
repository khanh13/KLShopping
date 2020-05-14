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
                        <h2 class="pageheader-title">Pending Orders</h2>
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($message as $row)
                                        <tr>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->email }}</td>
                                            <td>{{ $row->phone }}</td>
                                            <td>{{ $row->subject}}</td>
                                            <td>{{ $row->message}}</td>
                                            <td>
                                                <a href="" title="Edit" class="btn btn-rounded btn-info">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Subject</th>
                                        <th>Message</th>
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
