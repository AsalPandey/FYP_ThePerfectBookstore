<!DOCTYPE html>
<html lang="en">
<head>

    <base href="{{ url('/') }}">

    @include('admin.css')

    <style>
        .div_center{
            text-align: center;
            padding-top: 40px;
        }

        .font_size{
            font-size: 40px;
            padding-bottom: 40px;
        }

        .text_color{
            color: black;
            padding-bottom: 20px;
        }

        label{
            display: inline-block;
            width: 200px;
        }

        .div_design{
            padding-bottom: 15px;
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

                <div class="div_center">
                    <h1 class="font_size">
                        Update Product
                    </h1>

                    <form action="{{url('/update_rproduct_confirm',$rproduct->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="div_design">
                            <label>Product Title</label>
                            <input class="text_color" type="text" name="title" placeholder="Write a title" required="" value="{{$rproduct->title}}">
                        </div>

                        <div class="div_design">
                            <label>Product Description</label>
                            <input class="text_color" type="text" name="description" placeholder="Write a description" required=""value="{{$rproduct->description}}">
                        </div>

                        <div class="div_design">
                            <label>Product Price</label>
                            <input class="text_color" type="number" name="price" placeholder="Write a price" required=""value="{{$rproduct->price}}">
                        </div>

                        <div class="div_design">
                            <label>Discount Price</label>
                            <input class="text_color" type="number" name="dis_price" placeholder="Write a dis if applied" value="{{$rproduct->discount_price}}">
                        </div>

                        <div class="div_design">
                            <label>Second-hand Price</label>
                            <input class="text_color" type="number" name="sec_price" placeholder="Write a second-hand price if applied"value="{{$rproduct->secondhand_price}}">
                        </div>

                        <div class="div_design">
                            <label>Rent Price</label>
                            <input class="text_color" type="number" name="rent_price" placeholder="Write a rent price if applied"value="{{$rproduct->rent_price}}">
                        </div>

                        <div class="div_design">
                            <label>ISBN</label>
                            <input class="text_color" type="number" name="ISBN" placeholder="Write ISBN number of the book" value="{{$rproduct->ISBN}}">
                        </div>

                        <div class="div_design">
                            <label>Genre</label>
                            <input class="text_color" type="text" name="genre" placeholder="Write genre of the book" value="{{$rproduct->genre}}">
                        </div>

                        <div class="div_design">
                            <label>Author</label>
                            <input class="text_color" type="text" name="author" placeholder="Author of the book" value="{{$rproduct->author}}">
                        </div>

                        <div class="div_design">
                            <label>Product Quantity</label>
                            <input class="text_color" type="number" min="0" name="quantity" placeholder="Write a quantity" required="" value="{{$rproduct->quantity}}">
                        </div>


                        <div class="div_design">
                            <label>Product Catagory</label>
                            <select class="text_color" name="catagory" required="">
                                <option value="" selected="">{{$rproduct->catagory}}</option>

                                @foreach($catagory as $catagory)
                                    <option value="{{$catagory->catagory_name}}">{{$catagory->catagory_name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="div_design">
                            <label>School</label>
                            <select class="text_color" name="school">
                                @foreach($school as $s)
                                    <option value="{{$s->id}}" @if($s->id == $rproduct->school_id) selected @endif>{{$s->school_name}}</option>
                                @endforeach
                            </select>
                        </div>



                        <div class="div_design">
                            <label>Current Product Image</label>
                            <img style="margin:auto;" height="100" width="100" src="/product/{{$rproduct->image}}">
                        </div>

                        <div class="div_design">
                            <label>Change Product Image</label>
                            <input  type="file" name="image" placeholder="Write a title">
                        </div>


                        <div class="div_design">
                            <input type="submit" value="Update Product" class="btn btn-primary">
                        </div>

                    </form>

                </div>



            </div>
        </div>


    </div>

</div>

@include('admin.script')

</body>
</html>
