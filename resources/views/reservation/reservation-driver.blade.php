
@extends("layout.admin")

@section('content')
{{--    {{ dd("this page clicked") }}--}}
    <section class="content-header">
        <h3>
            Driver Assign
        </h3>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="col-md-5 pull-left">
            <!-- Horizontal Form -->
            <div class="box box-info">

                <!-- /.box-header -->
                <!-- form start -->


                    <table class="table">
                        <caption></caption>
                        <thead>


                        <tr>
                            <th scope="row">Start Date Time:</th>
                            <td>{{ $reservation-> start_date_time }}</td>
                        </tr>

                        <tr>
                            <th scope="row">End Date Time:</th>
                            <td>{{ $reservation-> end_date_time}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Vehicle</th>
                            <td>{{ $reservation->vehicle_id}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Seat Capacity:</th>
                            <td>{{ $reservation->seat_capacity}}</td>
                        </tr>
                        <tr>
                            <th scope="row">AC:</th>
                            <td>{{ $reservation->ac }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Share:</th>
                            <td>{{ $reservation-> share}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Pickup Address:</th>
                            <td>{{ $reservation->pickup_address }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Location:</th>
                            <td>{{ $reservation->location }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Start Meter Reading:</th>
                            <td>{{ $reservation-> start_meter_reading}}</td>
                        </tr>
                        <tr>
                            <th scope="row">End Meter Reading:</th>
                            <td>{{ $reservation->end_meter_reading }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Total Payable:</th>
                            <td>{{ $reservation->total_payable}}</td>
                        </tr>
                        </thead>
                    </table>
            </div>
        </div>
        <div class="col-md-7 pull-right">
            <!-- Horizontal Form -->
            <div class="box box-info">

                <!-- /.box-header -->
                <!-- form start -->


                <table class="table">
                     <h3>Driver</h3>
                    <thead>
                    <tr>

                        @foreach($drivers as $driver)

{{--                            {{dd($driver)}}--}}

                            <td><a href={{url('/driverAssign/'. $driver->id)}}> {{$driver->name}} </a></td>










{{--                            <li class="treeview">--}}
{{--                            <a href="#">--}}
{{--                                <i class="fa fa-male"></i>--}}
{{--                                <span>{{ $vehicle->brand }}</span>--}}
{{--                                <span class="pull-right-container">--}}
{{--              <span class="label label-primary pull-right">{{ "Total  drivers"}}</span>--}}
{{--            </span>--}}
{{--                            </a>--}}
{{--                            <ul class="treeview-menu">--}}
{{--                                <li><a href="{{ url() }}"><i class="fa fa-circle-o"></i>{{$vehicle->start_date_time}}</a>--}}
{{--                                </li>--}}
{{--                                <li><a href="{{ url('') }}"><i class="fa fa-circle-o"></i> {{$vehicle->end_date_time}} </a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}



{{--                        <th scope="col">Brand</th>--}}

                    </tr>
                    @endforeach

                    </thead>


                </table>
            </div>
        </div>
    </section>


@endsection