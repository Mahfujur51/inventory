@extends('layouts.app')
@section('salary','active')
@section('content')
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Welcome ! to Customer Page</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{route('home')}}">Dashboard</a></li>
                        <li class="active">Supplier</li>
                    </ol>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading panel-color"><h3 class="panel-title text-center">Edit Supplier</h3></div>
                        <div class="panel-body">
                            <form role="form" method="post" action="{{route('salary.update',$salary->id)}}"  enctype="multipart/form-data">
                                @csrf
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Employee</label>
                                            <select name="employee_id" class="form-control @error('employee_id') is-invalid @enderror">
                                                <option >Please Select Employee</option>
                                                @foreach($employees as $employee)
                                                    <option value="{{$employee->id}}" @if($salary->employee_id==$employee->id) selected @endif >{{$employee->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('employee_id')
                                            <span class="invalid-feedback " role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Select Month</label>
                                            <select name="month" class="form-control @error('month') is-invalid @enderror">
                                                <option >Please Select Month</option>

                                                <option value="january" @if($salary->month=='january') selected @endif>January</option>
                                                <option value="february"  @if($salary->month=='february') selected @endif  >February</option>
                                                <option value="march"  @if($salary->month=='march') selected @endif>March</option>
                                                <option value="april" @if($salary->month=='april') selected @endif >April</option>
                                                <option value="may"  @if($salary->month=='may') selected @endif>May</option>
                                                <option value="june" @if($salary->month=='june') selected @endif>June</option>
                                                <option value="july" @if($salary->month=='july') selected @endif>July</option>
                                                <option value="august" @if($salary->month=='august') selected @endif>August</option>
                                                <option value="september" @if($salary->month=='september') selected @endif>September</option>
                                                <option value="october" @if($salary->month=='october') selected @endif>October</option>
                                                <option value="november" @if($salary->month=='november') selected @endif>November</option>
                                                <option value="december" @if($salary->month=='december') selected @endif>December</option>

                                            </select>

                                        </div>
                                        @error('month')
                                        <span class="invalid-feedback " role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                        @enderror

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Year</label>
                                            <input type="number" class="form-control @error('year') is-invalid @enderror" id="exampleInputPassword1" value="{{$salary->year}}" name="year">
                                            @error('year')
                                            <span class="invalid-feedback " role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Advance Salary</label>
                                            <input type="number" class="form-control @error('advance_salary') is-invalid @enderror" id="exampleInputPassword1" value="{{$salary->advance_salary}}" name="advance_salary">
                                            @error('advance_salary')
                                            <span class="invalid-feedback " role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-purple waves-effect waves-light pull-right">Update</button>
                            </form>
                        </div><!-- panel-body -->
                    </div> <!-- panel -->
                </div> <!-- end col -->
            </div> <!-- End row -->
        </div> <!-- container -->
    </div> <!-- content -->
@endsection
