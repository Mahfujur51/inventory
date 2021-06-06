<!-- ========== Left Sidebar Start ========== -->

<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div class="user-details">
            <div class="pull-left">
                <img src="{{asset('backend/')}}/images/users/avatar-1.jpg" alt="" class="thumb-md img-circle">
            </div>
            <div class="user-info">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{Auth::user()->name}} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile<div class="ripple-wrapper"></div></a></li>
                        <li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
                        <li><a href="javascript:void(0)"><i class="md md-settings-power"></i> Logout</a></li>
                    </ul>
                </div>

                <p class="text-muted m-0">Administrator</p>
            </div>
        </div>
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="{{route('home')}}" class="waves-effect"><i class="md md-home"></i><span> Dashboard </span></a>
                </li>
                <li>
                    <a href="{{route('pos')}}" class="waves-effect @yield('pos')"><i class="md md-home"></i><span>Point Of Sell(POS) </span></a>
                </li>

                <li class="has_sub">
                    <a href="#" class="waves-effect  @yield('employee') " ><i class="md-account-child "></i><span> Employee </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('employee.index')}}" class="@yield('employee')">All Employee</a></li>
                        <li><a href="{{route('employee.add')}}" class="@yield('employee')">Add New</a></li>

                    </ul>
                </li>
                <li class="has_sub">
                    <a href="#" class="waves-effect @yield('order')"><i class="ion-briefcase"></i><span> Order </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('order.pending')}}" class="@yield('order')" >Pending Order</a></li>
                        <li><a href="{{route('order.confirm')}}" class="@yield('order')">Confirm Order</a></li>

                    </ul>
                </li>
                <li class="has_sub">
                    <a href="#" class="waves-effect @yield('customer')"><i class="ion-ios7-personadd"></i><span> Customer </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('customer.index')}}" class="@yield('customer')">All Customer</a></li>
                        <li><a href="{{route('customer.add')}}" class="@yield('customer')">Add New</a></li>

                    </ul>
                </li>
                <li class="has_sub">
                    <a href="#" class="waves-effect @yield('supplier')"><i class="ion-android-storage"></i><span> Supplier </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('supplier.index')}}" class="@yield('supplier')">All Supplier</a></li>
                        <li><a href="{{route('supplier.add')}}" class="@yield('supplier')">Add New</a></li>

                    </ul>
                </li>
                <li class="has_sub">
                    <a href="#" class="waves-effect @yield('salary')"><i class="ion-arrow-graph-up-right"></i><span> Employee Salary </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('salary.index')}}"  class="@yield('salary')">All salary(EMP)</a></li>
                        <li><a href="{{route('salary.add')}}" class="@yield('salary')">Add Advance  Salary</a></li>
                        <li><a href="{{route('pay_salary.index')}}" class="@yield('salary')">Pay Salary</a></li>
                        <li><a href="{{route('salary.add')}}" class="@yield('salary')">Last Month Salary</a></li>

                    </ul>
                </li>
                <li class="has_sub">
                    <a href="#" class="waves-effect @yield('category')"><i class="ion-plus-circled"></i><span> Category </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('category.index')}}" class="@yield('category')">All Category</a></li>
                        <li><a href="{{route('category.add')}}" class="@yield('category')">Add New</a></li>

                    </ul>
                </li>
                <li class="has_sub">
                    <a href="#" class="waves-effect @yield('product')"><i class="ion-outlet"></i><span> Product </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('product.index')}}" class="@yield('product')">All Product</a></li>
                        <li><a href="{{route('product.add')}}" class="@yield('product')">Add New</a></li>
                        <li><a href="{{route('import.excel')}}" class="@yield('product')">Import & Export</a></li>

                    </ul>
                </li>
                <li class="has_sub">
                    <a href="#" class="waves-effect @yield('expanse')"><i class="ion-cash"></i><span> Expanse </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('expanse.index')}}"  class="@yield('expanse')">All Expanse</a></li>
                        <li><a href="{{route('expanse.add')}}"  class="@yield('expanse')">Add New</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="#" class="waves-effect @yield('report')"><i class="ion-printer"></i><span> Sales Report </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('expanse.index')}}">All Sells </a></li>
                        <li><a href="{{route('expanse.add')}}">Add New</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="#" class="waves-effect @yield('attendance')"><i class="ion-arrow-shrink"></i><span> Attendance </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('attendance.index')}}" class="@yield('attendance')">All attendance  </a></li>
                        <li><a href="{{route('attendance.add')}}" class="@yield('attendance')">Take Attendance </a></li>
                    </ul>
                </li>

            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- Left Sidebar End -->
