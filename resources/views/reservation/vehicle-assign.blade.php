@extends("layout.admin")

@section('content')
    <section class="content-header">
        <h3>
            Vehicle Assign
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
                        <th scope="row">Client Name:</th>
                        <td>{{ $reservation->clients-> name }}</td>
                    </tr>

                    <tr>
                        <th scope="row">Start Date Time:</th>
                        <td>{{ $reservation-> start_date_time }}</td>
                    </tr>

                    <tr>
                        <th scope="row">End Date Time:</th>
                        <td>{{ $reservation-> end_date_time}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Seat Capacity:</th>
                        <td>{{ $reservation->seat_capacity}}</td>
                    </tr>
                    <tr>
                        <th scope="row">AC/Non AC:</th>
                        <td>@if ($reservation->ac == 1)
                                {{'AC'}}
                            @else
                                {{ "Non AC" }}

                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Share:</th>
                        <td>@if ($reservation->share == 1)
                                {{'Yes'}}
                            @else
                                {{ "No" }}

                            @endif
                        </td>
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


                <h3>Vehicle</h3>
                <table class="table">
                    <tbody>





{{--                    <li class="treeview">--}}
{{--                        <a href="#">--}}
{{--                            @foreach($vehicles as $vehicle)--}}

{{--                                    <td>--}}

{{--                            <i class="fa fa-car"></i> <span><a href={{url('/vehicleAssign/'. $vehicle->id)}}> {{$vehicle->brand}}</a></span>--}}
{{--                                    </td>--}}

{{--                            <span class="pull-right-container">--}}
{{--                                <i class="fa fa-angle-left pull-right"></i>--}}
{{--                            </span>--}}
{{--                        </a>--}}
{{--                        <ul class="treeview-menu">--}}

{{--                            @foreach($vehicle->reservations->all() as $reservation)--}}
{{--                            <li><i class="fa fa-circle-o"></i> {{date("dM y,", strtotime( $reservation->start_date_time))}}--}}
{{--                                at{{date(" h:ia", strtotime( $reservation->start_date_time))}}--}}
{{--                                to  {{date("dM y,", strtotime( $reservation->end_date_time))}}--}}
{{--                                at{{date(" h:ia", strtotime( $reservation->end_date_time))}}--}}


{{--                                <small class="location" > <i class="fa fa-map-marker"> </i>{{ $reservation-> location}} </small>--}}
{{--                                @endforeach--}}

{{--                            </li>--}}

{{--                        </ul>--}}
{{--                        @endforeach--}}
{{--                    </li>--}}






                    <tr>
                        @foreach($vehicles as $vehicle)

                            <td>
                                 <a href={{url('/vehicleAssign/'. $vehicle->id)}}> <i class="fa fa-car"></i> {{$vehicle->brand}}</a>

                                @foreach($vehicle->reservations->all() as $reservation)
{{--                                    <ul class="treeview-menu">--}}
{{--                                        <li><i class="fa fa-circle-o"></i>--}}
                                    <br/>


                                    {{date("dM y,", strtotime( $reservation->start_date_time))}}
                                    at{{date(" h:ia", strtotime( $reservation->start_date_time))}}
                                    to  {{date("dM y,", strtotime( $reservation->end_date_time))}}
                                    at{{date(" h:ia", strtotime( $reservation->end_date_time))}}


                                    <small class="location" > <i class="fa fa-map-marker"> </i>{{ $reservation-> location}} </small>
{{--                                    </li>--}}
{{--                                    </ul>--}}
                                @endforeach



                            </td>



                    </tr>
                    @endforeach

                    </tbody>


                </table>
            </div>
        </div>
    </section>


@endsection