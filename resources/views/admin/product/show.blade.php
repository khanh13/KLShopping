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

                        <h2 class="pageheader-title">Product Detail</h2>
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
                    <div class="d-flex justify-content-end mb-2">
                        <a href="{{ route('products.index')}}" class="btn btn-success float-right"> All Product</a>
                    </div>
                    <div class="card">
                        <h5 class="card-header">Bootstrap Validation Form</h5>
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="form-group">
                                            <label for="inputText3" class="col-form-label">Product Name:</label>
                                            <h3><strong>{{ $product->product_name }}</strong></h3>

                                        </div>
                                        <div class="form-group">
                                            <label for="discount" class="col-form-label">Quantity</label>
                                            <h3><strong>{{ $product->quantity }}</strong></h3>
                                        </div>

                                        <div class="form-group">
                                            <label for="discount" class="col-form-label">Color</label>
                                            <h3><strong>{{ $product->color }}</strong></h3>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="form-group">
                                            <label for="inputText3" class="col-form-label">Product Code</label>
                                            <h3><strong>{{ $product->code }}</strong></h3>
                                        </div>
                                        <div class="form-group">
                                            <label for="discount" class="col-form-label">Price</label>
                                            <h3><strong>${{ $product->price }}</strong></h3>
                                        </div>
                                        <div class="form-group">
                                            <label for="discount" class="col-form-label">Color</label>
                                            <h3><strong>{{ $product->size }}</strong></h3>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="form-group">
                                            <label for="discount" class="col-form-label">Description</label>
                                            <h3><strong>{{ $product->description }}</strong></h3>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="form-group">
                                            <label for="category">Category</label>
                                            <h3><strong>{{ $product->category->category_name }}</strong></h3>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="form-group">
                                            <label for="category">Subcategory</label>
                                            <h3><strong>{{ $product->subcategory->subcategory_name }}</strong></h3>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="form-group">
                                            <label for="category">Brand</label>
                                            <h3><strong>{{ $product->brand->brand_name }}</strong></h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Product Details: </label>
                                            <label class="control-label sr-only" for="summernote">Descriptions </label>
                                            <p><strong>{!! $product->detail !!} </strong></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Video Link: </label>
                                            <h3><strong>{{ $product->video_link }}</strong></h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="image">Image One</label>
                                            <br>
                                            <img src="{{ URL::to($product->image_one) }}" style="max-width: 100%; max-height: 200px">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="image">Image Two</label><br>
                                            <img src="{{ URL::to($product->image_two) }}" style="max-width: 100%; max-height: 200px">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="image">Image Three</label><br>
                                            <img src="{{ URL::to($product->image_three) }}" style="max-width: 100%; max-height: 200px">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="image">Image Four</label><br>
                                            <img src="{{ URL::to($product->image_four) }}" style="max-width: 100%; max-height: 200px">
                                        </div>
                                    </div>
                                </div>

                                <br><hr>

                                <div class="row">

                                    <div class="col-lg-3">
                                        <label class="">
                                            @if($product->main_slider == 1)
                                                <span class="badge badge-success">Active</span>

                                            @else
                                                <span class="badge badge-danger">Inactive</span>
                                            @endif
                                            <span class="">Main Slide</span>
                                        </label>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="">
                                            @if($product->now_trending == 1)
                                                <span class="badge badge-success">Active</span>

                                            @else
                                                <span class="badge badge-danger">Inactive</span>
                                            @endif
                                            <span class="">Now Trending</span>
                                        </label>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="">
                                            @if($product->new_releases == 1)
                                                <span class="badge badge-success">Active</span>

                                            @else
                                                <span class="badge badge-danger">Inactive</span>
                                            @endif
                                            <span class="">New Releases</span>
                                        </label>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="">
                                            @if($product->best_rated == 1)
                                                <span class="badge badge-success">Active</span>

                                            @else
                                                <span class="badge badge-danger">Inactive</span>
                                            @endif
                                            <span class="">Best rated</span>
                                        </label>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="">
                                            @if($product->mid_slide == 1)
                                                <span class="badge badge-success">Active</span>

                                            @else
                                                <span class="badge badge-danger">Inactive</span>
                                            @endif
                                            <span class="">Mid Slide</span>
                                        </label>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="">
                                            @if($product->coming_soon == 1)
                                                <span class="badge badge-success">Active</span>

                                            @else
                                                <span class="badge badge-danger">Inactive</span>
                                            @endif
                                            <span class="">Coming Soon</span>
                                        </label>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="">
                                            @if($product->hot_deal == 1)
                                                <span class="badge badge-success">Active</span>

                                            @else
                                                <span class="badge badge-danger">Inactive</span>
                                            @endif
                                            <span class="">Hot Deal</span>
                                        </label>
                                    </div>

                                </div>
                                <br>


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

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('select[name="category_id"]').on('change',function(){
                var category_id = $(this).val();
                if (category_id) {

                    $.ajax({
                        url: "{{ url('/admin/get/subcategory/') }}/"+category_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            var d =$('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value){

                                $('select[name="subcategory_id"]').append('<option value="'+ value.id + '">' + value.name + '</option>');

                            });
                        },
                    });

                }else{
                    alert('danger');
                }

            });
        });

    </script>

@endsection
