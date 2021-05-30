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
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading panel-color"><h3 class="panel-title text-center">Edit Customer</h3></div>
                        <div class="panel-body">
                            <form role="form" method="post" action="{{route('customer.update',$customer->id)}}"  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" value="{{$customer->name}}" name="name">
                                            @error('name')
                                            <span class="invalid-feedback " role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputPassword1" value="{{$customer->email}}" name="email">
                                            @error('email')
                                            <span class="invalid-feedback " role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Phone</label>
                                            <input type="number" class="form-control @error('phone') is-invalid @enderror" id="exampleInputPassword1" value="{{$customer->phone}}" name="phone">
                                            @error('phone')
                                            <span class="invalid-feedback " role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Address</label>
                                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="exampleInputPassword1" value="{{$customer->address}}" name="address">
                                            @error('address')
                                            <span class="invalid-feedback " role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="">Upload Image</label>
                                            <input type="file" class="form-control-file @error('photo') is-invalid @enderror" name="photo" oninput="pic.src=window.URL.createObjectURL(this.files[0])" >
                                            <img id="pic" src="{{asset('customer/'.$customer->photo)}}"  height="100px" width="100px"  alt="image preview"/>

                                            @error('photo')
                                            <span class="invalid-feedback " role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Shop Name</label>
                                            <input type="text" class="form-control @error('shopname') is-invalid @enderror" id="exampleInputPassword1" value="{{$customer->shopname}}" name="shopname">
                                            @error('shopname')
                                            <span class="invalid-feedback " role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Bank name</label>
                                            <input type="text" class="form-control @error('bank_name') is-invalid  @enderror" id="exampleInputPassword1" value="{{$customer->bank_name}}" name="bank_name">
                                            @error('bank_name')
                                            <span class="invalid-feedback " role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Account Holder</label>
                                            <input type="text" class="form-control @error('account_holder') is-invalid  @enderror" id="exampleInputPassword1" value="{{$customer->account_holder}}" name="account_holder">
                                            @error('account_holder')
                                            <span class="invalid-feedback " role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Account Number</label>
                                            <input type="number" class="form-control @error('account_number') is-invalid @enderror" value="{{$customer->account_number}}" name="account_number">
                                            @error('account_number')
                                            <span class="invalid-feedback " role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Bank Branch</label>
                                            <input type="text" class="form-control @error('bank_branch') is-invalid @enderror" id="exampleInputPassword1" value="{{$customer->bank_branch}}" name="bank_branch">
                                            @error('bank_branch')
                                            <span class="invalid-feedback " role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">City</label>
                                            <input type="text" class="form-control @error('city') is-invalid @enderror" id="exampleInputPassword1" value="{{$customer->city}}" name="city">
                                            @error('city')
                                            <span class="invalid-feedback " role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-purple waves-effect waves-light pull-right">Update</button>
                            </form>
                        </div><!-- panel-body -->
                    </div> <!-- panel -->
                </div> <!-- end col -->
            </div> <!-- End row -->
        </div> <!-- container -->
    </div> <!-- content -->
@endsection
