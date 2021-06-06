@extends('layouts.app')
@section('order','active')
@section('content')
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Welcome ! to Pending order  Page</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{route('home')}}">Dashboard</a></li>
                        <li class="active">Pending </li>
                    </ol>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title ">Show ALl Product <a href="{{route('export')}}" class="btn btn-success btn-sm pull-right">Export</a> </h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Quantity</th>
                                            <th>Total Amount</th>
                                            <th>Payment</th>
                                            <th>Order Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                        @foreach($confirm_order as $key=>$order)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$order->customer->name}}</td>
                                                <td>{{$order->order_date}}</td>
                                                <td>{{$order->total_products}}</td>
                                                <td>{{$order->total}}</td>
                                                <td>{{$order->payment_status}}</td>
                                                <td>{{$order->order_status}}</td>
                                                <td>
                                                    <a href="{{route('view.order',$order->id)}}" class="btn btn-primary btn-sm"><i class="ion-eye"></i></a>
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
