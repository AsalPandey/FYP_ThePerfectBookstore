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

                <h1 class="title_deg">Rent orders</h1>

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
                        <th>Phone</th>
                        <th>Product title</th>
                        <th>Rent Date</th>
                        <th>Return date</th>
                        <th>Price</th>
                        <th>Payment status</th>
                        <th>Delivery status</th>
                        <th>Image</th>
                        <th>Delivery</th>
                    </tr>

                    @forelse($rorder as $rorder)
                        <tr>
                            <td>{{$rorder->name}}</td>
                            <td>{{$rorder->phone}}</td>
                            <td>{{$rorder->product_title}}</td>
                            <td>{{$rorder->created_at}}</td>
                            <td>{{$rorder->return_date}}</td>
                            <td>{{$rorder->price}}</td>
                            <td>{{$rorder->payment_status}}</td>
                            <td>{{$rorder->delivery_status}}</td>
                            <td>
                                <img class="img_size" src="/product/{{$rorder->image}}">
                            </td>

                            <td >
                                @if($rorder->delivery_status=='processing')
                                    <a href="{{url('rent_delivered',$rorder->id)}}" onclick="return confirm('are you sure this product is delivered?')" class="btn btn-primary">Deliver</a>
                                @else
                                    <p style="color: gold">✓Delivered</p>
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
