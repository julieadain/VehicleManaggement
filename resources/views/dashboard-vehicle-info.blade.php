@extends("layout.admin")

@section('content')
    <section class="content-header">


    </section>

    <!-- Main content -->
    <section class="content">
        <h3>Vehicle Information</h3>

        <div class="col-md-6 pull-left">

            <!-- Horizontal Form -->
            <div class=" container box box-success">

                <!-- /.box-header -->
                <!-- form start -->


                <table class="table">

                    <tbody>
                    {{--                    {{ dd($vehicle) }}--}}
                    <tr>
                        <th scope="row">Brand:</th>
                        <td>{{ $vehicle->brand }}</td>
                    </tr>

                    <tr>
                        <th scope="row">Model:</th>
                        <td>{{ $vehicle->model}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Color:</th>
                        <td>{{ $vehicle->color}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Reg Number:</th>
                        <td>{{ $vehicle->reg_number}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Reg Date:</th>
                        <td>{{ $vehicle-> reg_date}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Seat Capacity:</th>
                        <td>{{ $vehicle->seat_capacity}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Owner:</th>
                        <td>
                            @if ($vehicle->ownership_status == 1)
                                {{"Yes"}}
                            @else
                                {{"No"}}

                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">AC:</th>
                        <td>
                            @if ($vehicle->ac == 1)
                                {{"Yes"}}
                            @else
                                {{"No"}}

                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">vehicle Photo:</th>
                        <td><a href="{{asset('upload').'/'.$vehicle->photo}}" target="_blank">{{$vehicle->photo}}</a>

                        </td>
                    </tr>

                    <tr>
                        <th scope="row">Registration Scan Copy:</th>
                        <td><a href="{{asset('upload').'/'.$vehicle->reg_scan_copy}}" target="_blank">{{$vehicle->reg_scan_copy}}</a>

                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Insurance Scan Copy:</th>
                        <td><a href="{{asset('upload').'/'.$vehicle->insurance_scan_copy}}" target="_blank">{{$vehicle->insurance_scan_copy}}</a>

                        </td>
                    </tr>
                    <tr>
                        <th scope="row">RoadPermit Scan Copy:</th>
                        <td><a href="{{asset('upload').'/'.$vehicle->insurance_scan_copy}}" target="_blank">{{$vehicle->roadPermit_scan_copy}}</a>

                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-6 pull-right">
            <h4>Running Reservation</h4>
            <!-- Horizontal Form -->
            <div class="container box box-info">

                <!-- /.box-header -->
                <!-- form start -->


                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col"> Client Name</th>
                        <th scope="col">Start Date Time</th>
                        <th scope="col">End Date Time</th>
                        <th scope="col">Pickup Address</th>
                        <th scope="col">location</th>
{{--                        <th scope="col">Option</th>--}}


                    </tr>
                    </thead>

                    <tbody>

                    @foreach($reservations as $reservation)
                        <tr>

                            <td>{{ $reservation->clients->name }}</td>

                            <td>{{date("dM y", strtotime( $reservation->start_date_time))}}
                                at{{date(" h:ia", strtotime( $reservation->start_date_time))}}
                            </td>
                            <td>
                                {{date("dM y", strtotime( $reservation->end_date_time))}}
                                at{{date(" h:ia", strtotime( $reservation->end_date_time))}}
                            </td>
                            <td>{{$reservation->pickup_address}}</td>
                            <td>{{$reservation->location}}</td>

                        </tr>


                    @endforeach

                    </tbody>



                </table>
                {{ $reservations->links() }}

            </div>

        </div>


        <div class="col-md-6 pull-right">
            <h4 >Reservation History</h4>

            <!-- Horizontal Form -->
            <div class="container box box-info">

                <!-- /.box-header -->
                <!-- form start -->


                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col"> Client Name</th>
                        <th scope="col">Start Date Time</th>
                        <th scope="col">End Date Time</th>
                        <th scope="col">Pickup Address</th>
                        <th scope="col">location</th>
{{--                        <th scope="col">Option</th>--}}


                    </tr>
                    </thead>

                    <tbody>

                    @foreach($vehicleHistory as $vHistory)
                        <tr>

                            <td>{{ $vHistory->clients->name }}</td>

                            <td>{{date("dM y", strtotime( $vHistory->start_date_time))}}
                                at{{date(" h:ia", strtotime( $vHistory->start_date_time))}}
                            </td>
                            <td>
                                {{date("dM y", strtotime( $vHistory->end_date_time))}}
                                at{{date(" h:ia", strtotime( $vHistory->end_date_time))}}
                            </td>
                            <td>{{$vHistory->pickup_address}}</td>
                            <td>{{$vHistory->location}}</td>

                        </tr>


                    @endforeach

                    {{ $vehicleHistory->links() }}



                    </tbody>


                </table>
            </div>
        </div>



    </section>


@endsection
