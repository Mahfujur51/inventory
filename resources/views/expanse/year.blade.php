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
                <div class="col-md-12">
                    <h2 class="text-danger text-center">Today: {{$sum}}</h2>
                </div>
            </div>



            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title ">Show ALl Expanse  </h3>
                            <h3 class="pull-right">
                                <a href="{{route('today.expanse')}}" class="btn btn-warning">Today</a>
                                <a href="{{route('month.expanse')}}" class="btn btn-success">This Month</a>
                                <a href="{{route('year.expanse')}}" class="btn btn-info">This Year</a>
                            </h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Details</th>
                                            <th>Month</th>
                                            <th>Date</th>
                                            <th>Year</th>
                                            <th>Amount</th>
                                            <th>Action</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($expanses as $key=>$expanse)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$expanse->details}}</td>

                                                <td>{{$expanse->month}}</td>
                                                <td>{{$expanse->date}}</td>
                                                <td>{{$expanse->year}}</td>
                                                <td>{{$expanse->amount}}</td>
                                                <td>
                                                    <a href="{{route('delete.expanse',$expanse->id)}}" class="btn btn-danger btn-sm" id="delete"><i class="ion-trash-b"></i></a>
                                                    <a href="{{route('edit.expanse',$expanse->id)}}" class="btn btn-success btn-sm"><i class="ion-compose"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="5"><b>Total Expanse:</b> </td>
                                            <td >{{$sum}}</td>
                                        </tr>

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
