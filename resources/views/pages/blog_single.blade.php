@extends('layouts.app')

@section('content')
    @foreach($blogs as $row)
        <style>
            .owl-carousel.owl-drag .owl-item{

            }
        </style>
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Blog</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Fullwidth With Sidebar</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <figure class="entry-media">
                    <div class="owl-carousel owl-simple owl-light owl-nav-inside" data-toggle="owl">
                        <img style="max-height: 400px; "src="{{asset($row->image)}}" alt="image desc">

                    </div><!-- End .owl-carousel -->
                </figure><!-- End .entry-media -->
                <div class="row">
                    <div class="col-lg-9">
                        <article class="entry single-entry">
                            <div class="entry-body">
                                <div class="entry-meta">

                                </div><!-- End .entry-meta -->
                                <h2 class="entry-title entry-title-big">
                                @if(Session()->get('lang') == 'vietnam')
                                    {{ $row->title_vi }}

                                @else
                                    {{ $row->title_en }}

                                @endif
                                    </h2>
{{--                                <h2 class="entry-title entry-title-big">--}}
{{--                                    @if(Session()->get('lang') == 'vietnam')--}}
{{--                                        {{ $row->title_in }}--}}
{{--                                    @else--}}
{{--                                        {{ $row->title_en }}--}}
{{--                                    @endif--}}
{{--                                </h2><!-- End .entry-title -->--}}

                                <div class="entry-cats">
                                    in <a href="#">Fashion</a>,
                                    <a href="#">Shopping</a>
                                </div><!-- End .entry-cats -->

                                <div class="entry-content editor-content">
                                    <p>@if(Session()->get('lang') == 'vietnam')
                                            {!! $row->details_vi !!}
                                        @else
                                            {!! $row->details_en !!}
                                        @endif</p>
                                </div><!-- End .entry-content -->

                                <div class="entry-footer row no-gutters flex-column flex-md-row">
                                    <div class="col-md">
                                        <div class="entry-tags">
                                            <span>Tags:</span> <a href="#">photography</a> <a href="#">style</a>
                                        </div><!-- End .entry-tags -->
                                    </div><!-- End .col -->

                                    <div class="col-md-auto mt-2 mt-md-0">
                                        <div class="social-icons social-icons-color">
                                            <span class="social-label">Share this post:</span>
                                            <a href="#" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                            <a href="#" class="social-icon social-twitter" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                            <a href="#" class="social-icon social-pinterest" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                            <a href="#" class="social-icon social-linkedin" title="Linkedin" target="_blank"><i class="icon-linkedin"></i></a>
                                        </div><!-- End .soial-icons -->
                                    </div><!-- End .col-auto -->
                                </div><!-- End .entry-footer row no-gutters -->
                            </div><!-- End .entry-body -->


                        </article><!-- End .entry -->


                        <div class="comments">
                            <div class="fb-comments" data-href="{{ Request::url() }}" data-numposts="5" data-width=""></div>
                        </div><!-- End .comments -->
                    </div><!-- End .col-lg-9 -->

                    <aside class="col-lg-3">
                        <div class="sidebar">
                            <div class="widget widget-search">
                                <h3 class="widget-title">Search</h3><!-- End .widget-title -->

                                <form action="#">
                                    <label for="ws" class="sr-only">Search in blog</label>
                                    <input type="search" class="form-control" name="ws" id="ws" placeholder="Search in blog" required>
                                    <button type="submit" class="btn"><i class="icon-search"></i><span class="sr-only">Search</span></button>
                                </form>
                            </div><!-- End .widget -->

                            <div class="widget widget-cats">
                                <h3 class="widget-title">Categories</h3><!-- End .widget-title -->

                                <ul>
                                    <li><a href="#">Lifestyle<span>3</span></a></li>
                                    <li><a href="#">Shopping<span>3</span></a></li>
                                    <li><a href="#">Fashion<span>1</span></a></li>
                                    <li><a href="#">Travel<span>3</span></a></li>
                                    <li><a href="#">Hobbies<span>2</span></a></li>
                                </ul>
                            </div><!-- End .widget -->

                            <div class="widget">
                                <h3 class="widget-title">Popular Posts</h3><!-- End .widget-title -->

                                <ul class="posts-list">
                                    <li>
                                        <figure>
                                            <a href="#">
                                                <img src="{{asset('client_assets/assets/images/blog/sidebar/post-1.jpg')}}" alt="post">
                                            </a>
                                        </figure>

                                        <div>
                                            <span>Nov 22, 2018</span>
                                            <h4><a href="#">Aliquam tincidunt mauris eurisus.</a></h4>
                                        </div>
                                    </li>
                                    <li>
                                        <figure>
                                            <a href="#">
                                                <img src="{{asset('client_assets/assets/images/blog/sidebar/post-2.jpg')}}" alt="post">
                                            </a>
                                        </figure>

                                        <div>
                                            <span>Nov 19, 2018</span>
                                            <h4><a href="#">Cras ornare tristique elit.</a></h4>
                                        </div>
                                    </li>
                                    <li>
                                        <figure>
                                            <a href="#">
                                                <img src="{{asset('client_assets/assets/images/blog/sidebar/post-3.jpg')}}" alt="post">
                                            </a>
                                        </figure>

                                        <div>
                                            <span>Nov 12, 2018</span>
                                            <h4><a href="#">Vivamus vestibulum ntulla nec ante.</a></h4>
                                        </div>
                                    </li>
                                    <li>
                                        <figure>
                                            <a href="#">
                                                <img src="{{asset('client_assets/assets/images/blog/sidebar/post-4.jpg')}}" alt="post">
                                            </a>
                                        </figure>

                                        <div>
                                            <span>Nov 25, 2018</span>
                                            <h4><a href="#">Donec quis dui at dolor  tempor interdum.</a></h4>
                                        </div>
                                    </li>
                                </ul><!-- End .posts-list -->
                            </div><!-- End .widget -->

                            <div class="widget widget-banner-sidebar">
                                <div class="banner-sidebar-title">ad box 280 x 280</div><!-- End .ad-title -->

                                <div class="banner-sidebar">
                                    <a href="#">
                                        <img src="{{asset('client_assets/assets/images/blog/sidebar/banner.jpg')}}" alt="banner">
                                    </a>
                                </div><!-- End .banner-ad -->
                            </div><!-- End .widget -->

                            <div class="widget">
                                <h3 class="widget-title">Browse Tags</h3><!-- End .widget-title -->

                                <div class="tagcloud">
                                    <a href="#">fashion</a>
                                    <a href="#">style</a>
                                    <a href="#">women</a>
                                    <a href="#">photography</a>
                                    <a href="#">travel</a>
                                    <a href="#">shopping</a>
                                    <a href="#">hobbies</a>
                                </div><!-- End .tagcloud -->
                            </div><!-- End .widget -->

                            <div class="widget widget-text">
                                <h3 class="widget-title">About Blog</h3><!-- End .widget-title -->

                                <div class="widget-text-content">
                                    <p>Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, pulvinar nunc sapien ornare nisl.</p>
                                </div><!-- End .widget-text-content -->
                            </div><!-- End .widget -->
                        </div><!-- End .sidebar sidebar-shop -->
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
    @endforeach
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0"></script>
@endsection
