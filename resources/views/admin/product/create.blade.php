@extends('admin.admin_layouts')

@section('css')
    <link rel="stylesheet" href="{{ asset('admin_assets/vendor/select2/css/select2.css') }}">
    <link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet"/>
    <style>
        .bootstrap-tagsinput input{
            width: 500px;
        }
        .bootstrap-tagsinput .tag{
            background-color: #5591d7;
            font-size: medium;
        }
        /*.product-banner .banner-content.center{*/
        /*    left:50%;*/
        /*    transform: translateX(-50%);*/
        /*    top:unset;*/
        /*    bottom: 5rem;*/
        /*    display: flex;*/
        /*    flex-direction: column;*/
        /*}*/
    </style>
@endsection
@section('content')
    <div class="dashboard-wrapper">
        <div class="container-fluid  dashboard-content">
            <!-- ============================================================== -->
            <!-- pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">

                        <h2 class="pageheader-title">Add Product</h2>
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
                            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="form-group">
                                            <label for="inputText3" class="col-form-label">Product Name</label>
                                            <input id="inputText3" name="product_name" type="text" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="a" class="col-form-label">Color</label><br>
                                            <input class="form-control" type="text" name="color" id="color" data-role="tagsinput" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="quantity" class="col-form-label">Quantity</label>
                                            <input id="quantity" name="quantity" type="number" min="1" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="form-group">
                                            <label for="inputText3" class="col-form-label">Product Code</label>
                                            <input id="inputText3" name="code" type="text" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="b" class="col-form-label">Size</label><br>
                                            <input class="form-control" type="text" name="size" id="color" data-role="tagsinput" >
                                        </div>
                                        <div class="form-group">
                                            <label for="price" class="col-form-label">Price</label>
                                            <input id="price" name="price" type="number" min="1" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="form-group">
                                            <label for="description" class="col-form-label">Description</label>
                                            <textarea id="description" name="description" rows="5" class="form-control" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="discount" class="col-form-label">Discount Price</label>
                                            <input id="discount" name="discount" type="number" min="1" class="form-control" >
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="form-group">
                                            <label for="category">Category</label>
                                            <select name="category_id" class="form-control">
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">
                                                        {{ $category->category_name }}
                                                    </option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="form-group">
                                            <label for="category">Sub Category</label>
                                            <select name="subcategory_id" class="form-control">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="form-group">
                                            <label for="category">Brand</label>
                                            <select name="brand_id" class="form-control" required>
                                                <option label="Choose Brand"></option>
                                                @foreach($brands as $brand)
                                                    <option value="{{ $brand->id }}">
                                                        {{ $brand->brand_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Product Details: </label>
                                            <label class="control-label sr-only" for="summernote">Descriptions </label>
                                            <textarea class="form-control" name="detail" id="summernote" name="editordata" rows="6" placeholder="Write Descriptions" required=""></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Video Link: </label>
                                            <input class="form-control" name="video_link" placeholder="Video Link" >
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="image">Image One (Main thumbnail)</label>
                                            <input type="file" class="form-control" name="image_one" onchange="readURL1(this);" required>
                                            <img id="img1" style="max-width: 100%; max-height: 200px" alt="">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="image">Image Two</label>
                                            <input type="file" class="form-control" name="image_two" onchange="readURL2(this);" required>
                                            <img id="img2" style="max-width: 100%; max-height: 200px" alt="">

                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="image">Image Three</label>
                                            <input type="file" class="form-control" name="image_three" onchange="readURL3(this);" required>
                                            <img id="img3" style="max-width: 100%; max-height: 200px" alt="">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="image">Image Four</label>
                                            <input type="file" class="form-control" name="image_four" onchange="readURL4(this);" required>
                                            <img id="img4" style="max-width: 100%; max-height: 200px" alt="">

                                        </div>
                                    </div>
                                </div>

                                <br><hr>

                                <div class="row">
                                    <div class="col-lg-3">
                                        <label class="custom-control custom-checkbox custom-control-inline">
                                            <input name="main_slider" type="checkbox" class="custom-control-input" value="1" >
                                            <span class="custom-control-label">Main Slide</span>
                                        </label>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="custom-control custom-checkbox custom-control-inline">
                                            <input name="now_trending" type="checkbox" class="custom-control-input" value="1">
                                            <span class="custom-control-label">Now Trending</span>
                                        </label>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="custom-control custom-checkbox custom-control-inline">
                                            <input name="new_releases" type="checkbox" class="custom-control-input" value="1" >
                                            <span class="custom-control-label">New Releases</span>
                                        </label>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="custom-control custom-checkbox custom-control-inline">
                                            <input name="best_rated" type="checkbox" class="custom-control-input" value="1">
                                            <span class="custom-control-label">Best rated</span>
                                        </label>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="custom-control custom-checkbox custom-control-inline">
                                            <input name="mid_slider" type="checkbox" class="custom-control-input" value="1" >
                                            <span class="custom-control-label">Mid Slide</span>
                                        </label>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="custom-control custom-checkbox custom-control-inline">
                                            <input name="coming_soon" type="checkbox" class="custom-control-input" value="1" >
                                            <span class="custom-control-label">Coming Soon</span>
                                        </label>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" name="hot_deal" class="custom-control-input" value="1" >
                                            <span class="custom-control-label">Hot Deal</span>
                                        </label>
                                    </div>

                                </div>


                                <br>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <button class="btn btn-primary" type="submit">Submit form</button>
                                </div>

                            </form>
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
                        url: "{{ url('/get/subcategory/') }}/"+category_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            var d =$('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value){

                                $('select[name="subcategory_id"]').append('<option value="'+ value.id + '">' + value.subcategory_name + '</option>');

                            });
                        },
                    });

                }else{
                    alert('danger');
                }

            });
        });

    </script>
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
    <script src="{{ asset('admin_assets/vendor/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/summernote/js/summernote-bs4.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({ tags: true });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300

            });
        });
    </script>

    <script type="text/javascript">
        function readURL1(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#img1')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script type="text/javascript">
        function readURL2(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#img2')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script type="text/javascript">
        function readURL3(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#img3')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script type="text/javascript">
        function readURL4(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#img4')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection
