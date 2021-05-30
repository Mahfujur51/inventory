<!-- ========== Left Sidebar Start ========== -->

<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div class="user-details">
            <div class="pull-left">
                <img src="{{asset('backend/')}}/images/users/avatar-1.jpg" alt="" class="thumb-md img-circle">
            </div>
            <div class="user-info">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">John Doe <span class="caret"></span></a>
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
                    <a href="{{route('home')}}" class="waves-effect active"><i class="md md-home"></i><span> Dashboard </span></a>
                </li>

                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class=" md-account-child"></i><span> Employee </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('employee.index')}}">All Employee</a></li>
                        <li><a href="{{route('employee.add')}}">Add New</a></li>

                    </ul>
                </li>
                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class=" md-account-child"></i><span> Customer </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('customer.index')}}">All Customer</a></li>
                        <li><a href="{{route('customer.add')}}">Add New</a></li>

                    </ul>
                </li>
                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class=" md-account-child"></i><span> Supplier </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('supplier.index')}}">All Supplier</a></li>
                        <li><a href="{{route('supplier.add')}}">Add New</a></li>

                    </ul>
                </li>



                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="md md-share"></i><span>Multi Level </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul>
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><span>Menu Level 1.1</span> <span class="pull-right"><i class="md md-add"></i></span></a>
                            <ul style="">
                                <li><a href="javascript:void(0);"><span>Menu Level 2.1</span></a></li>
                                <li><a href="javascript:void(0);"><span>Menu Level 2.2</span></a></li>
                                <li><a href="javascript:void(0);"><span>Menu Level 2.3</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><span>Menu Level 1.2</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- Left Sidebar End -->
