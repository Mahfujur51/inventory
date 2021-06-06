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
                                            <th>Name</th>
                                            <th>Picture</th>
                                            <th>Attendance</th>
                                        </tr>
                                        </thead>


                                            <tbody>



                                              @foreach($employees as $key=>$employee)
                                              <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$employee->name}}</td>
                                                <td><img src="{{asset('employee/'.$employee->photo)}}" alt="" width="100" height="100"></td>

                                                  <td>
                                                    <input type="hidden" name="user_id[]" value="{{$employee->id}}">
                                                    <input type="radio" name="attendance[{{$employee->id}}]" value="present"> Present
                                                    <input type="radio" name="attendance[{{$employee->id}}]" value="absent"> Absent
                                                    <input type="hidden" name="att_date" value="{{date("d/m/y")}}">
                                                    <input type="hidden" name="att_year" value="{{date("Y")}}">
                                                </td>

                                            </tr>
                                          @endforeach


                                        </tbody>

                                    </table>
                                    <button type="submit" class="btn btn-success pull-right">Take Attendance</button>


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
