<header class="header_section">

    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="{{url('/')}}"><img width="250" height="70" src="{{asset('home/images/logo.png')}}" alt="#" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                        <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item {{ Request::is('products') ? 'active' : '' }}" >
                        <a class="nav-link" href="{{url('products')}}">Products</a>
                    </li>
                    <li class="nav-item {{ Request::is('rproducts') ? 'active' : '' }}">
                        <a class="nav-link" href="{{url('rproducts')}}">secondhand</a>
                    </li>
                    <li class="nav-item {{ Request::is('sell') ? 'active' : '' }}">
                        <a class="nav-link" href="{{url('sell')}}">sell</a>
                    </li>
                    <li class="nav-item {{ Request::is('show_cart') ? 'active' : '' }}">
                        <a class="nav-link" href="{{url('show_cart')}}"> Cart</a>
                    </li>
                    <li class="nav-item {{ Request::is('show_rent') ? 'active' : '' }}">
                        <a class="nav-link" href="{{url('show_rent')}}"> Rents</a>
                    </li>
                    <li class="nav-item {{ Request::is('show_order') ? 'active' : '' }}">
                        <a class="nav-link" href="{{url('show_order')}}"> Order</a>
                    </li>
                    <li class="nav-item {{ Request::is('get_membership') ? 'active' : '' }}">
                        <a class="nav-link" href="{{url('get_membership')}}"> membership</a>
                    </li>
                    <form class="form-inline">
                        <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                    @if (Route::has('login'))
                        @auth
                            <x-app-layout>
                            </x-app-layout>
                        @else
                            <li class="nav-item">
                                <a class="btn btn-primary" id="logincss" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-success" href="{{ route('register') }}">Register</a>
                            </li>
                        @endauth
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</header>
