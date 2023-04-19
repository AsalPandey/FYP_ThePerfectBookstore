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

    <style type="text/css">
        .center{
            margin: auto;
            width: 70%;
            text-align: center;
            padding: 30px;
        }
        .th_deg{
            font-size: 20px;
            font-weight: bold;
            padding: 10px;
            background-color: skyblue;
        }

        .img_deg{
            height: 100px;
            width: 180px;
        }

        .table {
            width: 100%;
            margin-top: 20px;
            margin-bottom: 20px;
            border-collapse: collapse;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .table th,
        .table td {
            padding: 10px;
            text-align: left;
            vertical-align: middle;
        }

        .table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .table-row:hover {
            background-color: #f5f5f5;
        }

        .btn {
            display: inline-block;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            color: #fff;
            background-color: #e74c3c;
            transition: all 0.2s ease;
        }

        .btn:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
<div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
    <!-- slider section -->

    <!-- end slider section -->

<!-- why section -->

    @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{session()->get('message')}}
        </div>
    @endif

<div class="center">
    <h1 style="font-size: 36px; text-align: center; margin-top: 30px; margin-bottom: 30px; color: #008080; text-shadow: 2px 2px #f2f2f2;">This is Your Cart</h1>
    <table class="table">
        <thead>
        <tr>
            <th class="th_deg">Product Title</th>
            <th class="th_deg">Product Quantity</th>
            <th class="th_deg">Price</th>
            <th class="th_deg">Image</th>
            <th class="th_deg">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $totalprice=0; ?>
        @forelse($cart as $cart)
            <tr class="table-row">
                <td>{{$cart->product_title}}</td>
                <td>{{$cart->quantity}}</td>
                <td>Rs{{$cart->price}}</td>
                <td><img class="img_deg" src="/product/{{$cart->image}}"></td>
                <td>
                    <a class="btn btn-danger" onclick="return confirm('Are you sure to remove this product?')" href="{{url('remove_cart',$cart->id)}}">Remove Product</a>
                </td>
            </tr>
                <?php $totalprice=$totalprice + $cart->price ?>
        @empty
            <tr>
                <td colspan="5">Cart is Empty</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    <div>
        <h1 class="total_deg">
            Total Price: Rs{{$totalprice}}
        </h1>
    </div>

    <div>
        <h1 style="font-size: 25px; padding-bottom: 25px;">Proceed To Order</h1>
        <a href="{{url('cash_order')}}" class="btn btn-primary" style="background-image: linear-gradient(to right, #ff5f6d, #36d1dc, #ffdd40);">Cash on Delivery</a>
        <a href="{{url('stripe',$totalprice)}}" class="btn btn-primary" style="background-image: linear-gradient(to right, #ff5f6d, #36d1dc, #ffdd40);">Pay using Card</a>
    </div>

</div>


</div>
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
