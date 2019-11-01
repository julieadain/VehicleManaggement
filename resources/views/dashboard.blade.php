@extends("layout.admin")

{{--Admin - Dashboard--}}
@section('content')
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        {{--        <h1>{{$user->organization['id']}}</h1>--}}
    </section>
    <!-- Main content -->
    <section class="content">

    @include('partials/_messages')
    <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        @Super_admin
                        <h3>{{ \App\Vehicle::whereOrg_id(session()->get('org_info')->id)->count() }}</h3>
                        @endSuper_admin
                        @admin
                        <h3>{{ \App\Vehicle::whereOrg_id(Auth::user()->org_id)->count() }}</h3>
                        @endadmin

                        <p>Vehicles</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-car"></i>
                    </div>
                    <a href="{{url("vehicle")}}" class="small-box-footer">More info <i
                                class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        @Super_admin
                        <h3>{{ \App\Driver::whereOrg_id(session()->get('org_info')->id)->count() }}</h3>
                        @endSuper_admin
                        @admin
                        <h3>{{ \App\Driver::whereOrg_id(\Illuminate\Support\Facades\Auth::user()->org_id)->count() }}</h3>
                        @endadmin

                        <p>Drivers</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                    <a href="{{url("driver")}}" class="small-box-footer">More info <i
                                class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        @Super_admin
                        <h3>{{  \App\Reservation::where('status','!=',2)->count() }}</h3>
                        @endSuper_admin
                        @admin
                        <h3>{{  \App\Reservation::where('status','!=',2)->count() }}</h3>
                        @endadmin

                        <p>Booking</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-checkbox"></i>
                    </div>
                    <a href="{{'currentReservation'}}" class="small-box-footer">More info <i
                                class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>9238</h3>
                        {{--@Super_admin
                        <h3>{{  \App\sms::where('status','!=',2)->count() }}</h3>
                        @endSuper_admin
                        @admin
                        <h3>{{  \App\sms::where('status','!=',2)->count() }}</h3>
                        @endadmin--}}
                        <p>SMS</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-mail"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->

        <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">
                <!-- Custom tabs (Charts with tabs)-->
                <div class="box box-primary">
                    <div class="box-header">
                        <i class="ion ion-clipboard"></i>

                        <h3 class="box-title">Reservation</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-default" style="margin-right: 5px;"><a
                                        href="{{url("currentReservation")}}"> <i class="fa fa-file"></i> </a></button>

                            <button type="button" class="btn btn-default pull-right"><a href="{{url('client')}}"> <i
                                            class="fa fa-plus"></i></a></button>
                        </div>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
                        <ul class="todo-list">

                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover">
                                    <tr class="lovelyrow">

                                    </tr>
                                    @foreach($reservations as $reservation)
                                        <tr class="lovelyrow"
                                            onclick="location.href='{{$reservation->id}}/currentReservation'">

                                            <td><b>{{$reservation->clients->name}}</b></td>
                                            <td>{{date("dM y,", strtotime( $reservation->start_date_time))}}
                                                at{{date(" h:ia", strtotime( $reservation->start_date_time))}}
                                                to {{date("dM y,", strtotime( $reservation->end_date_time))}}
                                                at{{date(" h:ia", strtotime( $reservation->start_date_time))}}</td>
                                            <td><i class="fa fa-map-marker"> </i>
                                                <small>{{ $reservation-> location }} </small>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>

                <div class="box box-primary">
                    <div class="box-header">
                        <i class="ion ion-clipboard"></i>

                        <h3 class="box-title">Recent Clients</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-default pull-right"><a href="{{url('client/create')}}">
                                    <i class="fa fa-plus"> </i> </a></button>
                        </div>

                    </div>
                    <div class="box-body">
                        <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
                        <ul class="todo-list">


                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover">
                                    <tr class="lovelyrow">

                                    </tr>
                                    @foreach($clients as $client)
                                        <tr class="lovelyrow" onclick="location.href='client'">

                                            <td><b>{{$client-> name}}</b></td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </ul>
                    </div>
                </div>
            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable">

                <!-- Map box -->
                <div class="box box-primary">
                    <div class="nav-tabs-custom">
                        <div class="box-header">
                            <i class="ion ion-clipboard"></i>

                            <h3 class="box-title">Available Vehicles</h3>

                        </div>
                        <div class="box-body">
                            <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
                            <ul class="todo-list">

                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tr class="lovelyrow">

                                        </tr>
                                        @foreach($vehicles as $vehicle)
                                            <tr class="lovelyrow"
                                                onclick="location.href='dashboard/vehicle/{{$vehicle->id}}'">

                                                <td style="color: #0b58a2"><b>{{$vehicle->brand}}</b></td>

                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.box -->

                <!-- solid sales graph -->
                <div class="box box-primary">
                    <div class="box box-solid bg-light-blue-gradient">
                        <div class="nav-tabs-custom">
                            <div class="box-header">
                                <i class="ion ion-clipboard"></i>

                                <h3 class="box-title">Available Drivers</h3>

                            </div>
                            <div class="box-body">
                                <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
                                <ul class="todo-list">


                                    <div class="box-body table-responsive no-padding">
                                        <table class="table table-hover">
                                            <tr class="lovelyrow">

                                            </tr>
                                            @foreach($drivers as $driver)
                                                <tr class="lovelyrow"
                                                    onclick="location.href='dashboard/driver/{{$driver->id}}'">

                                                    <td style="color: #0b58a2"><b>{{$driver->name}}</b></td>

                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>


                                    {{--                                    @foreach($drivers as $driver)--}}

                                    {{--                                    <li>--}}
                                    {{--                                        <span class="text"><a href="{{url('dashboard/driver/'.$driver->id )}}">{{$driver-> name}}</a></span>--}}
                                    {{--                                        <!-- Emphasis label -->--}}
                                    {{--                                        <small class="label label-danger"><i class="fa fa-clock-o"></i></small>--}}
                                    {{--                                        <!-- General tools such as edit or delete-->--}}
                                    {{--                                        <div class="tools">--}}
                                    {{--                                            <i class="fa fa-trash-o"></i>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </li>--}}
                                    {{--                                    @endforeach--}}

                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
            </section>
            <!-- right col -->
        </div>
        <!-- /.row (main row) -->

    </section>

@endsection


