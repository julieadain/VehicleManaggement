
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


                     <h3>Driver</h3>
                <table class="table">

                <tbody>
                    <tr>
                        @foreach($drivers as $driver)

                            <td>
                                <a href={{url('/driverAssign/'. $driver->id)}}> {{$driver->name}}</a>
                                @foreach($driver->reservations->all() as $reservation)
                                    <br/>
                                    {{ date("dM y"), strtotime( $reservation->start_date_time)}}
                                    at{{ date("h:m a"), strtotime( $reservation->start_date_time)}}
                                    to  {{ date("dM y"), strtotime( $reservation->end_date_time)}}
                                    at {{  date("h:m a"), strtotime($reservation->end_date_time)}}


                                    <small class="location" > <i class="fa fa-map-marker"> </i>{{ $reservation-> location}} </small>
                                @endforeach
                            </td>



                    </tr>
                    @endforeach
                       {{-- @foreach($drivers as $driver)

--}}{{--                            {{dd($driver)}}--}}{{--

                            <td><a href={{url('/driverAssign/'. $driver->id)}}> {{$driver->name}} </a></td>
--}}{{--{{ dd($driver->reservations) }}--}}{{--
--}}{{--                            @foreach($driver->reseravations as $reservation)--}}{{--
                                <br/>
                                {{ date("dM y"), strtotime( $reservation->start_date_time)}}
                                at{{ date("h:m a"), strtotime( $reservation->start_date_time)}}
                                to  {{ date("dM y"), strtotime( $reservation->end_date_time)}}
                                at {{  date("h:m a"), strtotime($reservation->end_date_time)}}


                                <small class="location" > <i class="fa fa-map-marker"> </i>{{ $reservation-> location}} </small>
--}}{{--                            @endforeach--}}{{--

                    </tr>
                    @endforeach--}}

                    </tbody>


                </table>
            </div>
        </div>
    </section>


@endsection