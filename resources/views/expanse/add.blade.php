@extends('layouts.app')
@section('expanse','active')
@section('content')
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Welcome ! to Expanse Page</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{route('home')}}">Moltran</a></li>
                        <li class="active">Expanse</li>
                    </ol>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading panel-color"><h3 class="panel-title text-center">Add Expanse</h3></div>
                        <div class="panel-body">
                            <form role="form" method="post" action="{{route('expanse.store')}}"  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Details</label>
                                            <input type="text" class="form-control @error('details') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter Details" name="details">
                                            @error('details')
                                            <span class="invalid-feedback " role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>



                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Amount</label>
                                            <input type="number" class="form-control @error('amount') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter Amount" name="amount">
                                            @error('amount')
                                            <span class="invalid-feedback " role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">

                                            <input type="hidden" class="form-control @error('date') is-invalid @enderror" id="exampleInputEmail1" value="{{date("d/m/y")}}" name="date">

                                        </div>
                                        <div class="form-group">

                                            <input type="hidden" class="form-control @error('year') is-invalid @enderror" id="exampleInputEmail1" value="{{date("Y")}}" name="year">

                                        </div>
                                        <div class="form-group">

                                            <input type="hidden" class="form-control @error('month') is-invalid @enderror" id="exampleInputEmail1" value="{{date("F")}}" name="month">

                                        </div>



                                </div>
                                <button type="submit" class="btn btn-purple waves-effect waves-light pull-right">Submit</button>
                                </div>
                            </form>
                        </div><!-- panel-body -->
                    </div> <!-- panel -->
                </div> <!-- end col -->
            </div> <!-- End row -->
        </div> <!-- container -->
    </div> <!-- content -->
@endsection
