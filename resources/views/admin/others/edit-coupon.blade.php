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
                        <h2 class="pageheader-title">Edit Coupon</h2>
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
                        <h5 class="card-header">Coupon</h5>
                        <div class="card-body">
                            <form action="{{ route('coupons.update', $coupon->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="coupon" class="col-form-label">Edit</label>
                                    <input id="name" name="coupon" type="text" class="form-control" value="{{ isset($coupon) ? $coupon->coupon : '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="discount" class="col-form-label">Discount %</label>
                                    <input id="discount" name="discount" type="number" min="1" max="100" value="{{ isset($coupon) ? $coupon->discount : '' }}" placeholder="Number between 1 - 100"class="form-control">
                                </div>
                                <button class="btn btn-rounded btn-success">Update Coupon</button>

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


