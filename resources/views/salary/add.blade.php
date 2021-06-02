@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Welcome ! to Salary Page</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{route('home')}}">Moltran</a></li>
                        <li class="active">Salary</li>
                    </ol>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading panel-color"><h3 class="panel-title text-center">Add Salary</h3></div>
                        <div class="panel-body">
                            <form role="form" method="post" action="{{route('salary.store')}}"  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Employee</label>
                                            <select name="employee_id" class="form-control @error('employee_id') is-invalid @enderror">
                                                <option >Please Select Employee</option>
                                                @foreach($employees as $employee)
                                                <option value="{{$employee->id}}">{{$employee->name}}</option>
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

                                                    <option value="january">January</option>
                                                    <option value="february">February</option>
                                                    <option value="march">March</option>
                                                    <option value="april">April</option>
                                                    <option value="may">May</option>
                                                    <option value="june">June</option>
                                                    <option value="july">July</option>
                                                    <option value="august">August</option>
                                                    <option value="september">September</option>
                                                    <option value="october">October</option>
                                                    <option value="november">November</option>
                                                    <option value="december">December</option>

                                            </select>

                                        </div>
                                        @error('month')
                                        <span class="invalid-feedback " role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                        @enderror

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Year</label>
                                            <input type="number" class="form-control @error('year') is-invalid @enderror" id="exampleInputPassword1" placeholder="Enter  Year" name="year">
                                            @error('year')
                                            <span class="invalid-feedback " role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Advance Salary</label>
                                            <input type="number" class="form-control @error('advance_salary') is-invalid @enderror" id="exampleInputPassword1" placeholder="Enter Advance Salary" name="advance_salary">
                                            @error('advance_salary')
                                            <span class="invalid-feedback " role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-purple waves-effect waves-light pull-right">Submit</button>
                            </form>
                        </div><!-- panel-body -->
                    </div> <!-- panel -->
                </div> <!-- end col -->
            </div> <!-- End row -->
        </div> <!-- container -->
    </div> <!-- content -->
@endsection
