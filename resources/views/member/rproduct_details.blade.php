<!DOCTYPE html>
<html>
<head>

    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{asset('home/images/favicon.png')}}" type="">
    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
    <!-- font awesome style -->
    <link href="{{asset('home/css/font-awesome.min.css" rel="stylesheet')}}" />
    <!-- Custom styles for this template -->
    <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />

    <style>

    </style>

</head>
<body>
<div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->


    <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto; width: 50%; padding: 30px;">
        <div>

            <div class="img-box" style="padding: 20px;">
                <img src="/product/{{$rproduct->image}}" alt="">
            </div>
            <div class="detail-box">
                <h5>
                    {{$rproduct->title}}
                </h5>

                @if($rproduct->discount_price!=null)

                    <h6 style="color: red">
                        New Price
                        <br>
                        Rs:{{$rproduct->secondhand_price- $rproduct->discount_price}}
                    </h6>

                    <h6 style="text-decoration: line-through; color: blue">
                        Price
                        <br>
                        Rs:{{$rproduct->secondhand_price}}
                    </h6>

                @else

                    <h6 style="color: blue">
                        Price
                        <br>
                        Rs:{{$rproduct->secondhand_price}}
                    </h6>

                @endif


                <h6>
                    Product Catagory:{{$rproduct->catagory}}
                    <br>
                    Product details:{{$rproduct->description}}
                    <br>
                    Available quantity:{{$rproduct->quantity}}
                    <br>
                    <form action="{{url('r_add_cart',$rproduct->id)}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <input type="number" name="quantity" value="1" min="1" style="width: 100px;">
                            </div>
                            <div class="col-md-4">
                                <input type="submit" value="Add To Cart">
                            </div>
                        </div>
                    </form>

                    <form action="{{url('r_add_cartrent',$rproduct->id)}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <input type="number" name="month" value="1" min="1" style="width: 100px;">
                            </div>
                            <div class="col-md-4">
                                <input type="submit" value="Rent for month">
                            </div>
                        </div>
                    </form>

                </h6>

            </div>
        </div>
    </div>

    <!-- footer start -->
    @include('home.footer')
    <!-- footer end -->
    <div class="cpy_">
        <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

        </p>
    </div>
    <!-- jQery -->
    <script src="home/js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="home/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="home/js/bootstrap.js"></script>
    <!-- custom js -->
    <script src="home/js/custom.js"></script>
</div>
</body>

</html>

