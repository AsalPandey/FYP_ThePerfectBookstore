<!DOCTYPE html>
<html lang="en">
<head>

    @include('admin.css')
    <style>
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

    </style>
</head>
<body>
<div class="container-scroller">
@include('admin.supersidebar')
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

                <h1 class="title_deg">All Users</h1>

                <div style="padding-left: 450px; padding-bottom: 30px;">
                    <form action="{{url('search_user')}}" method="get">
                        @csrf
                        <input type="text" style="color: black" name="search" placeholder="Search For Users">
                        <input type="submit" value="Search" class="btn btn-outline-primary">
                    </form>
                </div>


                @include('admin.users')
            </div>
        </div>



    </div>

</div>

@include('admin.script')

</body>
</html>
