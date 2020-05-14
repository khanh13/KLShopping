@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{asset('client_assets/assets/css/plugins/nouislider/nouislider.css')}}">
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container d-flex align-items-center">

            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <div class="product-details-top">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="product-gallery product-gallery-vertical">
                                <div class="row">
                                    <figure class="product-main-image">
                                        <img id="product-zoom" src="{{ asset( $product->image_one ) }}" data-zoom-image="{{ asset( $product->image_one ) }}" alt="product image">

                                        <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                            <i class="icon-arrows"></i>
                                        </a>
                                    </figure><!-- End .product-main-image -->

                                    <div id="product-zoom-gallery" class="product-image-gallery">
                                        <a class="product-gallery-item active" href="#" data-image="{{ asset( $product->image_one ) }}" data-zoom-image="{{ asset( $product->image_one ) }}">
                                            <img src="{{ asset( $product->image_one ) }}" alt="product side">
                                        </a>

                                        <a class="product-gallery-item" href="#" data-image="{{ asset( $product->image_two ) }}" data-zoom-image="{{ asset( $product->image_two ) }}">
                                            <img src="{{ asset( $product->image_two ) }}" alt="product cross">
                                        </a>

                                        <a class="product-gallery-item" href="#" data-image="assets/images/products/single/3.jpg" data-zoom-image="{{ asset( $product->image_three ) }}">
                                            <img src="{{ asset( $product->image_three ) }}" alt="product with model">
                                        </a>

                                        <a class="product-gallery-item" href="#" data-image="{{ asset( $product->image_four ) }}" data-zoom-image="{{ asset( $product->image_four ) }}">
                                            <img src="{{ asset( $product->image_four ) }}" alt="product back">
                                        </a>
                                    </div><!-- End .product-image-gallery -->
                                </div><!-- End .row -->
                            </div><!-- End .product-gallery -->
                        </div><!-- End .col-md-6 -->
                        <form action="{{ url('cart/product/add/'.$product->id) }}" method="post">
                            @csrf
                        <div class="col-md-6">
                            <div class="product-details">
                                <h1 class="product-title">{{ $product->product_name }}</h1><!-- End .product-title -->

                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                </div><!-- End .rating-container -->

                                @if($product->discount == NULL)
                                    <div class="new-price" style="font-size: xx-large"><span>${{ $product->price }}</span> </div>
                                @else
                                    <div class="new-price" style="font-size: xx-large">${{ $product->discount }}</div><span class="old-price">${{ $product->price }}</span>
                                @endif

                                <div class="product-content">
                                    {!! $product->description !!}
                                </div><!-- End .product-content -->
                                @if($product->color == NULL)

                                @else
                                <div class="details-filter-row details-row-size">
                                    <label>Color:</label>

                                    <div class="select-custom">
                                        <select name="color" id="color" class="form-control" >
                                            @foreach($product_color as $color)
                                                <option value="{{ $color }}">{{ $color }}</option>

                                            @endforeach
                                        </select>
                                    </div><!-- End .product-nav -->

                                </div><!-- End .details-filter-row -->
                                @endif

                                @if($product->size == NULL)

                                @else
                                <div class="details-filter-row details-row-size">
                                    <label for="size">Size:</label>
                                    <div class="select-custom">
                                        <select name="size" id="size" class="form-control" >
                                            @foreach($product_size as $size)
                                            <option value="{{ $size }}">{{ $size }}</option>
                                            @endforeach
                                        </select>
                                    </div><!-- End .select-custom -->

                                </div><!-- End .details-filter-row -->
                                @endif

                                <div class="details-filter-row details-row-size">
                                    <label for="qty">Qty:</label><br>
                                    <div class="product-details-quantity">
                                        <input type="number" id="quantity" name="quantity" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required>
                                    </div><!-- End .product-details-quantity -->
                                </div><!-- End .details-filter-row -->

                                <div class="product-details-action">
                                    <button type="submit" href="#" class="btn-product btn-cart"><span>add to cart</span></button><br>


                                </div><!-- End .product-details-action -->

                                <div class="details-action-wrapper" style="margin-left: 0">

                                    <a href="#" class="btn-product btn-wishlist" title="Wishlist"><span>Add to Wishlist</span></a>
                                </div><!-- End .details-action-wrapper -->

                                <div class="product-details-footer">
                                    <div class="product-cat">
                                        <span>Category:</span>
                                        {{ $product->category_name }} > {{ $product->subcategory_name }}
                                    </div><!-- End .product-cat -->

                                    <div class="social-icons social-icons-sm">



                                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                        <div class="addthis_inline_share_toolbox"></div>


                                    </div>

                                </div><!-- End .product-details-footer -->


                            </div><!-- End .product-details -->
                        </div><!-- End .col-md-6 -->
                        </form>

                    </div><!-- End .row -->
                </div><!-- End .product-details-top -->

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Product Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Video link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Comment</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">{!! $product->detail !!}</div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">{{ $product->video_link }}</div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="fb-comments" data-href="{{ Request::url() }}" data-numposts="5" data-width=""></div>
                    </div>
                </div>


            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
    <script src="{{asset('client_assets/assets/js/jquery.magnific-popup.min.js')}}"></script>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0"></script>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5eaa63181f27df93"></script>



@endsection
