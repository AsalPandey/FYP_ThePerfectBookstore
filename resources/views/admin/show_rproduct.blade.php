<!DOCTYPE html>
<html lang="en">
<head>

    @include('admin.css')

    <style>

        .center{
            margin:auto;
            width: 50%;
            border: 2px solid white;
            text-align: center;
            margin-top:40px;


        }

        .font_size{
            text-align: center;
            font-size: 40px;
            padding-top: 20px;

        }

        .img_size{
            width: 150px;
            height: 150px;
        }

        .th_color{
            background: darkgray;
        }

        .th_deg{
            padding: 30px;
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


                @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{session()->get('message')}}
                    </div>
                @endif


                <h2 class="font_size">All Secondhand PRODUCTS</h2>
                <table class="center">
                    <tr class="th_color">
                        <th class="th_deg">Product Title</th>
                        <th class="th_deg">Price</th>
                        <th class="th_deg">Discount Price</th>
                        <th class="th_deg">Second-hand Price</th>
                        <th class="th_deg">Rent Price</th>
                        <th class="th_deg">ISBN</th>
                        <th class="th_deg">Quantity</th>
                        <th class="th_deg">Category</th>
                        <th class="th_deg">School</th>
                        <th class="th_deg">Product Image</th>
                        <th class="th_deg">Action</th>
                    </tr>
                    @foreach($rproduct as $rproduct)
                        <tr>
                            <td>{{$rproduct->title}}</td>
                            <td>{{$rproduct->price}}</td>
                            <td>{{$rproduct->discount_price}}</td>
                            <td>{{$rproduct->secondhand_price}}</td>
                            <td>{{$rproduct->rent_price}}</td>
                            <td>{{$rproduct->ISBN}}</td>
                            <td>{{$rproduct->quantity}}</td>
                            <td>{{$rproduct->catagory}}</td>
                            <td>{{$rproduct->school_id}}</td>

                            <td>
                                <img class="img_size" src="/product/{{$rproduct->image}}">
                            </td>
                            <td>
                                <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')" href="{{url('delete_rproduct',$rproduct->id)}} ">Delete</a>
                                <a class="btn btn-success" href="{{url('update_rproduct',$rproduct->id)}}">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </table>

            </div>
        </div>



    </div>

</div>

@include('admin.script')

</body>
</html>
