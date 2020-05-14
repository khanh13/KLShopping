
@php
    $categories = DB::table('categories')->get();
@endphp
<style>
    .menu-vertical .megamenu:not(.megamenu-sm):not(.megamenu-md){
        width: 170px;
    }
</style>
<div class="header-bottom sticky-header">
    <div class="container">
        <div class="header-left">
            <div class="dropdown category-dropdown show is-on" data-visible="true">
                <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" data-display="static" title="Browse Categories">
                    Browse Categories
                </a>
                <div class="dropdown-menu show">
                    <nav class="side-nav">
                        <ul class="menu-vertical sf-arrows">
                            @foreach($categories as $category)
                                <li class="megamenu-container">
                                    <a class="sf-with-ul" href="{{ url('allcategory/'.$category->id) }}">{{ $category->category_name }}</a>
                                    <div class="megamenu">
                                    <div class="row no-gutters">
                                        <div class="col-md-8">
                                            <div class="menu-col">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <ul>
                                                            @php
                                                                $subcategories = DB::table('subcategories')->where('category_id', $category->id)->get();
                                                            @endphp
                                                            @foreach($subcategories as $subcategory)
                                                                <li><a href=" {{ url('products/'.$subcategory->id) }}">{{ $subcategory->subcategory_name }}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </div><!-- End .col-md-6 -->
                                                </div><!-- End .row -->
                                            </div><!-- End .menu-col -->
                                        </div><!-- End .col-md-8 -->
                                    </div><!-- End .row -->
                                </div><!-- End .megamenu -->
                            </li>
                            @endforeach
                        </ul><!-- End .menu-vertical -->
                    </nav><!-- End .side-nav -->
                </div><!-- End .dropdown-menu -->
            </div><!-- End .category-dropdown -->
        </div><!-- End .col-lg-3 -->
        <div class="header-center">
            <nav class="main-nav">
                <ul class="menu sf-arrows">
                    <li class="megamenu-container">
                        <a href="{{ url('/') }}" >Home</a>
                    </li>
                    <li>
                        <a href="{{ route('blog.post') }}" >Blog</a>
                    </li>
                    <li>
                        <a href="{{ route('contact.page') }}" >Contact</a>
                    </li>
                </ul><!-- End .menu -->
            </nav><!-- End .main-nav -->
        </div><!-- End .col-lg-9 -->
        <div class="header-right">
            <i class="la la-lightbulb-o"></i><p>{{ $setting->company_name }}</p>
        </div>
    </div><!-- End .container -->
</div><!-- End .header-bottom -->
