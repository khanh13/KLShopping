@extends('admin.admin_layouts')

@section('content')
    <div class="dashboard-wrapper">
        <div class="container-fluid dashboard-content">
            <!-- ============================================================== -->
            <!-- pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Listgroup </h2>
                        <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">UI Elements</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Listgroup</li>
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
                <!-- basic list  -->
                <!-- ============================================================== -->
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Basic</h5>
                        <div class="card-body">
                            <div class="card pd-20 pd-sm-40">
                                <div class="table-wrapper">
                                    <form method="post" action="{{ route('search.by.date') }}" >
                                        @csrf
                                        <div class="modal-body pd-20">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Search By Date</label>
                                                <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="date">

                                            </div>
                                        </div><!-- modal-body -->
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-info pd-x-20">Submit</button>

                                        </div>
                                    </form>
                                </div><!-- table-wrapper -->
                            </div><!-- card -->
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end basic list  -->
                <!-- ============================================================== -->
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                    <!-- ============================================================== -->
                    <!-- hover list  -->
                    <!-- ============================================================== -->
                    <div class="card">
                        <h5 class="card-header">Hover List Group</h5>
                        <div class="card-body">
                            <div class="card pd-20 pd-sm-40">
                                <div class="table-wrapper">
                                    <form method="post" action="{{ route('search.by.month') }}" >
                                        @csrf
                                        <div class="modal-body pd-20">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Search By Month</label>

                                                <select class="form-control" name="month">
                                                    <option value="january">January</option>
                                                    <option value="february">February</option>
                                                    <option value="march">March</option>
                                                    <option value="april">April</option>
                                                    <option value="may">May</option>
                                                    <option value="jun">Jun</option>
                                                    <option value="july">July</option>
                                                    <option value="august">August</option>
                                                    <option value="september">September</option>
                                                    <option value="october">October</option>
                                                    <option value="november">November</option>
                                                    <option value="december">December</option>

                                                </select>

                                            </div>
                                        </div><!-- modal-body -->
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-info pd-x-20">Submit</button>

                                        </div>
                                    </form>
                                </div><!-- table-wrapper -->
                            </div><!-- card -->
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end hoverlist  -->
                    <!-- ============================================================== -->
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                    <!-- ============================================================== -->
                    <!-- flush list  -->
                    <!-- ============================================================== -->
                    <div class="card">
                        <h5 class="card-header">Flush List</h5>
                        <div class="card-body">
                            <div class="card pd-20 pd-sm-40">
                                <div class="table-wrapper">
                                    <form method="post" action="{{ route('search.by.year') }}" >
                                        @csrf
                                        <div class="modal-body pd-20">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Search By Year</label>

                                                <select class="form-control" name="year">

                                                    <option value="2020">2020</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                    <option value="2023">2023</option>
                                                    <option value="2024">2024</option>
                                                    <option value="2025">2025</option>


                                                </select>

                                            </div>
                                        </div><!-- modal-body -->
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-info pd-x-20">Submit</button>

                                        </div>
                                    </form>
                                </div><!-- table-wrapper -->
                            </div><!-- card -->

                        </div>
                        <!-- ============================================================== -->
                        <!-- end flush list -->
                        <!-- ============================================================== -->
                    </div>
                </div>
            </div>
                <!-- ============================================================== -->
                <!-- contectual list  -->

                <!-- ============================================================== -->
                <!-- end custom list badge -->
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
