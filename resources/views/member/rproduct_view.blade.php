<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">

            <br><br>

            <div>
                <form action="{{url('rproduct_search')}}" method="GET">
                    @csrf
                    <input style="width: 500px;" type="text" name="search" placeholder="Search for Something">
                    <input type="submit" value="search">
                </form>
            </div>
        </div>

        @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{session()->get('message')}}
            </div>
        @endif


        <div class="row">
            {{--            foreach loop for product--}}
            @foreach($rproduct as $rproducts)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">

                                <a href="{{url('rproduct_details',$rproducts->id)}}" class="option1">
                                    Product Details
                                </a>

                                <form action="{{url('r_add_cartrent',$rproducts->id)}}" method="POST">
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


                                <form action="{{url('r_add_cart',$rproducts->id)}}" method="POST">
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

                            </div>
                        </div>
                        <div class="img-box">
                            <img src="product/{{$rproducts->image}}" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                {{$rproducts->title}}
                            </h5>

                            @if($rproducts->discount_price != null)
                                <h6 style="color: blue">
                                    Price
                                    <br>
                                    Rs:{{$rproducts->secondhand_price - $rproducts->discount_price}}
                                </h6>
                            @else
                                <h6 style="color: blue">
                                    Price
                                    <br>
                                    Rs:{{$rproducts->secondhand_price}}
                                </h6>
                            @endif
                                <h6 style=" color: blue">
                                    rent
                                    <br>
                                    Rs:{{$rproducts->rent_price}}
                                </h6>

                        </div>
                    </div>
                </div>
            @endforeach

            <span style="padding-top: 20px">

{!!$rproduct->withQueryString()->links('pagination::bootstrap-5')!!}

            </span>
        </div>


    </div>
</section>

