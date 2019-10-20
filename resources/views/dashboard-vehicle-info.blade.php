@extends("layout.admin")

@section('content')
    <section class="content-header">


    </section>

    <!-- Main content -->
    <section class="content">

        <div class="col-md-4 pull-left">
            <h3>
                Vehicle Information
            </h3>
{{--            <a title="rdgrdg" href="{{url("vehicle/$vehicle->id/edit")}}" class="btn btn-primary" style="float: left; margin-right: 2px"><i class="fa fa-pencil"></i></a>--}}
            <!-- Horizontal Form -->
{{--            <div class="box border-dark">--}}

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
                        <th scope="row">Reg Scan Copy:</th>
                        <td>
                            <img src="{{asset('upload').'/'.$vehicle->reg_scan_copy}}" alt="image"
                                 style="width: 20rem;">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Photo:</th>
                        <td>
                            <img src="{{asset('upload').'/'.$vehicle->photo}}" alt="image" style="width: 20rem;">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Insurance Scan Copy:</th>
                        <td>
                            <img src="{{asset('upload').'/'.$vehicle->insurance_scan_copy}}" alt="image"
                                 style="width: 20rem;">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">RoadPermit Scan Copy:</th>
                        <td>
                            <img src="{{asset('upload').'/'.$vehicle->roadPermit_scan_copy}}" alt="image"
                                 style="width: 20rem;">
                        </td>
                    </tr>
                    </tbody>
                </table>
{{--            </div>--}}
        </div>
        <div class="col-md-8 pull-right">
            <h4>Running Reservation</h4>
            <!-- Horizontal Form -->
            <div class="box border-dark">

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
{{--                            <td>--}}
{{--                            <a title="rdgrdg" href="{{url("")}}" class="btn btn-primary" style="float: left; margin-right: 2px"><i class="fa fa-pencil"></i></a>--}}
{{--                            <form action="{{ url("")  }}" method="post" style="float: left; margin-right: 2px">--}}
{{--                                @csrf--}}
{{--                                @method('DELETE')--}}
{{--                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure')"><i class="fa fa-trash-o"></i></button>--}}

{{--                            </form>--}}
{{--                            </td>--}}

                        </tr>


                    @endforeach

                    </tbody>



                </table>
                {{ $reservations->links() }}

            </div>

        </div>


        <div class="col-md-8 pull-right">
            <h4 >Reservation History</h4>

            <!-- Horizontal Form -->
            <div class="box border-dark">

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

{{--                    {{ $vHistory->links() }}--}}



                    </tbody>


                </table>
            </div>
        </div>



    </section>


@endsection
