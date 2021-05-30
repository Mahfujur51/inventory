@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Welcome ! to Supplier Page</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{route('home')}}">Dashboard</a></li>
                        <li class="active">Supplier</li>
                    </ol>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title ">Show ALl Supplier</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Name</th>
                                            <th>Picture</th>
                                            <th>Shop Name</th>
                                            <th>Phone</th>
                                            <th>Bank name</th>
                                            <th>Type</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                        @foreach($suppliers as $key=>$supplier)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$supplier->name}}</td>
                                            <td><img src="{{asset('supplier/'.$supplier->photo)}}" alt="" width="100" height="100"></td>
                                            <td>{{$supplier->shopname}}</td>
                                            <td>{{$supplier->phone}}</td>
                                            <td>{{$supplier->bank_name}}</td>
                                            <td><span class="badge badge-danger">{{$supplier->type}}</span></td>
                                            <td>
                                                <a href="{{route('view.supplier',$supplier->id)}}" class="btn btn-primary btn-sm"><i class="ion-eye"></i></a>
                                                <a href="{{route('delete.supplier',$supplier->id)}}" class="btn btn-danger btn-sm" id="delete"><i class="ion-trash-b"></i></a>
                                                <a href="{{route('edit.supplier',$supplier->id)}}" class="btn btn-success btn-sm"><i class="ion-compose"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- End Row -->
        </div> <!-- container -->
    </div> <!-- content -->
@endsection
