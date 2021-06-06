@extends('layouts.app')
@section('attendance','active')
@section('content')
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Welcome ! to Employee Page</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{route('home')}}">Moltran</a></li>
                        <li class="active">Employee</li>
                    </ol>
                </div>
            </div>



            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title ">Show ALl Employee</h3>
                        </div>
                        <div class="panel-body">
                            <h2 class="text-center text-success">{{date("d/m/y")}}</h2>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <form action="{{route('insert.attendance')}}" method="post">
                                        @csrf

                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Sl</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>


                                            <tbody>



                                            @foreach($all_attendance as $key=>$date)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$date->edit_date}}</td>

                                                    <td class="text-center">
                                                        <a href="{{route('edit.attendance',$date->edit_date)}}" class="btn btn-success btn-sm">Edit</a>
                                                    </td>

                                                </tr>
                                            @endforeach


                                            </tbody>

                                        </table>


                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- End Row -->
        </div> <!-- container -->
    </div> <!-- content -->
@endsection
