@extends('layouts.app')
@section('pos','active')
@section('content')
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title ">Point Of Sell</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    @foreach($categories as $category)
                                    <button type="button" class="btn btn-warning waves-effect waves-light m-b-5">{{$category->name}}</button>
                                    @endforeach
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            <h3 class="panel-title text-white"> Customer  <button class="btn btn-success waves-effect waves-light pull-right" data-toggle="modal" data-target=".bs-example-modal-lg">Add Customer</button></h3>

                                        </div>
                                        <div class="panel-body">

                                            <div class="price_card text-center">

                                                <ul class="price-features">
                                                  <table class="table">
                                                      <thead>
                                                      <tr>
                                                          <th>Name</th>
                                                          <th>Qty</th>

                                                          <th>Unit price</th>
                                                          <th>Sub Total</th>
                                                          <th>Delete</th>
                                                      </tr>
                                                      </thead>
                                                      <tbody>
                                                      @php
                                                          $cart_products=Cart::content();

                                                      @endphp
                                                      @foreach($cart_products as $cproduct)
                                                      <tr>
                                                          <td>{{$cproduct->name}}</td>
                                                          <td class="float-left">
                                                              <form action="{{route('cart_update',$cproduct->rowId)}}" method="post">
                                                                  @csrf
                                                                  <input type="number" style="width: 40px" value="{{$cproduct->qty}}" name="qty">
                                                                  <button type="submit" class="btn btn-success btn-sm" style="margin-top:-2px"><i class="ion-android-checkmark"></i></button>
                                                              </form>
                                                          </td>

                                                          <td>{{$cproduct->price}}</td>
                                                          <td>{{$cproduct->price*$cproduct->qty}}</td>

                                                          <td><a href="{{route('cart.remove',$cproduct->rowId)}}" class="btn btn-danger btn-sm"> <i class="ion-trash-a"></i></a></td>
                                                      </tr>
                                                      @endforeach
                                                      </tbody>

                                                  </table>

                                                </ul>
                                                <div class="pricing-footer bg-primary">
                                                    <p style="font-size:20px">Quantity: {{Cart::count()}}</p>
                                                    <p style="font-size:20px">Subtotal: {{Cart::subtotal()}}</p>

                                                    <p  style="font-size:20px">Vat: {{Cart::tax()}}</p>
                                                    <hr>
                                                    <h3 >Total: </h3>
                                                    <h2 class="text-white">{{Cart::total()}}</h2>

                                                </div>
                                                <form action="{{route('invoice')}}" method="post">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="">Select Customer</label>
                                                        <select class="form-control @error('customer_id') is-invalid @enderror" name="customer_id">
                                                            <option disabled="" selected=""  >Select Customer</option>
                                                            @foreach($customers as $customer)
                                                                <option  value="{{$customer->id}}">{{$customer->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('customer_id')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror

                                                    </div>

                                                    <button type="submit" class="btn btn-success"> Create Invoice</button>
                                                </form>


                                            </div> <!-- end Pricing_card -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Name</th>
                                            <th>Picture</th>
                                            <th>Code</th>
                                            <th>Selling</th>

                                            <th>Add Action</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                        @foreach($products as $key=>$product)
                                            <tr>
                                                <form action="{{route('add_cart')}}" method="post">
                                                    @csrf
                                                <td>{{$key+1}}</td>
                                                <td>{{$product->name}}</td>
                                                <td><img src="{{asset('product/'.$product->image)}}" alt="" width="100" height="100"></td>
                                                <td>{{$product->product_code}}</td>
                                                <td>{{$product->selling_price}}</td>
                                                    <input type="hidden" value="{{$product->id}}" name="id">
                                                    <input type="hidden" value="1" name="qty">
                                                    <input type="hidden" value="{{$product->name}}" name="name">
                                                    <input type="hidden" value="{{$product->selling_price}}" name="selling_price">

                                                <td>
                                                    <button type="submit" class="btn btn-success btn-sm"><i class="ion-ios7-cart"></i></button>
                                                </td>
                                                </form>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- container -->
            <!--  Modal content for the above example -->
            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                        </div>
                        <div class="modal-body">
                          <div class="panel">
                              <div class="panel-body">
                                  <form role="form" method="post" action="{{route('customer.store.pos')}}"  enctype="multipart/form-data">
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
                                                  <label for="exampleInputPassword1">Email</label>
                                                  <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputPassword1" placeholder="Enter Email" name="email">
                                                  @error('email')
                                                  <span class="invalid-feedback " role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                                  @enderror
                                              </div>
                                              <div class="form-group">
                                                  <label for="exampleInputPassword1">Phone</label>
                                                  <input type="number" class="form-control @error('phone') is-invalid @enderror" id="exampleInputPassword1" placeholder="Enter Phone Number" name="phone">
                                                  @error('phone')
                                                  <span class="invalid-feedback " role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                                  @enderror
                                              </div>
                                              <div class="form-group">
                                                  <label for="exampleInputPassword1">Address</label>
                                                  <input type="text" class="form-control @error('address') is-invalid @enderror" id="exampleInputPassword1" placeholder="Enter Address" name="address">
                                                  @error('address')
                                                  <span class="invalid-feedback " role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                                  @enderror
                                              </div>

                                              <div class="form-group">
                                                  <label for="">Upload Image</label>
                                                  <input type="file" class="form-control-file @error('photo') is-invalid @enderror" name="photo" oninput="pic.src=window.URL.createObjectURL(this.files[0])" >
                                                  <img id="pic"  height="100px" width="100px"  alt="image preview"/>

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
                                                  <input type="text" class="form-control @error('shopname') is-invalid @enderror" id="exampleInputPassword1" placeholder="Enter shopname" name="shopname">
                                                  @error('shopname')
                                                  <span class="invalid-feedback " role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                                  @enderror
                                              </div>
                                              <div class="form-group">
                                                  <label for="exampleInputPassword1">Bank name</label>
                                                  <input type="text" class="form-control @error('bank_name') is-invalid  @enderror" id="exampleInputPassword1" placeholder="Enter Bank Name" name="bank_name">
                                                  @error('bank_name')
                                                  <span class="invalid-feedback " role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                                  @enderror
                                              </div>
                                              <div class="form-group">
                                                  <label for="exampleInputPassword1">Account Holder</label>
                                                  <input type="text" class="form-control @error('account_holder') is-invalid  @enderror" id="exampleInputPassword1" placeholder="Enter Account Holder Name" name="account_holder">
                                                  @error('account_holder')
                                                  <span class="invalid-feedback " role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                                  @enderror
                                              </div>
                                              <div class="form-group">
                                                  <label for="exampleInputPassword1">Account Number</label>
                                                  <input type="number" class="form-control @error('account_number') is-invalid @enderror" placeholder="Enter Account Number" name="account_number">
                                                  @error('account_number')
                                                  <span class="invalid-feedback " role="alert">
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                </span>
                                                  @enderror
                                              </div>

                                              <div class="form-group">
                                                  <label for="exampleInputPassword1">Bank Branch</label>
                                                  <input type="text" class="form-control @error('bank_branch') is-invalid @enderror" id="exampleInputPassword1" placeholder="Enter Bank Branch" name="bank_branch">
                                                  @error('bank_branch')
                                                  <span class="invalid-feedback " role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                                  @enderror
                                              </div>
                                              <div class="form-group">
                                                  <label for="exampleInputPassword1">City</label>
                                                  <input type="text" class="form-control @error('city') is-invalid @enderror" id="exampleInputPassword1" placeholder="Enter City" name="city">
                                                  @error('city')
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
                          </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

    </div> <!-- content -->
@endsection
