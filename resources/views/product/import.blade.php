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
                        <div class="panel-heading panel-color"><h3 class="panel-title ">Add Import <a href="{{route('export')}}" class="btn btn-danger btn-sm pull-right">Export Excel</a></h3></div>
                        <div class="panel-body">
                            <form role="form" method="post" action="{{route('insert.import')}}"  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Excel FILE</label>
                                            <input type="file" class="form-control @error('import_file') is-invalid @enderror"  name="import_file">
                                            @error('import_file')
                                            <span class="invalid-feedback " role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <button type="submit" class="btn btn-purple waves-effect waves-light pull-right">Import File</button>
                            </form>
                        </div><!-- panel-body -->
                    </div> <!-- panel -->
                </div> <!-- end col -->
            </div> <!-- End row -->
        </div> <!-- container -->
    </div> <!-- content -->
@endsection
