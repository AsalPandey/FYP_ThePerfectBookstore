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

    <style>
        .center {
            margin: auto;
            width: 70%;
            padding: 30px;
            text-align: center;
        }

        .th_deg {
            padding: 10px;
            background-color: skyblue;
            font-size: 20px;
            font-weight: bold;
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

        .table-row:nth-child(even) {
            background-color: #f9f9f9;
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

        @media only screen and (max-width: 600px) {
            .table {
                font-size: 14px;
            }
            .table th,
            .table td {
                padding: 8px;
            }
        }

        .table td:hover {
            background-color: #f5f5f5;
        }



    </style>


</head>
<body>
<div>

    @include('home.header')

    <div class="center">
        <div>
            <h1 style="font-size: 36px; text-align: center; margin-top: 30px; margin-bottom: 30px; color: #008080; text-shadow: 2px 2px #f2f2f2;">This is Your Orders</h1>


            <table class="table">
            <thead>
            <tr>
                <th class="th_deg">Product Title</th>
                <th class="th_deg">Quantity</th>
                <th class="th_deg">Price</th>
                <th class="th_deg">Payment Status</th>
                <th class="th_deg">Delivery Status</th>
                <th class="th_deg">Image</th>
                <th class="th_deg">Cancel Order</th>
            </tr>
            </thead>
            <tbody>
            @forelse($order as $order)
                <tr class="table-row">
                    <td>{{$order->product_title}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>{{$order->price}}</td>
                    <td>{{$order->payment_status}}</td>
                    <td>{{$order->delivery_status}}</td>
                    <td><img height="100" width="180" src="product/{{$order->image}}"></td>
                    <td>
                        @if($order->delivery_status=='processing')
                            <a onclick="return confirm('Are you sure you want to cancel this order?')" class="btn btn-danger" href="{{url('cancel_order',$order->id)}}">Cancel Order</a>
                        @else
                            <p style="color: blue">Not Allowed</p>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="16">No Data Found</td>
                </tr>
            @endforelse
            </tbody>
        </table>
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
