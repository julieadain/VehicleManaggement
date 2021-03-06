<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Vehicle Management</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">

    <!-- Morris chart -->
    <link rel="stylesheet" href="{{ asset('bower_components/morris.js/morris.css') }}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('bower_components/jvectormap/jquery-jvectormap.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <!-- Date Picker -->
    <link rel="stylesheet"
          href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/custom.css') }}">
{{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">--}}
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{'https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js'}}"></script>
    <script src="{{'https://oss.maxcdn.com/respond/1.4.2/respond.min.js'}}"></script>
    <![endif]-->
{{--<style>
    .btn-file {
        display: block;
        height: 20px;
        overflow: hidden;
        position: relative;
        vertical-align: middle;
        width: 120px;
    }


    .btn-file > input {
        cursor: pointer;
        direction: ltr;
        font-size: 23px;
        margin: 0;
        opacity: 0;
        position: absolute;
        right: 0;
        top: 0;
        transform: translate(-300px, 0px) scale(4);
    }

    input[type="file"] {
        display: block;
    }
</style>--}}
<!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="{{url('/home')}}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Vehicle management</b></span>
        </a>


        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <!-- Menu Body -->

                <ul class="nav navbar-nav">
                    @admin
                    @if(\App\Payment::where('org_id', \Illuminate\Support\Facades\Auth::user()->org_id)->where('status', '0')->where('date', '<=', date('Y-m-d', strtotime('+ 7days')))->first())
                        <li class="dropdown notifications-menu">
                            <a href="{{url('/paymentRequestView')}}" class="dropdown-toggle">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-warning">1</span>
                            </a>
                        </li>
                    @endif
                    @endadmin
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{asset('upload').'/'.\Illuminate\Support\Facades\Auth::user()->organization->logo}}" class="user-image" alt="logo">
                            <span class="hidden-xs">{{auth()->user()->name}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{asset('upload').'/'.\Illuminate\Support\Facades\Auth::user()->organization->logo}}" class="img-circle"
                                     alt="User Image">
                                <p>
                                    {{auth()->user()->name}} - {{auth()->user()->status}}
                                    <small>Member since
                                        - {{date('d M Y', strtotime(auth()->user()->created_at)) }}</small>
                                </p>

                            </li>

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{url('profile')}}" class="btn btn-default btn-flat">Profile</a>
                                </div>

                                <div class="pull-right">
                                    <form action="{{route('logout')}}" role="presentation" id="logout-form"
                                          method="post">
                                        @csrf
                                        <a href="#" class="btn btn-default btn-flat"
                                           onclick="document.getElementById('logout-form').submit()">Log out</a>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>

                    <!-- Control Sidebar Toggle Button -->
                </ul>
            </div>
        </nav>
    </header>
