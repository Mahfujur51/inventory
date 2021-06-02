@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Welcome ! to Category Page</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{route('home')}}">Moltran</a></li>
                        <li class="active">Category</li>
                    </ol>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading panel-color"><h3 class="panel-title text-center">Edit Category</h3></div>
                        <div class="panel-body">
                            <form role="form" method="post" action="{{route('expanse.update',$expanse->id)}}"  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Details</label>
                                            <input type="text" class="form-control @error('details') is-invalid @enderror" id="exampleInputEmail1" value="{{$expanse->details}}" name="details">
                                            @error('details')
                                            <span class="invalid-feedback " role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                     <div class="form-group">
                                            <label for="exampleInputEmail1">Amount</label>
                                            <input type="number" class="form-control @error('amount') is-invalid @enderror" id="exampleInputEmail1" value="{{$expanse->amount}}" name="amount">
                                            @error('amount')
                                            <span class="invalid-feedback " role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                            @enderror
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
