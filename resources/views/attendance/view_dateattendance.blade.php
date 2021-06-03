@extends('layouts.app')

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
                            <h3 class="panel-title ">Show ALl Attendance</h3>
                        </div>
                        <div class="panel-body">
                            <h2 class="text-center text-success">Update Attendance  {{$attendance_date->att_date}}</h2>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <form action="{{route('update.attendance')}}" method="post">
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
                                            @foreach($attendance as $key=>$row)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$row->employee->name}}</td>
                                                    <td><img src="{{asset('employee/'.$row->employee->photo)}}" alt="" width="100" height="100"></td>

                                                    <td>
                                                        <input type="hidden" name="id[]" value="{{$row->id}}">
                                                        <input type="radio" name="attendance[{{$row->id}}]" value="present" @if($row->attendance=='present') checked @endif> Present
                                                        <input type="radio" name="attendance[{{$row->id}}]" value="absent" @if($row->attendance=='absent') checked @endif> Absent
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










