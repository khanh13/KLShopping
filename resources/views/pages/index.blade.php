@extends('layouts.app')

@section('content')
    <style>
        .owl-carousel .owl-item img{


        }


        .banner-title{font-size:3.6rem;font-weight:600;letter-spacing:-.025em;color:#fff;line-height:1em;text-transform:uppercase;text-indent:-.2rem}.banner-price{font-size:1.4rem;font-weight:400;letter-spacing:-.01em;text-transform:uppercase;color:#fff;margin-bottom:1.8rem}.banner-price .price{color:#fcb842;margin-left:.4rem}.banner-price .off{font-size:2.4rem;font-weight:700;letter-spacing:-.025em}.banner-price.color-black{font-size:2.8rem;font-weight:300;letter-spacing:-.025em;color:#333}.banner-txt{margin-top:.3rem;font-size:2.4rem;letter-spacing:-.025em;font-weight:300;color:#e7e7e7}a.banner-link{font-size:1.4rem;letter-spacing:-.01em;color:#333;background-color:#fcb842;text-transform:uppercase;padding:.1rem 2rem;border-radius:5px;transition:all .3s;font-weight:600}a.banner-link i{font-size:1.5rem;margin-left:.5rem}a.banner-link.size-lg{padding:.75rem 2rem}a.banner-link:hover,a.banner-link:focus{text-decoration:none;color:#333;background-color:#fff}.banner.banner-lg.align-center .banner-content,.banner.banner-sm.align-center .banner-content{top:50%;transform:translateY(-50%);bottom:unset}.banner-lg.content-left .banner-content{top:60%;padding-left:.2rem}.banner-lg.content-right{overflow:hidden}.banner-lg.content-right .banner-content{top:55%;left:unset;right:2rem}.banner-lg.content-right .banner-content .banner-subtitle{margin-right:6.5rem}.banner-lg.content-right a img{min-height:160px;object-fit:cover}.banner-lg.content-right .banner-title-img{margin-top:-2.6rem;margin-bottom:-2rem;padding-right:.4rem}.banner-sm .banner-content{display:flex;flex-direction:column}.banner-sm.content-left .banner-content{left:2rem;top:5rem;transform:translateY(0);align-items:flex-start}.banner-sm.content-right .banner-content{right:2rem;bottom:2rem;top:unset;transform:translateY(0);align-items:flex-end}.banner-sm .banner-link i{margin-left:.8rem}.banner-sm.banner-ad.content-left .banner-content{left:3rem}.banner-sm.banner-ad.content-left .banner-content .banner-subtitle{font-weight:300}.banner-sm.banner-ad.content-right .banner-content{padding-top:2rem;right:3rem}.banner-sm.banner-ad>a img{min-height:220px;object-fit:cover}.banner-sm.banner-ad .banner-title-img{margin:0}.product-banner{overflow:hidden}.product-banner .banner-content{left:3rem;bottom:5rem;top:unset;transform:translateY(0);display:flex;flex-direction:column;align-items:flex-start}.product-banner .banner-content.center{left:50%;transform:translateX(-50%)}.product-banner .banner-subtitle{margin-bottom:1rem;font-weight:300;letter-spacing:-.025rem}.product-banner .banner-price{font-size:3.6rem;font-weight:300;letter-spacing:-.025rem;color:#fcb842;margin-top:.5rem}.product-banner .banner-txt{font-size:2rem;font-weight:300;letter-spacing:-.025rem;color:#fcb842;margin-top:4.5rem}img.banner-title-img,.owl-carousel .owl-item img.banner-title-img{width:auto;margin-top:.5rem;margin-bottom:.3rem}@media screen and (min-width: 992px){.games-soon .col-lg-5{flex:0 0 40%;max-width:40%}.games-soon .col-lg-7{flex:0 0 60%;max-width:60%}}.games-banners-slider{max-width:456px;margin-left:auto;margin-right:auto;margin-bottom:0;margin-top:1.5rem}@media screen and (min-width: 992px){.games-banners-slider{margin-top:0}}.games-banners-slider .banner{margin-bottom:1.5rem}.cta-horizontal-box{padding:3.7rem 3rem}

    </style>
    @php
        $mainslider = DB::table('products')
                           ->join('brands','products.brand_id','brands.id')
                           ->select('products.*','brands.brand_name')
                           ->where('main_slider',1)->where('products.status',1)->orderBy('id','DESC')->limit(3)
            ->get();;

        $new_releases = DB::table('products')->where('status',1)->where('new_releases',1)->orderBy('id','asc')->limit(12)->get();
        $now_trending = DB::table('products')->where('status',1)->where('now_trending',1)->orderBy('id','desc')->limit(8)->get();
        $best_rated = DB::table('products')->where('status',1)->where('best_rated',1)->orderBy('id','desc')->limit(8)->get();
        $coming_soon = DB::table('products')->where('status',1)->where('coming_soon',1)->orderBy('id','desc')->limit(8)->get();
        $hot = DB::table('products')
                    ->join('brands','products.brand_id','brands.id')
                    ->select('products.*','brands.brand_name')
                    ->where('products.status',1)->where('hot_deal',1)->orderBy('id','desc')->limit(6)
                    ->get();
    @endphp
    <main class="main">
        <div class="intro-slider-container">
            <div class="intro-slider owl-carousel owl-simple owl-nav-inside" data-toggle="owl" data-owl-options='{
                        "nav": false,
                        "responsive": {
                            "992": {
                                "nav": true
                            }
                        }
                    }'>
                @foreach($mainslider as $row)
                <div class="intro-slide" style="background-image: url('{{ asset($row->image_one) }}');">
                    <div class="container intro-content">
                        <div class="row">
                            <div class="col-auto offset-lg-3 intro-col">
                                <h3 class="intro-subtitle">Trade-In Offer</h3><!-- End .h3 intro-subtitle -->
                                <h1 class="intro-title">{{ $row->product_name }}<br>Latest Model
                                    <span>
                                        @if($row->discount == NULL)
                                            <span class="text-primary"> ${{ $row->price }}</span>
                                        @else
                                            <sup class="font-weight-light">Was ${{ $row->price }} </sup>
                                            <span class="text-primary"> Now ${{ $row->discount }}</span>
                                            @endif
                                        </span>
                                </h1><!-- End .intro-title -->

                                <a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}" class="btn btn-outline-primary-2">
                                    <span>Shop Now</span>
                                    <i class="icon-long-arrow-right"></i>
                                </a>
                            </div><!-- End .col-auto offset-lg-3 -->
                        </div><!-- End .row -->
                    </div><!-- End .container intro-content -->
                </div><!-- End .intro-slide -->

                @endforeach

            </div><!-- End .owl-carousel owl-simple -->

            <span class="slider-loader"></span><!-- End .slider-loader -->
        </div><!-- End .intro-slider-container -->

        <div class="mb-4"></div><!-- End .mb-2 -->

        <div class="container">
            <div class="heading heading-flex mb-2 mb-lg-3">
                <div class="heading-left">
                    <h2 class="title mb-0">Hot Deal of the Week</h2><!-- End .title -->
                </div><!-- End .heading-left -->

                <div class="heading-right">
                </div><!-- End .heading-right -->
            </div><!-- End .heading -->

            <div class="games-soon">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="products">
                            <div class="row">
                                @foreach($hot as $h)
                                    <div class="col-6 col-md-4">
                                        <div class="product">
                                            <figure class="product-media">
                                                @if($h->discount == NULL)
                                                    <span class="product-label label-top">Top</span>
                                                @else
                                                    @php
                                                        $amount = $h->price - $h->discount;
                                                        $discount_price = $amount/$h->price*100
                                                    @endphp
                                                    <span class="product-label label-sale">{{ intval($discount_price) }}%</span>
                                                @endif
                                                <a href="{{ url('product/details/'.$h->id.'/'.$h->product_name) }}">
                                                    <img src="{{ asset($h->image_one) }}" alt="Product image" class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <button data-id="{{ $h->id }}" class="btn-product-icon btn-wishlist btn-expandable addwishlist"><span>add to wishlist</span></button>
                                                </div><!-- End .product-action-vertical -->

                                                <div class="product-action">
                                                    <button id="{{ $h->id }}" class="btn-product btn-cart addcart" title="Add to cart" data-toggle="modal" data-target="#cartmodal" onclick="productview(this.id)"><span>add to cart</span></button>

                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat">
                                                    <a href="#"></a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a href="product.html">{{ $h->product_name }}</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    @if($h->discount == NULL)
                                                        <span class="new-price">${{ $h->price }}</span>
                                                    @else
                                                        <span class="new-price">${{ $h->discount }}</span>
                                                        <span class="old-price">Was ${{ $h->price }}</span>
                                                    @endif

                                                </div><!-- End .product-price -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-md-4 -->

                                @endforeach
                            </div><!-- End .row -->
                        </div><!-- End .products -->
                    </div><!-- End .col-lg-7 -->

                    <div class="col-lg-5 order-lg-first">
                        <div class="games-banners-slider owl-carousel owl-simple" data-toggle="owl"
                             data-owl-options='{
                                    "nav": false,
                                    "dots": true,
                                    "margin": 0,
                                    "loop": false,
                                    "items":1
                                }'>

                            @foreach($hot as $row)
                                <div class="banner banner-overlay product-banner">
                                    <a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}">
                                        <img src=" {{asset( $row->image_one )}}" alt="Banner">
                                    </a>
                                    <div class="banner-content align-items-center center" style="bottom: 2%">
                                        <div class="product-cat">

                                            <h1 style="color: #ff5151">{{ $row->product_name }}</h1>
                                        </div>
                                        @if($row->discount == NULL)
                                            <h5 class="banner-price mb-2" style="font-weight: 600;">${{ $row->price }}</h5>
                                        @else
                                            <h5 class="banner-price mb-2" style="font-weight: 600;">${{ $row->discount }}</h5>
                                        @endif
                                        <button data-id="{{ $row->id }}" class="btn-product-icon btn-wishlist btn-expandable addwishlist"><span>add to wishlist</span></button>
                                        <br>
                                        <button id="{{ $row->id }}" class="btn-product btn-cart addcart" title="Add to cart" data-toggle="modal" data-target="#cartmodal" onclick="productview(this.id)"><span>add to cart</span></button>

                                    </div>

                                </div><!-- End .banner -->

                            @endforeach


                        </div><!-- End .owl-carousel -->
                    </div><!-- End .col-lg-5 -->
                </div><!-- End .row -->
            </div><!-- End .games-soon -->
        </div><!-- End .container -->

        <div class="mb-2"></div><!-- End .mb-2 -->

        @php
            $midSlide = DB::table('products')
                   ->join('categories','products.category_id','categories.id')
                   ->join('brands','products.brand_id','brands.id')
                   ->select('products.*','brands.brand_name','categories.category_name')
                   ->where('products.mid_slider',1)->where('status',1)->orderBy('id','DESC')->limit(2)
                   ->get();
        @endphp

        <div class="container">
            <div class="row">
