<!-- ============================================================== -->
<!-- left sidebar -->
<!-- ============================================================== -->
<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Menu
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ url('admin/home') }}" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>

                    </li>
                    @if(Auth::user()->category == 1)
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2">
                                <i class="fas fa-calendar-alt"></i>Category</a>
                            <div id="submenu-2" class="collapse submenu" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('categories.index') }}">Category</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('subcategories.index') }}">Sub Category</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('brands.index') }}">Brand</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @else
                        @endif



                    @if(Auth::user()->product == 1)
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="fas fa-fw fa-table"></i>Products</a>
                        <div id="submenu-5" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('products.index') }}">All products</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('products.create') }}">Add product</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @else
                    @endif

                    @if(Auth::user()->stock == 1)
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-55" aria-controls="submenu-55"><i class="fas fa-fw fa-table"></i>View Stocks</a>
                            <div id="submenu-55" class="collapse submenu" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('admin.product.stock') }}">View Stocks</a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                    @else
                    @endif

                    @if(Auth::user()->orders == 1)
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-20" aria-controls="submenu-20"><i class="fab fa-wpforms"></i>Orders</a>
                        <div id="submenu-20" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.neworder') }}">Pending Orders</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.accept.payment') }}">Accept Payment</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.process.payment') }}">Process Delivery</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.success.payment') }}">Delivery Success</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.cancel.order') }}">Cancel Order </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @else
                    @endif

                    @if(Auth::user()->blog == 1)
                    <li class="nav-item ">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-4"><i class="fas fa-book"></i>Blogs</a>
                        <div id="submenu-6" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('blogcategories.index') }}">Blog Category</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('blogs.index') }}">Blog</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @else
                    @endif

                    @if(Auth::user()->report == 1)
                    <li class="nav-item ">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-12" aria-controls="submenu-12"><i class="far fa-newspaper"></i>Report</a>
                        <div id="submenu-12" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('today.order') }}">Today Order</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('today.delivery') }}">Today Delivery</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('this.month') }}">This Month</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('search.report') }}">Search Report</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @else
                    @endif

                    @if(Auth::user()->returns == 1)
                    <li class="nav-item ">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-30" aria-controls="submenu-30"><i class="fab fa-fw fa-wpforms"></i>Return Orders</a>
                        <div id="submenu-30" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.all.return') }}">All Request</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.return.request') }}">Return Request</a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    @else
                    @endif

                    @if(Auth::user()->other == 1)
                    <li class="nav-item ">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-31" aria-controls="submenu-31"><i class="fas fa-cogs"></i>Others</a>
                        <div id="submenu-31" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('coupons.index') }}">Coupon</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.subscribers') }}">Subscribers</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.seo') }}">Seo Setting</a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    @else
                    @endif

                    @if(Auth::user()->role == 1)
                    <li class="nav-item ">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-32" aria-controls="submenu-32"><i class="fas fa-users"></i>User Roles</a>
                        <div id="submenu-32" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.all.user') }}">All User Role</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('create.admin') }}">Create User Role</a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    @else
                    @endif

                    @if(Auth::user()->comment == 1)
                    <li class="nav-item ">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-33" aria-controls="submenu-33"><i class="fab fa-fw fa-wpforms"></i>Product Comment</a>
                        <div id="submenu-33" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('coupons.index') }}">All Comment</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.subscribers') }}">New Comment</a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    @else
                    @endif

                    @if(Auth::user()->setting == 1)
                    <li class="nav-item ">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-34" aria-controls="submenu-34"><i class="fas fa-wrench"></i>Site Setting</a>
                        <div id="submenu-34" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.site.setting') }}">Site Setting</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @else
                    @endif

                    @if(Auth::user()->contact == 1)
                    <li class="nav-item ">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-35" aria-controls="submenu-35"><i class="fab fa-fw fa-wpforms"></i>Contact Message</a>
                        <div id="submenu-35" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('all.message') }}">View Contact</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @else
                    @endif

                </ul>
            </div>
        </nav>
    </div>
</div>
<!-- ============================================================== -->
<!-- end left sidebar -->
