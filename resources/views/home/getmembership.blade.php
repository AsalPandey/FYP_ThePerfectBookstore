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
    <link rel="shortcut icon" href="home/images/favicon.png" type="">
    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />


</head>
<body>

    @include('home.header')


{{--    here, the code starts--}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white">{{ __('Get Membership') }}</div>

                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Join our library of books and get amazing offers!</h2>

                        <div class="row justify-content-center mb-4">
                            <div class="col-md-6">
                                <div class="card border-0 rounded-lg">
                                    <div class="card-body text-center">
                                        <h5 class="card-title mb-4">Membership Price</h5>
                                        <h1 class="card-text display-4 mb-4">1000 NPR</h1>
                                        <form action="{{ url('paymembership') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-lg btn-primary w-100" style="background-image: linear-gradient(to right, #ff5f6d, #36d1dc, #ffdd40);">Pay Now</button>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="card border-0 rounded-lg">
                                    <div class="card-body text-center">
                                        <h5 class="card-title mb-4">Rent, sell and buy exclusive books with Membership!</h5>
                                        <p class="card-text">Explore a wide range of first as well as second-hand books to rent and sell through our platform, and be the first to receive our latest offers and features.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card border-0 rounded-lg">
                                    <div class="card-body text-center">
                                        <h5 class="card-title mb-4">Browse and buy books without membership!</h5>
                                        <p class="card-text">Not ready to commit to a membership yet? You can still browse our amazing selection of books and purchase them.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--    here the code ends--}}


@include('home.footer')
<!-- footer end -->
<div class="cpy_">
    <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

        Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

    </p>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        var scrollpos = localStorage.getItem('scrollpos');
        if (scrollpos) window.scrollTo(0, scrollpos);
    });

    window.onbeforeunload = function(e) {
        localStorage.setItem('scrollpos', window.scrollY);
    };
</script>
<!-- jQery -->
<script src="home/js/jquery-3.4.1.min.js"></script>
<!-- popper js -->
<script src="home/js/popper.min.js"></script>
<!-- bootstrap js -->
<script src="home/js/bootstrap.js"></script>
<!-- custom js -->
<script src="home/js/custom.js"></script>
</body>
</html>
