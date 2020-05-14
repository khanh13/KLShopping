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

                        <h2 class="pageheader-title">Add Blog</h2>
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
                        <a href="{{ route('blogs.index')}}" class="btn btn-success float-right"> All Blogs</a>
                    </div>
                    <div class="card">
                        <h5 class="card-header">Bootstrap Validation Form</h5>
                        <div class="card-body">
                            <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="inputText3" class="col-form-label">Title (English)</label>
                                            <input id="inputText3" name="title_en" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="inputText3" class="col-form-label">Title (Vietnam)</label>
                                            <input id="inputText3" name="title_vi" type="text" class="form-control">
                                        </div>


                                    </div>


                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                        <div class="form-group">
                                            <label for="category">Blog Category</label>
                                            <select name="category_id" class="form-control">
                                                <option label="Choose Category"></option>
                                                @foreach($blogcategories as $blogcategory)
                                                    <option value="{{ $blogcategory->id }}">{{ $blogcategory->category_name_en }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Blog Details (English) </label>
                                            <label class="control-label sr-only" for="summernote">Descriptions </label>
                                            <textarea class="form-control" name="details_en" id="summernote" name="editordata" rows="6" placeholder="Write Descriptions"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Blog Details (Vietnam) </label>
                                            <label class="control-label sr-only" for="summernote">Descriptions </label>
                                            <textarea class="form-control" name="details_vi" id="summernote1" name="editordata" rows="6" placeholder="Write Descriptions"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="image">Image </label>
                                            <input type="file" class="form-control" name="image" onchange="readURL1(this);" required="">
                                            <img src="#" id="img1" alt="" style="max-width: 100%; max-height: 200px">
                                        </div>
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
    <script>
        $(document).ready(function() {
            $('#summernote1').summernote({
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


@endsection
