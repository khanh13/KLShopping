@extends('layouts.app')

@section('content')
    <main class="main">
        <div class="page-header text-center" style="background-image: url({{asset('client_assets/assets/images/page-header-bg.jpg')}})">
            <div class="container">
                <h1 class="page-title">Blog Mask Grid<span>Blog</span></h1>
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
                <nav class="blog-nav">
                    <ul class="menu-cat entry-filter justify-content-center">
                        <li class="active"><a href="#" data-filter="*">All Blog Posts<span>9</span></a></li>
                        <li><a href="#" data-filter=".lifestyle">Lifestyle<span>3</span></a></li>
                        <li><a href="#" data-filter=".shopping">Shopping<span>1</span></a></li>
                        <li><a href="#" data-filter=".fashion">Fashion<span>2</span></a></li>
                        <li><a href="#" data-filter=".travel">Travel<span>4</span></a></li>
                        <li><a href="#" data-filter=".hobbies">Hobbies<span>2</span></a></li>
                    </ul><!-- End .blog-menu -->
                </nav><!-- End .blog-nav -->

                @foreach($blog as $row)
                <div class="entry-container" data-layout="fitRows">
                    <div class="entry-item lifestyle shopping col-sm-6 col-lg-4">
                        <article class="entry entry-mask">
                            <figure class="entry-media">
                                <a href="{{ url('blog/single/'.$row->id) }}">
                                    <img src="{{ asset($row->image) }}" alt="image desc">
                                </a>
                            </figure><!-- End .entry-media -->

                            <div class="entry-body">
                                <div class="entry-meta">
                                    <span class="meta-separator"></span>
                                </div><!-- End .entry-meta -->

                                <h2 class="entry-title">
                                    @if(Session()->get('lang') == 'vietnam')
                                        <a href="{{ url('blog/single/'.$row->id) }}"> {{ $row->title_vi }}</a>

                                    @else
                                        <a href="{{ url('blog/single/'.$row->id) }}">{{ $row->title_en }}</a>

                                    @endif




                                </h2><!-- End .entry-title -->

                                <div class="entry-cats">
{{--                                    in <a href="#">--}}
{{--                                        {{ $row->title_vi }}--}}
{{--                                    </a>,--}}
{{--                                    <a href="#">Shopping</a>--}}
                                </div><!-- End .entry-cats -->
                            </div><!-- End .entry-body -->
                        </article><!-- End .entry -->
                    </div><!-- End .entry-item -->

                    @endforeach


                </div><!-- End .entry-container -->

                <div class="mb-3"></div><!-- End .mb-3 -->

                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
                                <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
                            </a>
                        </li>
                        <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item">
                            <a class="page-link page-link-next" href="#" aria-label="Next">
                                Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
    <script src="{{asset('client_assets/assets/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('client_assets/assets/js/isotope.pkgd.min.js')}}"></script>
    @endsection
