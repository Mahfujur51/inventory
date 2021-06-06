@extends('layouts.app')
@section('product','active')
@section('content')
    <div class="content">
        <div class="container">

            <!-- ============================================================== -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="bg-picture text-center" style="background-image:url('{{asset('backend/images/big/bg.jpg')}}')">
                                    <div class="bg-picture-overlay"></div>
                                    <div class="profile-info-name">
                                        <img src="{{asset('product/'.$product->image)}}" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
                                        <h3 class="text-white">{{$product->name}}</h3>
                                    </div>
                                </div>
                                <!--/ meta -->
                            </div>
                        </div>
                        <div class="row user-tabs">
                            <div class="col-lg-6 col-md-9 col-sm-9">
                                <ul class="nav nav-tabs tabs">
                                    <li class="active tab">
                                        <a href="#home-2" data-toggle="tab" aria-expanded="false" class="active">
                                            <span class="visible-xs"><i class="fa fa-home"></i></span>
                                            <span class="hidden-xs">About Product</span>
                                        </a>
                                    </li>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="tab-content profile-tab-content">
                                    <div class="tab-pane active" id="home-2">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <!-- Personal-Information -->
                                                <div class="panel panel-default panel-fill">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Personal Information</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="about-info-p">
                                                            <strong>Full Name</strong>
                                                            <br/>
                                                            <p class="text-muted">{{$product->name}}</p>
                                                        </div>
                                                        <div class="about-info-p">
                                                            <strong>Mobile</strong>
                                                            <br/>
                                                            <p class="text-muted">{{$product->product_code}}</p>
                                                        </div>
                                                        <div class="about-info-p">
                                                            <strong>Category</strong>
                                                            <br/>
                                                            <p class="text-muted">{{$product->category->name}}</p>
                                                        </div>
                                                        <div class="about-info-p m-b-0">
                                                            <strong>Supplier</strong>
                                                            <br/>
                                                            <p class="text-muted">{{$product->supplier->name}}</p>
                                                        </div>
                                                        <div class="about-info-p m-b-0">
                                                            <strong>Product ROute</strong>
                                                            <br/>
                                                            <p class="text-muted">{{$product->product_route}}</p>
                                                        </div>
                                                        <div class="about-info-p m-b-0">
                                                            <strong>Product Buy Date</strong>
                                                            <br/>
                                                            <p class="text-muted">{{$product->buying_price}}</p>
                                                        </div>
                                                        <div class="about-info-p m-b-0">
                                                            <strong>Product Selleing </strong>
                                                            <br/>
                                                            <p class="text-muted">{{$product->selling_price}}</p>
                                                        </div>
                                                        <div class="about-info-p m-b-0">
                                                            <strong>Product Palace </strong>
                                                            <br/>
                                                            <p class="text-muted">{{$product->product_place}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Personal-Information -->

                                            </div>


                                            <div class="col-md-8">
                                                <!-- Personal-Information -->
                                                <div class="panel panel-default panel-fill">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Biography</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>

                                                        <p><strong>But also the leap into electronic typesetting, remaining essentially unchanged.</strong></p>

                                                        <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                                    </div>
                                                </div>
                                                <!-- Personal-Information -->

                                                <div class="panel panel-default panel-fill">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Skills</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="m-b-15">
                                                            <h5>Angular Js <span class="pull-right">60%</span></h5>
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-primary wow animated progress-animated" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                                                    <span class="sr-only">60% Complete</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="m-b-15">
                                                            <h5>Javascript <span class="pull-right">90%</span></h5>
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-pink wow animated progress-animated" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
                                                                    <span class="sr-only">90% Complete</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="m-b-15">
                                                            <h5>Wordpress <span class="pull-right">80%</span></h5>
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-purple wow animated progress-animated" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
                                                                    <span class="sr-only">80% Complete</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="m-b-0">
                                                            <h5>HTML5 &amp; CSS3 <span class="pull-right">95%</span></h5>
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-info wow animated progress-animated" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%;">
                                                                    <span class="sr-only">95% Complete</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

            <!-- ============================================================== -->


        </div>
    </div>
@endsection
