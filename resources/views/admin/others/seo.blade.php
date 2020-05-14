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

                    <div class="card">
                        <h5 class="card-header">Bootstrap Validation Form</h5>
                        <div class="card-body">
                            <form action="{{ route('update.seo')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="form-group">
                                            <label for="inputText3" class="col-form-label">Meta Title</label>
                                            <input id="inputText3" name="meta_title" type="text" class="form-control" value="{{ $seo->meta_title }}" >
                                        </div>

                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="form-group">
                                            <label for="inputText3" class="col-form-label">Meta Author</label>
                                            <input id="inputText3" name="meta_author" type="text" class="form-control" value="{{ $seo->meta_author }}">
                                        </div>

                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="form-group">
                                            <label for="inputText3" class="col-form-label">Meta Tag</label>
                                            <input id="inputText3" name="meta_tag" type="text" class="form-control" value="{{ $seo->meta_tag }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="inputText3" class="col-form-label">Google Analytics</label>
                                            <textarea class="form-control" name="google_analytics">{{ $seo->google_analytics }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="inputText3" class="col-form-label">Bing Analytics</label>
                                            <textarea class="form-control" name="bing_analytics">{{ $seo->bing_analytics }}</textarea>
                                        </div>

                                    </div>


                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Description: </label>
                                            <label class="control-label sr-only" for="summernote">Descriptions </label>
                                            <textarea class="form-control" name="meta_description" id="summernote" name="editordata" rows="6" placeholder="Write Descriptions">{{ $seo->meta_description }}</textarea>
                                        </div>
                                    </div>

                                </div>

                                <br>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <button class="btn btn-primary" type="submit">Submit form</button>
                                </div>
                                <input type="hidden" name="id" value="{{ $seo->id }}">

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
