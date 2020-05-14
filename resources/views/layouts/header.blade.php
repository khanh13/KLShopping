<header class="header header-10 header-intro-clearance">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <a href="tel:#"><i class="icon-phone"></i>Call: +{{ $setting->phone_one }}</a>
                <a href="tel:#" style="padding-left: 2rem"><i class="icon-envelope"></i>    email: {{ $setting->email }}</a>
            </div><!-- End .header-left -->

            <div class="header-right">

                <ul class="top-menu">
                    <li>
                        <ul>
                            <li>
                                @php
                                    $language = Session()->get('lang');
                                @endphp
                                <div class="header-dropdown">
                                    @if(Session()->get('lang') == 'vietnam' )
                                        <a href="{{ route('language.vietnam') }}">Vietnam</a>
                                    @else
                                        <a href="{{ route('language.english') }}">Engligh</a>
                                    @endif
                                    <div class="header-menu">
                                        <ul>
                                            <li><a href="{{ route('language.english') }}">English</a></li>
                                            <li><a href="{{ route('language.vietnam') }}">Vietnam</a></li>
                                        </ul>
                                    </div><!-- End .header-menu -->
                                </div><!-- End .header-dropdown -->
                            </li>

                            @guest
                                <li class="login">
                                    <a href="{{ route('login') }}">Sign in / Register </a>
                                </li>
                            @else
                                <li>
                                    <div class="header-dropdown">
                                        <a href="{{ route('home') }}">Profile</a>
                                        <div class="header-menu">
                                            <ul>
                                                <li><a href="{{ route('user.wishlist') }}">Whishlist</a></li>
                                                <li><a href="{{ route('user.checkout') }}">Checkout</a></li>
                                                <li><a href="{{ route('home') }}">Setting</a></li>
                                                <li><a href="{{ route('user.logout') }}">Log out</a></li>
                                            </ul>
                                        </div><!-- End .header-menu -->
                                    </div><!-- End .header-dropdown -->
                                </li>
                            @endguest
                        </ul>
                    </li>
                </ul><!-- End .top-menu -->
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-top -->

    <div class="header-middle">
        <div class="container">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>
                <a href="{{ url('/') }}" class="logo">
                    <img src="{{asset('public/images/logo/kllogo.png')}}" alt="Molla Logo" width="105" height="25">
                </a>
            </div><!-- End .header-left -->
                @php
                $categories = DB::table('categories')->get();
                @endphp
            <div class="header-center">
                <div class="header-search header-search-extended header-search-visible header-search-no-radius d-none d-lg-block">
                    <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                    <form action="{{ route('product.search') }}" method="POST">
                        @csrf
                        <div class="header-search-wrapper search-wrapper-wide">
                            <div class="select-custom">
                                <select id="cat" name="cat">
                                    <option value="">All Categories</option>
                                    @foreach($categories as $category)
                                    <option value="">
                                        <a href="{{ url('allcategory/'.$category->id) }}">{{ $category->category_name }}</a>
                                    </option>
                                    @endforeach
                                </select>
                            </div><!-- End .select-custom -->
                            <label for="q" class="sr-only">Search</label>
                            <input type="search" class="form-control" id="q" name="search" placeholder="Search product ..." required>
                            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                        </div><!-- End .header-search-wrapper -->
                    </form>
                </div><!-- End .header-search -->
            </div>

            <div class="header-right">
                <div class="header-dropdown-link">

                    @guest
                    @else
                        @php
                            $wishlist = DB::table('wishlists')->where('user_id',Auth::id())->get();
                        @endphp
                    <a href="{{route('user.wishlist')}}" class="wishlist-link">
                        <i class="icon-heart-o"></i>
                        <span class="wishlist-count">{{ count($wishlist) }}</span>
                        <span class="wishlist-txt">Wishlist</span>
                    </a>
                    @endguest
                    <div class="dropdown cart-dropdown">
                        <a href="{{ route('show.cart') }}" class="dropdown-toggle" role="button" >
                            <i class="icon-shopping-cart"></i>
                            <span class="cart-count">{{ Cart::count() }}</span>
                            <span class="cart-txt">Cart</span>
                        </a>
                        <h5>${{ Cart::subtotal() }}</h5>
                    </div><!-- End .cart-dropdown -->
                </div>
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-middle -->
@include('layouts.navbar')
</header><!-- End .header -->
