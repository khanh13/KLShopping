@extends('layouts.app')

@section('content')
    <main class="main">
        <div class="page-header text-center" style="background-image: url({{asset('client_assets/assets/images/page-header-bg.jpg')}})">
            <div class="container">
                <h1 class="page-title">Tracking Order<span></span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">

                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="checkout">
                <div class="container">
                    <div class="checkout-discount">

                    </div><!-- End .checkout-discount -->
                    <form action="#">
                        <div class="row">
                            <div class="col-12 card" style="left: 5rem">
                                <table class="table table-response">
                                    <thead>
                                    <tr>
                                        <th scope="col">Payment Type </th>
                                        <th scope="col">Return </th>
                                        <th scope="col">Amount </th>
                                        <th scope="col">Date </th>
                                        <th scope="col">Status  </th>
                                        <th scope="col">Action </th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order as $row)
                                        <tr>
                                            <td scope="col">{{ $row->payment_type }} </td>
                                            <td scope="col">
                                                @if($row->return_order == 0)
                                                    <span class="badge badge-warning">No Request</span>
                                                @elseif($row->return_order == 1)
                                                    <span class="badge badge-info">Pending</span>
                                                @elseif($row->return_order == 2)
                                                    <span class="badge badge-success">Success</span>

                                                @endif
                                            </td>
                                            <td scope="col">${{ $row->total }} </td>
                                            <td scope="col">{{ $row->date }}  </td>
                                            <td scope="col">
                                                @if($row->status == 0)
                                                    <span class="badge badge-warning">Pending</span>
                                                @elseif($row->status == 1)
                                                    <span class="badge badge-info">Payment Accept</span>
                                                @elseif($row->status == 2)
                                                    <span class="badge badge-warning">Progress</span>
                                                @elseif($row->status == 3)
                                                    <span class="badge badge-success">Delevered</span>
                                                @else
                                                    <span class="badge badge-danger">Cancle</span>

                                                @endif
                                            </td>
                                            <td scope="col">
                                                @if($row->return_order == 0)
                                                    <a href="{{ url('request/return/'.$row->id) }}" class="btn btn-sm btn-danger" id="return"> Return</a>
                                                @elseif($row->return_order == 1)
                                                    <span class="badge badge-info">Pending</span>
                                                @elseif($row->return_order == 2)
                                                    <span class="badge badge-warning">Requested for Return</span>
                                                @endif
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div><!-- End .row -->
                    </form>
                </div><!-- End .container -->
            </div><!-- End .checkout -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
