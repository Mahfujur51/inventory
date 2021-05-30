@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Welcome ! to Customer Page</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{route('home')}}">Dashboard</a></li>
                        <li class="active">Customer</li>
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
                                            <th>Action</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                        @foreach($customers as $key=>$customer)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$customer->name}}</td>
                                            <td><img src="{{asset('customer/'.$customer->photo)}}" alt="" width="100" height="100"></td>
                                            <td>{{$customer->shopname}}</td>
                                            <td>{{$customer->phone}}</td>
                                            <td>{{$customer->bank_name}}</td>
                                            <td>
                                                <a href="{{route('view.customer',$customer->id)}}" class="btn btn-primary btn-sm"><i class="ion-eye"></i></a>
                                                <a href="{{route('delete.customer',$customer->id)}}" class="btn btn-danger btn-sm" id="delete"><i class="ion-trash-b"></i></a>
                                                <a href="{{route('edit.customer',$customer->id)}}" class="btn btn-success btn-sm"><i class="ion-compose"></i></a>
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
