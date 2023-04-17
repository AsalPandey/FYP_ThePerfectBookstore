<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
        .div_center{
            text-align: center;
            padding-top: 40px;
        }
        .h2_font{
            font-size: 40px;
            padding-bottom: 40px;
        }
        .color{
            color: black;
        }

        .center{
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 40px;
            border: 2px solid white;
        }

        .th_color{
            background: darkgray;
        }
    </style>
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    @include('admin.sidebar')
    <!-- partial -->
    @include('admin.header')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">

            @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{session()->get('message')}}
                </div>
            @endif

            <div class="div_center">

                <h2 class="h2_font">Add Schools</h2>

                <form action="{{url('/add_schools')}}" method="POST">

                    @csrf

                    <input class="color" type="text" name="school" placeholder="Write schools name">
                    <input type="submit" class="btn btn-primary" name="submit" value="Add School">
                </form>

            </div>


            <table class="center">


                <tr class="th_color">
                    <td>School ID</td>
                    <td>School Name</td>
                    <td>Action</td>
                </tr>

                @foreach($data as $data)
                    <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->school_name}}</td>
                        <td>
                            <a onclick="return confirm('Are you sure you want to delete this?')" class="btn btn-danger" href="{{url('delete_schools',$data->id)}}">Delete</a>
                        </td>
                    </tr>
                @endforeach()


            </table>


        </div>
    </div>
</div>
<!-- container-scroller -->
<!-- plugins:js -->
@include('admin.script')
<!-- End custom js for this page -->
</body>
</html>