<!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                @Super_admin
                <li class="">
                    <a href="{{url('/organization')}}">
                        <i class="fa fa-dashboard"></i> <span>Organizations</span>
                    </a>
                </li>
                @endSuper_admin
                @if( session('org_info') )
                    <?php $org_info = session('org_info')  ?>

                    <div class="user-panel">

                        <div class="pull-left image">
                            <img src="{{asset('upload').'/'.session('org_info')->logo}}" class="img-circle" alt="logo">
                        </div>

                        <div class="pull-left info">
                            <p>{{ $org_info->org_name }}</p>
                            <a href="#"><i class="fa fa-circle "></i> {{ $org_info->owner->name }}</a>
                        </div>
                    </div>
                        <span class="pull-right-container clearfix" >
              <span class="label label-danger pull-right "><a href="{{ url('/unset') }}"> Close <span
                              class="fa fa-close"> </span></a></span>
            </span>

            @endif

            @if( auth()->user()->role == 2 || session('org_info'))
                <!-- sidebar menu: : style can be found in sidebar.less -->
                    <li class="">
                        <a href="{{url('/home')}}">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    @admin
                    <li class="">
                        <a href="{{url('/manager')}}">
                            <i class="fa fa-dashboard"></i> <span>Manage user</span>
                        </a>
                    </li>
                    @endadmin

                    <li class="treeview">
                        <a href="{{ url('') }}">
                            <i class="fa fa-car"></i>
                            <span>Vehicles</span>
                            <span class="pull-right-container">
              <span class="label label-primary pull-right">
                  @admin
                  {{ \App\Vehicle::whereOrg_id(\Illuminate\Support\Facades\Auth::user()->org_id)->count() }}
                  @endadmin

                  @Super_admin
                  {{ \App\Vehicle::whereOrg_id(session('org_info')->id)->count() }}
                  @endSuper_admin
              </span>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('vehicle/create') }}"><i class="fa fa-circle-o"></i> Add vehicle</a>
                            </li>
                            <li><a href="{{ url('vehicle/') }}"><i class="fa fa-circle-o"></i> Vehicle's List </a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-male"></i>
                            <span>Drivers</span>
                            <span class="pull-right-container">
                              <span class="label label-primary pull-right">
                                                        @Super_admin
                                                        {{ \App\Driver::whereOrg_id(session('org_info')->id)->count() }}
                                                        @endSuper_admin
                                                        @admin
                                                        {{ \App\Driver::whereOrg_id(\Illuminate\Support\Facades\Auth::User()->org_id)->count() }}
                                                        @endadmin
                              </span>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('driver/create') }}"><i class="fa fa-circle-o"></i> Add driver</a>
                            </li>
                            <li><a href="{{ url('driver') }}"><i class="fa fa-circle-o"></i> Driver's List</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-edit"></i> <span>Clients</span>
                            <span class="pull-right-container">
                                <span class="pull-right-container">
                              <span class="label label-primary pull-right">
                                                        @Super_admin
                                                        {{ \App\Client::whereOrg_id(session('org_info')->id)->count() }}
                                                        @endSuper_admin
                                                        @admin
                                                        {{ \App\Client::whereOrg_id(\Illuminate\Support\Facades\Auth::User()->org_id)->count() }}
                                                        @endadmin
                              </span>
                            </span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{url('client/create')}}"><i class="fa fa-circle-o"></i> Register client</a>
                            </li>
                            <li><a href="{{url('client')}}"><i class="fa fa-circle-o"></i>Client List</a></li>
                            <li>
                                <a href="{{url('activeClient')}}"><i class="fa fa-circle-o"></i>
                                    <span>Active Client</span>
                                    <span class="pull-right-container">
                                        <small class="label pull-right bg-blue-active">
                                                            @Super_admin
                                                            {{ \App\Client::where('org_id', session('org_info')->id)->whereStatus(1)->where('status','1')->count() }}
                                                            @endSuper_admin
                                                            @admin
                                                            {{ \App\Client::where('org_id', \Illuminate\Support\Facades\Auth::User()->org_id)->where('status','1')->count() }}
                                                            @endadmin
                                        </small>
                                    </span>
                                </a>
                            </li>
                            <li><a href="{{url('clientHistory')}}"><i class="fa fa-circle-o"></i> Client's history</a>
                            </li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-edit"></i> <span>Reservation</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="{{url("reservation")}}"><i class="fa fa-circle-o"></i> Pending Reservation
                                    <span class="pull-right-container">
                                    <small class="label pull-right bg-blue-active">
                                        @Super_admin
                                            {{ \App\Reservation::where('org_id', session('org_info')->id)->where('status','0')->count() }}
                                            @endSuper_admin
                                            @admin
                                            {{ \App\Reservation::where('org_id', \Illuminate\Support\Facades\Auth::User()->org_id)->where('status','0')->count() }}
                                        @endadmin
                                    </small>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url("currentReservation")}}"><i class="fa fa-circle-o"></i> <span>Running Reservation</span>
                                    <span class="pull-right-container">
                                    <small class="label pull-right bg-blue-active">
                                        @Super_admin
                                            {{ \App\Reservation::where('org_id', session('org_info')->id)->where('status','1')->count() }}
                                            @endSuper_admin
                                            @admin
                                            {{ \App\Reservation::where('org_id', \Illuminate\Support\Facades\Auth::User()->org_id)->where('status','1')->count() }}
                                        @endadmin
                                    </small>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url("/history")}}"><i class="fa fa-circle-o"></i> <span> Completed Reservation</span>
                                    <span class="pull-right-container">
                                    <small class="label pull-right bg-blue-active">
                                        @Super_admin
                                            {{ \App\Reservation::where('org_id', session('org_info')->id)->where('status','2')->count() }}
                                            @endSuper_admin
                                            @admin
                                            {{ \App\Reservation::where('org_id', \Illuminate\Support\Facades\Auth::User()->org_id)->where('status','2')->count() }}
                                        @endadmin
                                       </small>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{url('massage')}}">
                            <i class="fa fa-envelope"></i> <span>SMS</span>

                        </a>
                    </li>
                    <li>
                        <a href="{{url('/report')}}">
                            <i class="fa fa-file"></i> <span>Report</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/payment')}}">
                            <i class="fa fa-file"></i> <span>Payment</span>
                        </a>
                    </li>
            </ul>
            @endif
        </section>

        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

    @yield('content')

    <!--    /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.4.0
        </div>
        <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">LatentSoft</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-user bg-yellow"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                <p>New phone +1(800)555-1234</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                <p>nora@example.com</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-file-code-o bg-green"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                <p>Execution time 5 seconds</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="label label-danger pull-right">70%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Update Resume
                                <span class="label label-success pull-right">95%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Laravel Integration
                                <span class="label label-warning pull-right">50%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Back End Framework
                                <span class="label label-primary pull-right">68%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Allow mail redirect
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Other sets of options are available
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Expose author name in posts
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Allow the user to show his name in blog posts
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <h3 class="control-sidebar-heading">Chat Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Show me as online
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Turn off notifications
                            <input type="checkbox" class="pull-right">
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Delete chat history
                            <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                        </label>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="{{ asset('bower_components/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('bower_components/morris.js/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{  asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>

@stack('page-js')

</body>
</html>