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
                        <h3>50</h3>

                        <p>Vehicles</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-car"></i>
                    </div>
                    <a href="{{url("vehicle")}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>50</h3>

                        <p>Drivers</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                    <a href="{{url("driver")}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>44</h3>

                        <p>Booking</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-checkbox"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>25</h3>

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

                        <button class="btn btn-default" ><a href="{{url("currentReservation")}}"> <i class="fa fa-file" ></i> </a></button>


                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-default pull-right"><a href="{{url('client')}}"> <i
                                            class="fa fa-plus"></i></a></button>
                        </div>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
                        <ul class="todo-list">

{{--{{ dd("clicked") }}--}}
                            @foreach($reservations as $reservation)

                                <li>


                                   <b> <a href="{{url("$reservation->id/currentReservation")}}"> {{$reservation->clients-> name}}&nbsp; </a></b>



                                    {{date("dM y,", strtotime( $reservation->start_date_time))}}
                                            at{{date(" h:ia", strtotime( $reservation->start_date_time))}}&nbsp;
                                            to {{date("dM y,", strtotime( $reservation->end_date_time))}}
                                            at{{date(" h:ia", strtotime( $reservation->start_date_time))}}&nbsp;&nbsp;



                                        <small class="location" > <i class="fa fa-map-marker"> </i>{{ $reservation-> location }} </small>


                                    <!-- General tools such as edit or delete-->
                                    <div class="tools">
                                        <i class="fa fa-trash-o"></i>
                                    </div>
                                </li>
                            @endforeach


                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>

                <div class="nav-tabs-custom">
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
                            @foreach($clients as $client)
                                <li>
                                    <td><a href="{{url('client')}}"> <span class="text">{{$client->name}} </span> </a>
                                    </td>
                                {{--                                <span class="text">A client</span>--}}
                                <!-- Emphasis label -->
                                <?php
                                    $date1 = new DateTime($client->created_at);
                                    $date2 = new DateTime(now());
                                    $interval = $date1->diff($date2);
                                ?>

                                <small class="label label-primary"><i class="fa fa-clock-o">{{ ('  ' .$interval->format('%a')).'  '. 'Days ago' }} </i> </small>
                                <div class="tools">
                                    <i class="fa fa-trash-o"></i>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable">

                <!-- Map box -->
                <div class="box box-solid bg-light-blue-gradient">
                    <div class="nav-tabs-custom">
                        <div class="box-header">
                            <i class="ion ion-clipboard"></i>

                            <h3 class="box-title">Available vehicles</h3>

                        </div>
                        <div class="box-body">
                            <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
                            <ul class="todo-list">
                                <li>
                                    <span class="text">Available one</span>
                                    <!-- Emphasis label -->
                                    <small class="label label-danger"><i class="fa fa-clock-o"></i></small>
                                    <!-- General tools such as edit or delete-->
                                    <div class="tools">
                                        <i class="fa fa-trash-o"></i>
                                    </div>
                                </li>
                                <li>
                                    <span class="text">Available one</span>
                                    <!-- Emphasis label -->
                                    <small class="label label-danger"><i class="fa fa-clock-o"></i></small>
                                    <!-- General tools such as edit or delete-->
                                    <div class="tools">
                                        <i class="fa fa-trash-o"></i>
                                    </div>
                                </li>
                                <li>
                                    <span class="text">Available one</span>
                                    <!-- Emphasis label -->
                                    <small class="label label-danger"><i class="fa fa-clock-o"></i></small>
                                    <!-- General tools such as edit or delete-->
                                    <div class="tools">
                                        <i class="fa fa-trash-o"></i>
                                    </div>
                                </li>
                                <li>
                                    <span class="text">Available one</span>
                                    <!-- Emphasis label -->
                                    <small class="label label-danger"><i class="fa fa-clock-o"></i></small>
                                    <!-- General tools such as edit or delete-->
                                    <div class="tools">
                                        <i class="fa fa-trash-o"></i>
                                    </div>
                                </li>
                                <li>
                                    <span class="text">Available one</span>
                                    <!-- Emphasis label -->
                                    <small class="label label-danger"><i class="fa fa-clock-o"></i></small>
                                    <!-- General tools such as edit or delete-->
                                    <div class="tools">
                                        <i class="fa fa-trash-o"></i>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.box -->

                <!-- solid sales graph -->
                <div class="box box-solid bg-teal-gradient">
                    <div class="box box-solid bg-light-blue-gradient">
                        <div class="nav-tabs-custom">
                            <div class="box-header">
                                <i class="ion ion-clipboard"></i>

                                <h3 class="box-title">Available drivers</h3>

                            </div>
                            <div class="box-body">
                                <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
                                <ul class="todo-list">
                                    <li>
                                        <span class="text">Available one</span>
                                        <!-- Emphasis label -->
                                        <small class="label label-danger"><i class="fa fa-clock-o"></i></small>
                                        <!-- General tools such as edit or delete-->
                                        <div class="tools">
                                            <i class="fa fa-trash-o"></i>
                                        </div>
                                    </li>
                                    <li>
                                        <span class="text">Available one</span>
                                        <!-- Emphasis label -->
                                        <small class="label label-danger"><i class="fa fa-clock-o"></i></small>
                                        <!-- General tools such as edit or delete-->
                                        <div class="tools">
                                            <i class="fa fa-trash-o"></i>
                                        </div>
                                    </li>
                                    <li>
                                        <span class="text">Available one</span>
                                        <!-- Emphasis label -->
                                        <small class="label label-danger"><i class="fa fa-clock-o"></i></small>
                                        <!-- General tools such as edit or delete-->
                                        <div class="tools">
                                            <i class="fa fa-trash-o"></i>
                                        </div>
                                    </li>
                                    <li>
                                        <span class="text">Available one</span>
                                        <!-- Emphasis label -->
                                        <small class="label label-danger"><i class="fa fa-clock-o"></i></small>
                                        <!-- General tools such as edit or delete-->
                                        <div class="tools">
                                            <i class="fa fa-trash-o"></i>
                                        </div>
                                    </li>
                                    <li>
                                        <span class="text">Available one</span>
                                        <!-- Emphasis label -->
                                        <small class="label label-danger"><i class="fa fa-clock-o"></i></small>
                                        <!-- General tools such as edit or delete-->
                                        <div class="tools">
                                            <i class="fa fa-trash-o"></i>
                                        </div>
                                    </li>
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


