@extends('layouts.app')
@section('order','active')
@section('content')
    <div class="content">
        <div class="container" id="mySelector">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <!-- <div class="panel-heading">
                            <h4>Invoice</h4>
                        </div> -->
                        <div class="panel-body">
                            <div class="clearfix">
                                <div class="pull-left">
                                    <h4 class="text-right"><img src="{{asset('backend/images/logo_dark.png')}}" alt="velonic"></h4>

                                </div>
                                <div class="pull-right">
                                    <h4>Invoice # <br>
                                        <strong>{{date("d-m-Y")}}</strong>
                                    </h4>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="pull-left m-t-30">
                                        <address>
                                            <b>Name:</b>  <span>{{$order->customer->name}}</span><br>
                                            <b>Shop Name:</b>  <span>{{$order->customer->shopname}}</span><br>
                                            <b>Address: </b> {{$order->customer->address}}<br>
                                            <b>City:</b> {{$order->customer->city}}<br>
                                            <b>phone Number:</b> {{$order->customer->phone}}
                                        </address>
                                    </div>
                                    <div class="pull-right m-t-30">
                                        <p><strong>Order Date: </strong> {{date('d/m/y')}}</p>
                                        <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink">Pending</span></p>
                                        <p class="m-t-10"><strong>Order ID: </strong> #123456</p>
                                    </div>
                                </div>
                            </div>
                            <div class="m-h-50"></div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table m-t-30">
                                            <thead>
                                            <tr><th>Sl No.</th>
                                                <th>Item</th>
                                                <th>Quantity</th>
                                                <th>Unit Cost</th>
                                                <th>Total</th>
                                            </tr></thead>
                                            <tbody>
                                            @php
                                                $s=1;
                                            @endphp
                                            @foreach($order->orderdetails as $content)
                                                <tr>

                                                    <td>{{$s++}}</td>
                                                    <td>{{$content->product->name}}</td>

                                                    <td>{{$content->quantity}}</td>
                                                    <td>{{$content->unit_cost}}</td>
                                                    <td>{{$content->quantity*$content->unit_cost}}</td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="border-radius: 0px;">
                                <div class="col-md-8 m-t-20">
                                    <h2>Payment By : {{$order->payment_status}}</h2>
                                    <h3>Pay: {{$order->pay}}</h3>

                                </div>
                                <div class="col-md-3">
                                    <p class="text-right"><b>Sub-total:</b>{{$order->sub_total}}</p>

                                    <p class="text-right">VAT: {{$order->vat}}</p>
                                    <hr>
                                    <h3 class="text-right">Total {{$order->total}}</h3>
                                </div>
                            </div>
                            <hr>
                            <div class="hidden-print">
                                <div class="pull-right">
                                    <button id="print" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></button>

                                    <a href="{{route('order_approve',$order->id)}}" class="btn btn-primary waves-effect waves-light" >Approve</a>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div> <!-- content -->
    <div id="pay_bill" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title text-info"> Invoice Of - <span class="pull-right">Total: {{Cart::total()}}</span> </h4>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('final.invoice')}}" method="post">
                    @csrf

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Payment</label>
                                    <select name="payment_status" id="" class="form-control">
                                        <option value="HandCash">HadnCash</option>
                                        <option value="Cheque">Cheque</option>
                                        <option value="Due">Due</option>
                                    </select>

                                </div>
                            </div>
{{--                            <input type="hidden" name="customer_id" value="{{$customer->id}}">--}}
{{--                            <input type="hidden" name="order_date" value="{{date("d/m/y")}}">--}}
{{--                            <input type="hidden" name="order_status" value="Pending">--}}
{{--                            <input type="hidden" name="total_products" value="{{Cart::count()}}">--}}
{{--                            <input type="hidden" name="sub_total" value="{{Cart::subtotal()}}">--}}
{{--                            <input type="hidden" name="vat" value="{{Cart::tax()}}">--}}
{{--                            <input type="hidden" name="total" value="{{Cart::total()}}">--}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">PAY</label>
                                    <input type="number" class="form-control" name="pay" placeholder="Pay Amount">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Due</label>
                                    <input type="number" class="form-control" name="due" placeholder="Due Amount">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info waves-effect waves-light">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- /.modal -->

@endsection
@section('custom_script')
    <script>
        $('#print').click(function (){


            $("#mySelector").printThis({
                debug: false,               // show the iframe for debugging
                importCSS: true,            // import parent page css
                importStyle: false,         // import style tags
                printContainer: true,       // print outer container/$.selector
                loadCSS: "",                // path to additional css file - use an array [] for multiple
                pageTitle: "",              // add title to print page
                removeInline: false,        // remove inline styles from print elements
                removeInlineSelector: "*",  // custom selectors to filter inline styles. removeInline must be true
                printDelay: 333,            // variable print delay
                header: null,               // prefix to html
                footer: null,               // postfix to html
                base: false,                // preserve the BASE tag or accept a string for the URL
                formValues: true,           // preserve input/form values
                canvas: false,              // copy canvas content
                doctypeString: '...',       // enter a different doctype for older markup
                removeScripts: false,       // remove script tags from print content
                copyTagClasses: false,      // copy classes from the html & body tag
                beforePrintEvent: null,     // function for printEvent in iframe
                beforePrint: null,          // function called before iframe is filled
                afterPrint: null            // function called before iframe is removed
            });
        })
    </script>
@endsection
