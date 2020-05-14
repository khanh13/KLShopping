@extends('layouts.app')

@section('content')
    <main class="main">
        <div class="page-header text-center" style="background-image: url({{asset('client_assets/assets/images/page-header-bg.jpg')}})">
            <div class="container">
                <h1 class="page-title">Search Product<span></span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
            <div class="container">
                <ol class="breadcrumb">

                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="toolbox">
                            <div class="toolbox-left">
                                <div class="toolbox-info">
                                    Showing <span>9 of 56</span> Products
                                </div><!-- End .toolbox-info -->
                            </div><!-- End .toolbox-left -->

                            <div class="toolbox-right">
                                <div class="toolbox-sort">
                                    <label for="sortby">Sort by:</label>
                                    <div class="select-custom">
                                        <select name="sortby" id="sortby" class="form-control">
                                            <option value="popularity" selected="selected">Most Popular</option>
                                            <option value="rating">Most Rated</option>
                                            <option value="date">Date</option>
                                        </select>
                                    </div>
                                </div><!-- End .toolbox-sort -->
                                <div class="toolbox-layout">
                                    <a href="category-list.html" class="btn-layout">
                                        <svg width="16" height="10">
                                            <rect x="0" y="0" width="4" height="4" />
                                            <rect x="6" y="0" width="10" height="4" />
                                            <rect x="0" y="6" width="4" height="4" />
                                            <rect x="6" y="6" width="10" height="4" />
                                        </svg>
                                    </a>

                                    <a href="category-2cols.html" class="btn-layout">
                                        <svg width="10" height="10">
                                            <rect x="0" y="0" width="4" height="4" />
                                            <rect x="6" y="0" width="4" height="4" />
                                            <rect x="0" y="6" width="4" height="4" />
                                            <rect x="6" y="6" width="4" height="4" />
                                        </svg>
                                    </a>

                                    <a href="category.html" class="btn-layout">
                                        <svg width="16" height="10">
                                            <rect x="0" y="0" width="4" height="4" />
                                            <rect x="6" y="0" width="4" height="4" />
                                            <rect x="12" y="0" width="4" height="4" />
                                            <rect x="0" y="6" width="4" height="4" />
                                            <rect x="6" y="6" width="4" height="4" />
                                            <rect x="12" y="6" width="4" height="4" />
                                        </svg>
                                    </a>

                                    <a href="category-4cols.html" class="btn-layout active">
                                        <svg width="22" height="10">
                                            <rect x="0" y="0" width="4" height="4" />
                                            <rect x="6" y="0" width="4" height="4" />
                                            <rect x="12" y="0" width="4" height="4" />
                                            <rect x="18" y="0" width="4" height="4" />
                                            <rect x="0" y="6" width="4" height="4" />
                                            <rect x="6" y="6" width="4" height="4" />
                                            <rect x="12" y="6" width="4" height="4" />
                                            <rect x="18" y="6" width="4" height="4" />
                                        </svg>
                                    </a>
                                </div><!-- End .toolbox-layout -->
                            </div><!-- End .toolbox-right -->
                        </div><!-- End .toolbox -->

                        <div class="products mb-3">
                            <div class="row justify-content-center">
                                @foreach($products as $pro)
                                    <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                @if($pro->discount == NULL)
                                                    <span class="product-label label-new">New</span>
                                                @else
                                                    @php
                                                        $amount = $pro->price - $pro->discount;
                                                        $discount_price = $amount/$pro->price*100
                                                    @endphp
                                                    <span class="product-label label-sale">{{ intval($discount_price) }}%</span>
                                                @endif
                                                <a href="{{ url('product/details/'.$pro->id.'/'.$pro->product_name) }}">
                                                    <img src="{{ asset($pro->image_one) }}" alt="Product image" class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <button data-id="{{ $pro->id }}" class="btn-product-icon btn-wishlist btn-expandable addwishlist"><span>add to wishlist</span></button>
                                                </div><!-- End .product-action-vertical -->

                                                <div class="product-action">
                                                    <button id="{{ $pro->id }}" class="btn-product btn-cart addcart" title="Add to cart" data-toggle="modal" data-target="#cartmodal" onclick="productview(this.id)"><span>add to cart</span></button>

                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat">
                                                    <a href="#">Dresses</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a href="">{{ $pro->product_name  }}</a></h3><!-- End .product-title -->

                                                @if($pro->discount == NULL)
                                                    <span class="new-price">${{ $pro->price }}</span>
                                                @else
                                                    <span class="new-price">${{ $pro->discount }}</span>
                                                    <span class="old-price">Was ${{ $pro->price }}</span>
                                                @endif

                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                    </div><!-- End .ratings -->
                                                </div><!-- End .rating-container -->

                                                <div class="product-nav product-nav-thumbs">

                                                </div><!-- End .product-nav -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->

                                @endforeach
                            </div><!-- End .row -->
                        </div><!-- End .products -->


                        <nav aria-label="Page navigation">
                            <div class="pagination justify-content-center">

                                {{ $products->links() }}


                            </div>
                        </nav>
                    </div><!-- End .col-lg-9 -->
                    <aside class="col-lg-3 order-lg-first">
                        <div class="sidebar sidebar-shop">
                            <div class="widget widget-clean">
                                <label>Filters:</label>
                                <a href="#" class="sidebar-filter-clear">Clean All</a>
                            </div><!-- End .widget widget-clean -->

                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                                        Category
                                    </a>
                                </h3><!-- End .widget-title -->
                                @php
                                    $category =  DB::table('categories')->get();
                                @endphp
                                <div class="collapse show" id="widget-1">
                                    <div class="widget-body">
                                        <div class="filter-price">
                                            <div class="filter-price-text">
                                                @foreach($category as $cat)
                                                    <li class="brand"><a href="{{ url('allcategory/'.$cat->id) }}">{{ $cat->category_name }}</a></li>
                                                @endforeach

                                            </div><!-- End .filter-price-text -->

                                            <div id="price-slider"></div><!-- End #price-slider -->
                                        </div><!-- End .filter-price -->
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->



                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true" aria-controls="widget-5">
                                        Brand
                                    </a>
                                </h3><!-- End .widget-title -->

                                @php
                                    $brands =  DB::table('brands')->get();
                                @endphp
                                <div class="collapse show" id="widget-5">
                                    <div class="widget-body">
                                        <div class="filter-price">
                                            <div class="filter-price-text">
                                                @foreach($brands as $row)

                                                    <li class="brand"><a href="#">{{ $row->brand_name }}</a></li>
                                                @endforeach
                                                <span id="filter-price-range"></span>
                                            </div><!-- End .filter-price-text -->

                                            <div id="price-slider"></div><!-- End #price-slider -->
                                        </div><!-- End .filter-price -->
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->
                        </div><!-- End .sidebar sidebar-shop -->
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