@foreach($midSlide as $row)
                <div class="col-lg-6">
                    <div class="banner banner-overlay">
                        <a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}">
                            <img src="{{ asset( $row->image_one )}}" alt="Banner">
                        </a>

                        <div class="banner-content">
                            <h4 class="banner-subtitle text-white d-none d-sm-block"><a href="#">{{ $row->category_name }}</a></h4><!-- End .banner-subtitle -->
                            <h3 class="banner-title text-white"><a href="#">{{ $row->product_name }}
                                    @if($row->discount == NULL)
                                        <span>from ${{ $row->price }}</span>
                                    @else
                                        <span>from ${{ $row->discount }}</span>
                                    @endif


                                </a></h3><!-- End .banner-title -->
                            <a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}" class="banner-link">Discover Now <i class="icon-long-arrow-right"></i></a>
                        </div><!-- End .banner-content -->
                    </div><!-- End .banner -->
                </div><!-- End .col-lg-6 -->
                @endforeach
            </div><!-- End .row -->
        </div><!-- End .container -->

        <div class="mb-3"></div><!-- End .mb-3 -->

        <div class="bg-light pt-3 pb-5">
            <div class="container">
                <div class="heading heading-flex heading-border mb-3">
                    <div class="heading-left">
                        <h2 class="title">Our best Products</h2><!-- End .title -->
                    </div><!-- End .heading-left -->

                    <div class="heading-right">
                        <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="hot-all-link" data-toggle="tab" href="#hot-all-tab" role="tab" aria-controls="hot-all-tab" aria-selected="true">New Releases</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="hot-elec-link" data-toggle="tab" href="#hot-elec-tab" role="tab" aria-controls="hot-elec-tab" aria-selected="false">Now Trending</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="hot-furn-link" data-toggle="tab" href="#hot-furn-tab" role="tab" aria-controls="hot-furn-tab" aria-selected="false">Best rated</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="hot-clot-link" data-toggle="tab" href="#hot-clot-tab" role="tab" aria-controls="hot-clot-tab" aria-selected="false">Coming Soon</a>
                            </li>
                        </ul>
                    </div><!-- End .heading-right -->
                </div><!-- End .heading -->

                <div class="tab-content tab-content-carousel">
                    <div class="tab-pane p-0 fade show active" id="hot-all-tab" role="tabpanel" aria-labelledby="hot-all-link">
                        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                             data-owl-options='{
                                    "nav": false,
                                    "dots": true,
                                    "margin": 20,
                                    "loop": false,
                                    "responsive": {
                                        "0": {
                                            "items":2
                                        },
                                        "480": {
                                            "items":2
                                        },
                                        "768": {
                                            "items":3
                                        },
                                        "992": {
                                            "items":4
                                        },
                                        "1280": {
                                            "items":5,
                                            "nav": true
                                        }
                                    }
                                }'>

                            @foreach($new_releases as $row)
                            <div class="product">
                                <figure class="product-media">
                                    @if($row->discount == NULL)
                                        <span class="product-label label-top">Top</span>
                                    @else
                                        @php
                                        $amount = $row->price - $row->discount;
                                        $discount_price = $amount/$row->price*100
                                        @endphp
                                        <span class="product-label label-sale">{{ intval($discount_price) }}%</span>
                                    @endif
                                    <a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}">
                                        <img src="{{ asset($row->image_one)}}" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <button data-id="{{ $row->id }}" class="btn-product-icon btn-wishlist btn-expandable addwishlist"><span>add to wishlist</span></button>

                                    </div><!-- End .product-action-vertical -->

                                    <div class="product-action">

                                        <button id="{{ $row->id }}" class="btn-product btn-cart addcart" title="Add to cart" data-toggle="modal" data-target="#cartmodal" onclick="productview(this.id)"><span>add to cart</span></button>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="">{{ $row->product_name }}</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        @if($row->discount == NULL)
                                            <span class="new-price">${{ $row->price }}</span>
                                        @else
                                            <span class="new-price">${{ $row->discount }}</span>
                                            <span class="old-price">Was ${{ $row->price }}</span>
                                        @endif
                                    </div><!-- End .product-price -->
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->

                                    </div><!-- End .rating-container -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                            @endforeach

                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->


                    <div class="tab-pane p-0 fade" id="hot-elec-tab" role="tabpanel" aria-labelledby="hot-elec-link">
                        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                             data-owl-options='{
                                    "nav": false,
                                    "dots": true,
                                    "margin": 20,
                                    "loop": false,
                                    "responsive": {
                                        "0": {
                                            "items":2
                                        },
                                        "480": {
                                            "items":2
                                        },
                                        "768": {
                                            "items":3
                                        },
                                        "992": {
                                            "items":4
                                        },
                                        "1280": {
                                            "items":5,
                                            "nav": true
                                        }
                                    }
                                }'>

                            @foreach($now_trending as $row)
                                <div class="product">
                                    <figure class="product-media">
                                        @if($row->discount == NULL)
                                            <span class="product-label label-top">Top</span>
                                        @else
                                            @php
                                                $amount = $row->price - $row->discount;
                                                $discount_price = $amount/$row->price*100
                                            @endphp
                                            <span class="product-label label-sale">{{ intval($discount_price) }}%</span>
                                        @endif
                                        <a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}">
                                            <img src="{{ asset($row->image_one)}}" alt="Product image" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <button data-id="{{ $row->id }}" class="btn-product-icon btn-wishlist btn-expandable addwishlist"><span>add to wishlist</span></button>

                                        </div><!-- End .product-action-vertical -->

                                        <div class="product-action">
                                            <button id="{{ $row->id }}" class="btn-product btn-cart addcart" title="Add to cart" data-toggle="modal" data-target="#cartmodal" onclick="productview(this.id)"><span>add to cart</span></button>

                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="">{{ $row->product_name }}</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            @if($row->discount == NULL)
                                                <span class="new-price">${{ $row->price }}</span>
                                            @else
                                                <span class="new-price">${{ $row->discount }}</span>
                                                <span class="old-price">Was ${{ $row->price }}</span>
                                            @endif
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->

                                        </div><!-- End .rating-container -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            @endforeach

                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->


                    <div class="tab-pane p-0 fade" id="hot-furn-tab" role="tabpanel" aria-labelledby="hot-furn-link">
                        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                             data-owl-options='{
                                    "nav": false,
                                    "dots": true,
                                    "margin": 20,
                                    "loop": false,
                                    "responsive": {
                                        "0": {
                                            "items":2
                                        },
                                        "480": {
                                            "items":2
                                        },
                                        "768": {
                                            "items":3
                                        },
                                        "992": {
                                            "items":4
                                        },
                                        "1280": {
                                            "items":5,
                                            "nav": true
                                        }
                                    }
                                }'>

                            @foreach($best_rated as $row)
                                <div class="product">
                                    <figure class="product-media">
                                        @if($row->discount == NULL)
                                            <span class="product-label label-top">Top</span>
                                        @else
                                            @php
                                                $amount = $row->price - $row->discount;
                                                $discount_price = $amount/$row->price*100
                                            @endphp
                                            <span class="product-label label-sale">{{ intval($discount_price) }}%</span>
                                        @endif
                                        <a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}">
                                            <img src="{{ asset($row->image_one)}}" alt="Product image" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <button data-id="{{ $row->id }}" class="btn-product-icon btn-wishlist btn-expandable addwishlist"><span>add to wishlist</span></button>

                                        </div><!-- End .product-action-vertical -->

                                        <div class="product-action">
                                            <button id="{{ $row->id }}" class="btn-product btn-cart addcart" title="Add to cart" data-toggle="modal" data-target="#cartmodal" onclick="productview(this.id)"><span>add to cart</span></button>

                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="">{{ $row->product_name }}</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            @if($row->discount == NULL)
                                                <span class="new-price">${{ $row->price }}</span>
                                            @else
                                                <span class="new-price">${{ $row->discount }}</span>
                                                <span class="old-price">Was ${{ $row->price }}</span>
                                            @endif
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->

                                        </div><!-- End .rating-container -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            @endforeach

                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->

                    <div class="tab-pane p-0 fade" id="hot-clot-tab" role="tabpanel" aria-labelledby="hot-clot-link">
                        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                             data-owl-options='{
                                    "nav": false,
                                    "dots": true,
                                    "margin": 20,
                                    "loop": false,
                                    "responsive": {
                                        "0": {
                                            "items":2
                                        },
                                        "480": {
                                            "items":2
                                        },
                                        "768": {
                                            "items":3
                                        },
                                        "992": {
                                            "items":4
                                        },
                                        "1280": {
                                            "items":5,
                                            "nav": true
                                        }
                                    }
                                }'>
                            @foreach($coming_soon as $row)
                                <div class="product">
                                    <figure class="product-media">
                                        @if($row->discount == NULL)
                                            <span class="product-label label-top">Top</span>
                                        @else
                                            @php
                                                $amount = $row->price - $row->discount;
                                                $discount_price = $amount/$row->price*100
                                            @endphp
                                            <span class="product-label label-sale">{{ intval($discount_price) }}%</span>
                                        @endif
                                        <a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}">
                                            <img src="{{ asset($row->image_one)}}" alt="Product image" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <button data-id="{{ $row->id }}" class="btn-product-icon btn-wishlist btn-expandable addwishlist"><span>add to wishlist</span></button>

                                        </div><!-- End .product-action-vertical -->

                                        <div class="product-action">
                                            <button id="{{ $row->id }}" class="btn-product btn-cart addcart" title="Add to cart" data-toggle="modal" data-target="#cartmodal" onclick="productview(this.id)"><span>add to cart</span></button>

                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="">{{ $row->product_name }}</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            @if($row->discount == NULL)
                                                <span class="new-price">${{ $row->price }}</span>
                                            @else
                                                <span class="new-price">${{ $row->discount }}</span>
                                                <span class="old-price">Was ${{ $row->price }}</span>
                                            @endif
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->

                                        </div><!-- End .rating-container -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            @endforeach


                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->

                </div><!-- End .tab-content -->
            </div><!-- End .container -->
        </div><!-- End .bg-light pt-5 pb-5 -->




        <div class="mb-3"></div><!-- End .mb-3 -->


        @php
            $categories = DB::table('categories')->first();
            $cattegory_id = $categories->id;
            $product = DB::table('products')->where('category_id', $cattegory_id)->where('status',1)->limit(10)->orderBy('id','DESC')->get();
        @endphp
        <div class="container clothing ">
            <div class="heading heading-flex heading-border mb-3">
                <div class="heading-left">
                    <h2 class="title">{{ $categories->category_name }}</h2><!-- End .title -->
                </div><!-- End .heading-left -->
            </div><!-- End .heading -->

            <div class="tab-content tab-content-carousel">
                <div class="tab-pane p-0 fade show active" id="clot-new-tab" role="tabpanel" aria-labelledby="clot-new-link">
                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                         data-owl-options='{
                                "nav": false,
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1280": {
                                        "items":5,
                                        "nav": true
                                    }
                                }
                            }'>
                        @foreach($product as $row)
                            <div class="product">
                                <figure class="product-media">
                                    @if($row->discount == NULL)
                                        <span class="product-label label-new">New</span>
                                    @else
                                        @php
                                            $amount = $row->price - $row->discount;
                                            $discount_price = $amount/$row->price*100
                                        @endphp
                                        <span class="product-label label-sale">{{ intval($discount_price) }}%</span>
                                    @endif
                                    <a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}">
                                        <img src="{{ asset( $row->image_one )}}" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <button data-id="{{ $row->id }}" class="btn-product-icon btn-wishlist btn-expandable addwishlist"><span>add to wishlist</span></button>

                                    </div><!-- End .product-action-vertical -->

                                    <div class="product-action">
                                        <button id="{{ $row->id }}" class="btn-product btn-cart addcart" title="Add to cart" data-toggle="modal" data-target="#cartmodal" onclick="productview(this.id)"><span>add to cart</span></button>

                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">{{ $categories->category_name }}</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="">{{ $row->product_name }}</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        @if($row->discount == NULL)
                                            <span class="new-price">${{ $row->price }}</span>
                                        @else
                                            <span class="new-price">${{ $row->discount }}</span>
                                            <span class="old-price">Was ${{ $row->price }}</span>
                                        @endif
                                    </div><!-- End .product-price -->
                                    <div class="ratings-container">
                                        <div class="ratings">

                                        </div><!-- End .ratings -->

                                    </div><!-- End .rating-container -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                        @endforeach
                    </div><!-- End .owl-carousel -->
                </div><!-- .End .tab-pane -->
            </div><!-- End .tab-content -->
        </div><!-- End .container -->

        <div class="mb-3"></div><!-- End .mb-3 -->


        <div class="mb-1"></div><!-- End .mb-1 -->

        @php
            $categories = DB::table('categories')->skip(1)->first();
            $cattegory_id = $categories->id;
            $product = DB::table('products')->where('category_id', $cattegory_id)->where('status',1)->limit(10)->orderBy('id','DESC')->get();
        @endphp
        <div class="container furniture">
            <div class="heading heading-flex heading-border mb-3">
                <div class="heading-left">
                    <h2 class="title">{{ $categories->category_name }}</h2><!-- End .title -->
                </div><!-- End .heading-left -->
            </div><!-- End .heading -->

            <div class="tab-content tab-content-carousel">
                <div class="tab-pane p-0 fade show active" id="furn-new-tab" role="tabpanel" aria-labelledby="furn-new-link">
                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                         data-owl-options='{
                                "nav": false,
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1280": {
                                        "items":5,
                                        "nav": true
                                    }
                                }
                            }'>
                        @foreach($product as $row)
                            <div class="product">
                                <figure class="product-media">
                                    @if($row->discount == NULL)
                                        <span class="product-label label-new">New</span>
                                    @else
                                        @php
                                            $amount = $row->price - $row->discount;
                                            $discount_price = $amount/$row->price*100
                                        @endphp
                                        <span class="product-label label-sale">{{ intval($discount_price) }}%</span>
                                    @endif
                                    <a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}">
                                        <img src="{{ asset( $row->image_one )}}" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <button data-id="{{ $row->id }}" class="btn-product-icon btn-wishlist btn-expandable addwishlist"><span>add to wishlist</span></button>
                                    </div><!-- End .product-action-vertical -->

                                    <div class="product-action">
                                        <button id="{{ $row->id }}" class="btn-product btn-cart addcart" title="Add to cart" data-toggle="modal" data-target="#cartmodal" onclick="productview(this.id)"><span>add to cart</span></button>

                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">{{ $categories->category_name }}</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="">{{ $row->product_name }}</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        @if($row->discount == NULL)
                                            <span class="new-price">${{ $row->price }}</span>
                                        @else
                                            <span class="new-price">${{ $row->discount }}</span>
                                            <span class="old-price">Was ${{ $row->price }}</span>
                                        @endif
                                    </div><!-- End .product-price -->
                                    <div class="ratings-container">
                                        <div class="ratings">

                                        </div><!-- End .ratings -->

                                    </div><!-- End .rating-container -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                        @endforeach
                    </div><!-- End .owl-carousel -->
                </div><!-- .End .tab-pane -->

            </div><!-- End .tab-content -->
        </div><!-- End .container -->

        <div class="mb-3"></div><!-- End .mb-3 -->

        @php
            $categories = DB::table('categories')->skip(2)->first();
            $cattegory_id = $categories->id;
            $product = DB::table('products')->where('category_id', $cattegory_id)->where('status',1)->limit(10)->orderBy('id','DESC')->get();
        @endphp
        <div class="container clothing ">
            <div class="heading heading-flex heading-border mb-3">
                <div class="heading-left">
                    <h2 class="title">{{ $categories->category_name }}</h2><!-- End .title -->
                </div><!-- End .heading-left -->
            </div><!-- End .heading -->

            <div class="tab-content tab-content-carousel">
                <div class="tab-pane p-0 fade show active" id="clot-new-tab" role="tabpanel" aria-labelledby="clot-new-link">
                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                         data-owl-options='{
                                "nav": false,
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1280": {
                                        "items":5,
                                        "nav": true
                                    }
                                }
                            }'>
                        @foreach($product as $row)
                            <div class="product">
                                <figure class="product-media">
                                    @if($row->discount == NULL)
                                        <span class="product-label label-new">New</span>
                                    @else
                                        @php
                                            $amount = $row->price - $row->discount;
                                            $discount_price = $amount/$row->price*100
                                        @endphp
                                        <span class="product-label label-sale">{{ intval($discount_price) }}%</span>
                                    @endif
                                    <a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}">
                                        <img src="{{ asset( $row->image_one )}}" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <button data-id="{{ $row->id }}" class="btn-product-icon btn-wishlist btn-expandable addwishlist"><span>add to wishlist</span></button>

                                    </div><!-- End .product-action-vertical -->

                                    <div class="product-action">
                                        <button id="{{ $row->id }}" class="btn-product btn-cart addcart" title="Add to cart" data-toggle="modal" data-target="#cartmodal" onclick="productview(this.id)"><span>add to cart</span></button>

                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">{{ $categories->category_name }}</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="">{{ $row->product_name }}</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        @if($row->discount == NULL)
                                            <span class="new-price">${{ $row->price }}</span>
                                        @else
                                            <span class="new-price">${{ $row->discount }}</span>
                                            <span class="old-price">Was ${{ $row->price }}</span>
                                        @endif
                                    </div><!-- End .product-price -->
                                    <div class="ratings-container">
                                        <div class="ratings">

                                        </div><!-- End .ratings -->

                                    </div><!-- End .rating-container -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                        @endforeach
                    </div><!-- End .owl-carousel -->
                </div><!-- .End .tab-pane -->
            </div><!-- End .tab-content -->
        </div><!-- End .container -->

        <div class="mb-3"></div><!-- End .mb-3 -->
        @php
            $brand = DB::table('brands')->get();
        @endphp
        <div class="container">
            <h2 class="title title-border mb-5">Our Brands</h2><!-- End .title -->
            <div class="owl-carousel mb-5 owl-simple" data-toggle="owl"
                 data-owl-options='{
                        "nav": false,
                        "dots": true,
                        "margin": 30,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "420": {
                                "items":3
                            },
                            "600": {
                                "items":4
                            },
                            "900": {
                                "items":5
                            },
                            "1024": {
                                "items":6
                            },
                            "1280": {
                                "items":6,
                                "nav": true,
                                "dots": false
                            }
                        }
                    }'>

                @foreach($brand as $row)
                <a href="#" class="brand">
                    <img src="{{ asset('storage/'.$row->image) }}" alt="Brand Name">
                </a>
                @endforeach

            </div><!-- End .owl-carousel -->
        </div><!-- End .container -->

        <div class="cta cta-horizontal cta-horizontal-box bg-primary">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-2xl-5col">
                        <h3 class="cta-title text-white">Join Our Newsletter</h3><!-- End .cta-title -->
                        <p class="cta-desc text-white">Subcribe to get information about products and coupons</p><!-- End .cta-desc -->
                    </div><!-- End .col-lg-5 -->
                    <div class="col-3xl-5col">
                        <form action="{{ route('subscribers.store') }}" method="POST">
                            @csrf
                            <div class="input-group">
                                <input type="email" name="email" class="form-control form-control-white" placeholder="Enter your Email Address" aria-label="Email Adress" required>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-white-2" type="submit"><span>Subscribe</span><i class="icon-long-arrow-right"></i></button>
                                </div><!-- .End .input-group-append -->
                            </div><!-- .End .input-group -->
                        </form>
                    </div><!-- End .col-lg-7 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .cta -->

        @php
            $blog = DB::table('blogs')
               ->join('blogcategories','blogs.category_id','blogcategories.id')
               ->select('blogs.*','blogcategories.category_name_en','blogcategories.category_name_vi')
               ->get();
    @endphp

        <div class="blog-posts bg-light pt-4 pb-7">
            <div class="container">
                <h2 class="title">From Our Blog</h2><!-- End .title-lg text-center -->

                <div class="owl-carousel owl-simple" data-toggle="owl"
                     data-owl-options='{
                            "nav": false,
                            "dots": true,
                            "items": 3,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "600": {
                                    "items":2
                                },
                                "992": {
                                    "items":3
                                },
                                "1280": {
                                    "items":4,
                                    "nav": true,
                                    "dots": false
                                }
                            }
                        }'>

                    @foreach($blog as $row)
                    <article class="entry">
                        <figure class="entry-media">
                            <a href="{{ url('blog/single/'.$row->id) }}">
                                <img src="{{ asset($row->image) }}" alt="image desc">
                            </a>
                        </figure><!-- End .entry-media -->

                        <div class="entry-body">
                            <div class="entry-meta">

                            </div><!-- End .entry-meta -->

                            <h3 class="entry-title">
                                <a href="single.html">
                                    @if(Session()->get('lang') == 'vietnam')
                                        <a href="{{ url('blog/single/'.$row->id) }}"> {{ $row->title_vi }}</a>

                                    @else
                                        <a href="{{ url('blog/single/'.$row->id) }}">{{ $row->title_en }}</a>

                                    @endif
                                </a>
                            </h3><!-- End .entry-title -->

                            <div class="entry-content">
                                <a href="{{ url('blog/single/'.$row->id) }}" class="read-more">Read More</a>
                            </div><!-- End .entry-content -->
                        </div><!-- End .entry-body -->
                    </article><!-- End .entry -->

                    @endforeach
                </div><!-- End .owl-carousel -->
            </div><!-- End .container -->
        </div><!-- End .blog-posts -->
    </main><!-- End .main -->
    <!-- Modal -->
    <div class="modal fade" id="cartmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLavel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLavel">Product Quick View</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4 ml-3">
                            <div class="card">
                                <img src="" id="pimage" style="height: 220px; width: 200px;">
                                <div class="card-body">
                                    <h5 class="card-title text-center" id="pname">  </h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <ul class="list-group">
                                <li class="list-group-item">Product Code:<span id="pcode"></span> </li>
                                <li class="list-group-item">Category: <span id="pcat"></span></li>
                                <li class="list-group-item">Subcategory: <span id="psub"></span></li>
                                <li class="list-group-item">Brand:<span id="pbrand"></span> </li>
                                <li class="list-group-item">Stock: <span class="badge" style="background: green;color: white;" > Available</span> </li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <form method="post" action="{{ route('insert.into.cart') }}">
                                @csrf
                                <input type="hidden" name="product_id" id="product_id">
                                <div class="form-group">
                                    <label for="exampleInputcolor">Color</label>
                                    <select name="color" class="form-control" id="color">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputcolor">Size</label>
                                    <select name="size" class="form-control" id="size">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputcolor">Quantity</label>
                                    <input type="number" class="form-control" name="qty" value="1">
                                </div>
                                <button type="submit" class="btn-product btn-cart addcart">Add to Cart </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <!-- Large modal -->

    <script type="text/javascript">
        function productview(id){
            $.ajax({
                url: "{{ url('/cart/product/view/') }}/"+id,
                type: "GET",
                dataType:"json",
                success:function(data){
                    $('#pcode').text(data.product.product_code);
                    $('#pcat').text(data.product.category_name);
                    $('#psub').text(data.product.subcategory_name);
                    $('#pbrand').text(data.product.brand_name);
                    $('#pname').text(data.product.product_name);
                    $('#pimage').attr('src',data.product.image_one);
                    $('#product_id').val(data.product.id);

                    var d = $('select[name="color"]').empty();
                    $.each(data.color,function(key,value){
                        $('select[name="color"]').append('<option value="'+value+'">'+value+'</option>');
                    });

                    var d = $('select[name="size"]').empty();
                    $.each(data.size,function(key,value){
                        $('select[name="size"]').append('<option value="'+value+'">'+value+'</option>');
                    });


                }
            })
        }


    </script>

    <!-- Modal -->



    <script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
    <script type="text/javascript">

        $(document).ready(function(){
            $('.addwishlist').on('click', function(){
                var id = $(this).data('id');
                if (id) {
                    $.ajax({
                        url: " {{ url('add/wishlist/') }}/"+id,
                        type:"GET",
                        datType:"json",
                        success:function(data){
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                onOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                }
                            })

                            if ($.isEmptyObject(data.error)) {
                                Toast.fire({
                                    icon: 'success',
                                    title: data.success
                                })
                            }else{
                                Toast.fire({
                                    icon: 'error',
                                    title: data.error
                                })
                            }
                        },
                    });
                }else{
                    alert('danger');
                }
            });
        });
    </script>

@endsection
