@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Welcome ! to Product  Page</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{route('home')}}">Moltran</a></li>
                        <li class="active">Product </li>
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
                                            <th>Picture</th>
                                            <th>Code</th>
                                            <th>Selling</th>
                                            <th>Expire Date</th>

                                            <th>Product Route</th>
                                            <th>Product palce</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                        @foreach($products as $key=>$product)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$product->name}}</td>
                                            <td><img src="{{asset('product/'.$product->image)}}" alt="" width="100" height="100"></td>
                                            <td>{{$product->product_code}}</td>
                                            <td>{{$product->selling_price}}</td>
                                            <td>{{$product->expire_date}}</td>
                                            <td>{{$product->product_route}}</td>
                                            <td>{{$product->product_place}}</td>
                                            <td>
                                                <a href="{{route('view.product',$product->id)}}" class="btn btn-primary btn-sm"><i class="ion-eye"></i></a>
                                                <a href="{{route('delete.product',$product->id)}}" class="btn btn-danger btn-sm" id="delete"><i class="ion-trash-b"></i></a>
                                                <a href="{{route('edit.product',$product->id)}}" class="btn btn-success btn-sm"><i class="ion-compose"></i></a>
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
