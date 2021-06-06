@extends('layouts.app')
@section('product','active')
@section('content')
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Welcome ! to Product Page</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{route('home')}}">Moltran</a></li>
                        <li class="active">Product</li>
                    </ol>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading panel-color"><h3 class="panel-title text-center">Add Product</h3></div>
                        <div class="panel-body">
                            <form role="form" method="post" action="{{route('product.store')}}"  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter Name" name="name">
                                            @error('name')
                                            <span class="invalid-feedback " role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Category</label>
                                            <select name="category_id"  class="form-control @error('category_id') is-invalid @enderror">
                                                <option>Please Select Option</option>
                                                @php
                                                $categories=App\Category::all();

                                                @endphp
                                              @foreach($categories as $key=>$category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                            <span class="invalid-feedback " role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Supplier</label>
                                            <select name="supplier_id"  class="form-control @error('supplier_id') is-invalid @enderror">
                                                <option>Please Select Supplier</option>
                                                @php
                                                    $suppliers=App\Supplier::all();

                                                @endphp
                                                @foreach($suppliers as $key=>$supplier)
                                                    <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('supplier_id')
                                            <span class="invalid-feedback " role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Product Code</label>
                                            <input type="text" class="form-control @error('product_code') is-invalid @enderror" id="exampleInputPassword1" placeholder="Enter Product Code" name="product_code">
                                            @error('product_code')
                                            <span class="invalid-feedback " role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Product Place</label>
                                            <input type="text" class="form-control @error('product_place') is-invalid @enderror" id="exampleInputPassword1" placeholder="Enter product Place" name="product_place">
                                            @error('product_place')
                                            <span class="invalid-feedback " role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Product Route</label>
                                            <input type="text" class="form-control @error('product_route') is-invalid @enderror" id="exampleInputPassword1" placeholder="Enter Product Route" name="product_route">
                                            @error('product_route')
                                            <span class="invalid-feedback " role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Buying  Date</label>
                                            <input type="date" class="form-control @error('buy_date') is-invalid  @enderror" id="exampleInputPassword1" placeholder="Enter Buying date" name="buy_date">
                                            @error('buy_date')
                                            <span class="invalid-feedback " role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Expire Date</label>
                                            <input type="date" class="form-control @error('expire_date') is-invalid @enderror" placeholder="Enter Expire Date" name="expire_date">
                                        @error('expire_date')
                                                <span class="invalid-feedback " role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                       @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Buying Price</label>
                                            <input type="number" class="form-control @error('buying_price') is-invalid @enderror" placeholder=" Buying Price " name="buying_price">
                                            @error('buying_price')
                                            <span class="invalid-feedback " role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">selling Price</label>
                                            <input type="number" class="form-control @error('selling_price') is-invalid @enderror" id="exampleInputPassword1" placeholder="Enter Selling" name="city">
                                            @error('selling_price')
                                            <span class="invalid-feedback " role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="">Upload Image</label>
                                            <input type="file" class="form-control-file @error('photo') is-invalid @enderror" name="image" oninput="pic.src=window.URL.createObjectURL(this.files[0])" >
                                            <img id="pic"  height="100px" width="100px"  alt="image preview"/>

                                            @error('image')
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
