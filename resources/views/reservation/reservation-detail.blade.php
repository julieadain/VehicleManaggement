
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
                            <td>{{ $reservationList->clients-> name }}</td>
                        </tr>

                        <tr>
                            <th scope="row">Start Date Time:</th>
                            <td>{{ $reservationList-> start_date_time }}</td>
                        </tr>

                        <tr>
                            <th scope="row">End Date Time:</th>
                            <td>{{ $reservationList-> end_date_time}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Seat Capacity:</th>
                            <td>{{ $reservationList->seat_capacity}}</td>
                        </tr>
                        <tr>
                            <th scope="row">AC/Non AC:</th>
                            <td>@if ($reservationList->ac == 1)
                                    {{'AC'}}
                                @else
                                    {{ "Non AC" }}

                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Share:</th>
                            <td>@if ($reservationList->share == 1)
                                    {{'Yes'}}
                                @else
                                    {{ "No" }}

                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Pickup Address:</th>
                            <td>{{ $reservationList->pickup_address }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Location:</th>
                            <td>{{ $reservationList->location }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Start Meter Reading:</th>
                            <td>{{ $reservationList-> start_meter_reading}}</td>
                        </tr>
                        <tr>
                            <th scope="row">End Meter Reading:</th>
                            <td>{{ $reservationList->end_meter_reading }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Total Payable:</th>
                            <td>{{ $reservationList->total_payable}}</td>
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
                     <h3>Vehicle</h3>
                    <thead>
                    <tr>
                        @foreach($vehicles as $vehicle)

                            <td><a href={{url('/vehicleAssign/'. $vehicle->id)}}> {{$vehicle->brand}} </a></td>

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