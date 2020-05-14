<!-- navbar -->
<!-- ============================================================== -->
<div class="dashboard-header">
    <nav class="navbar navbar-expand-lg bg-white fixed-top">
        <a class="navbar-brand" href="{{ url('admin/home') }}">Admin</a>

        <div class="collapse navbar-collapse " id="navbarSupportedContent">
        </div>

        <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="{{ asset('admin_assets/images/avatar-1.jpg') }}" alt="" class="user-avatar-md rounded-circle"></a>
        <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
            <div class="nav-user-info">
                <h5 class="mb-0 text-white nav-user-name">{{ Auth::user()->name }} </h5>
            </div>
            <a class="dropdown-item" href="{{ route('admin.password.change') }}"><i class="fas fa-cog mr-2"></i>Change Password</a>
            <a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="fas fa-power-off mr-2"></i>Logout</a>
        </div>
    </nav>
</div>
<!-- ============================================================== -->
<!-- end navbar -->
<!-- ============================================================== -->

