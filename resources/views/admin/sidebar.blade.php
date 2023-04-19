<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="index.html"><img src="admin/assets/images/logo.png" alt="logo" /></a>

    </div>
    <ul class="nav">



        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('/redirect')}}">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        {{-- Products --}}
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-icon">
            <i class="mdi mdi-laptop"></i>
        </span>
                <span class="menu-title">Products</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/view_product')}}">Add Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/show_product')}}">Show Products</a>
                    </li>
                </ul>
            </div>
        </li>

        {{-- Rent Products --}}
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic-rent" aria-expanded="false" aria-controls="ui-basic-rent">
        <span class="menu-icon">
            <i class="mdi mdi-laptop"></i>
        </span>
                <span class="menu-title">Rent Products</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic-rent">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/view_rproduct')}}">Add Secondhand Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/show_rproduct')}}">Show Secondhand Products</a>
                    </li>
                </ul>
            </div>
        </li>

{{--        catagory--}}

        <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('view_catagory')}}">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
                <span class="menu-title">Catagory</span>
            </a>
        </li>


{{--        schools--}}
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('view_schools')}}">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
                <span class="menu-title">Schools</span>
            </a>
        </li>
{{--        order--}}

        <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('order')}}">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
                <span class="menu-title">Buy Orders</span>
            </a>
        </li>

{{--        rent-orders--}}
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('rent_order')}}">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
                <span class="menu-title">Rent Orders</span>
            </a>
        </li>

{{--        sell requests--}}
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('sell_order')}}">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
                <span class="menu-title">Sell requests</span>
            </a>
        </li>
    </ul>
</nav>
