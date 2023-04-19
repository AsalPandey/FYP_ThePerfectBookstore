<!DOCTYPE html>
<html lang="en">
<head>

    @include('admin.css')

    <style type="text/css">
        .title_deg{
            text-align: center;
            font-size: 25px;
            font-weight: bold;
            padding-bottom: 40px;
        }
        .table_deg{
            border: 2px solid white;
            width: 100%;
            margin: auto;
            text-align: center;

        }
        .th_color{
            background: darkgray;
        }

        .img_size
        {
            width: 200px;
            height: 100px;
        }

    </style>
</head>
<body>
<div class="container-scroller">

    @include('admin.sidebar')

    <div class="container-fluid page-body-wrapper">

        @include('admin.header')
        <div class="main-panel">
            <div class="content-wrapper">

                <h1 class="title_deg">All orders</h1>

                <div style="padding-left: 450px">
                    <form action="{{url('search')}}" method="get">
                        @csrf
                        <input type="text" style="color: black" name="search" placeholder="Search For Something">
                        <input type="submit" name="Search" class="btn btn-outline-primary">
                    </form>
                </div>

                <table class="table_deg">
                    <tr class="th_color">
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Product title</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>OrderDate</th>
                        <th>Payment status</th>
                        <th>Delivery status</th>
                        <th>Image</th>
                        <th>Delivery</th>
                    </tr>

                    @forelse($order as $order)
                        <tr>
                            <td>{{$order->name}}</td>
                            <td>{{$order->email}}</td>
                            <td>{{$order->address}}</td>
                            <td>{{$order->phone}}</td>
                            <td>{{$order->product_title}}</td>
                            <td>{{$order->quantity}}</td>
                            <td>{{$order->price}}</td>
                            <td>{{$order->created_at->format('d/m/Y')}}</td>
                            <td>{{$order->payment_status}}</td>
                            <td>{{$order->delivery_status}}</td>
                            <td>
                                <img class="img_size" src="/product/{{$order->image}}">
                            </td>

                            <td >
                                @if($order->delivery_status=='processing')
                                    <a href="{{url('delivered',$order->id)}}" onclick="return confirm('are you sure this product is delivered?')" class="btn btn-primary">Approve</a>
                                @else
                                    <p style="color: gold">✓Approved</p>
                                @endif
                            </td>


                        </tr>
                    @empty
                        <tr>
                            <td colspan="16">No Data Found</td>
                        </tr>


                    @endforelse
                </table>

            </div>
        </div>



    </div>

</div>

@include('admin.script')

</body>
</html>
