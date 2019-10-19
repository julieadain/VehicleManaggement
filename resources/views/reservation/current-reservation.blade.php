
@extends("layout.admin")

@section('content')
    <section class="content-header">
        <h3>
            Running Reservation
        </h3>

    </section>
    <!-- Main content -->
    <section class="content">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">

                <!-- /.box-header -->
                <!-- form start -->


                    <table class="table">
                        <caption></caption>
                        <thead>
                        <tr>
                            <th scope="col">Client Name</th>
                            <th scope="col">Start Date Time</th>
                            <th scope="col"> End Date Time</th>
                            <th scope="col">Seat Capacity </th>
                            <th scope="col">AC/Non-AC</th>
                            <th scope="col">Ownership</th>
                            <th scope="col">Option</th>


                            {{--                            <th scope="col">Pickup Address</th>--}}
{{--                            <th scope="col">Location</th>--}}
{{--                            <th scope="col">Start Meter reading</th>--}}
{{--                            <th scope="col"> End Meter reading</th>--}}
{{--                            <th scope="col">Total Payable</th>--}}

                        </tr>
                        </thead>

{{--                        {{ dd( Auth::id()) }}--}}

                        @foreach($reservations as $reservation)

                            <tr>
                                <td>{{$reservation->clients-> name}}</td>
                                <td>{{date("dM y,", strtotime( $reservation->start_date_time))}}
                                    at{{date(" h:ia", strtotime( $reservation->start_date_time))}}</td>


                                <td>{{date("dM y,", strtotime( $reservation->end_date_time))}}
                                    at{{date(" h:ia", strtotime( $reservation->end_date_time))}}</td>
                                <td>{{$reservation->seat_capacity}}</td>
                                <td>
                                @if ($reservation->ac == 1)
                                    {{"yes"}}
                                @else
                                    {{"no"}}

                                @endif

                                </td>
                                <td>
                                @if ($reservation->share == 1)
                                    {{"yes"}}
                                @else
                                    {{"no"}}

                                @endif

                                </td>





                                {{--     {reservation}/currentReservationShow                           <td>{{$reservation->pickup_address}}</td>--}}
{{--                                <td>{{$reservation->location}}</td>--}}
{{--                                <td>{{$reservation->start_meter_reading}}</td>--}}
{{--                                <td>{{$reservation->end_meter_reading}}</td>--}}
{{--                                <td>{{$reservation->total_payable}}</td>--}}

                                <td>
                                    <a title="rdgrdg" href="{{url("$reservation->id/currentReservation")}}" class="btn btn-primary" style="float: left; margin-right: 2px">View</a>
                                    <a title="rdgrdg" href="{{url("reservation/$reservation->id/completed")}}" class="btn btn-primary" style="float: left; margin-right: 2px">Completed</a>
                                    <a title="rdgrdg" href="{{url("RunReservation/$reservation->id/edit")}}" class="btn btn-primary" style="float: left; margin-right: 2px"><i class="fa fa-pencil"></i></a>
                                    <form action="{{ url("RunReservation/$reservation->id")}}" method="post" style="float: left; margin-right: 2px">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure')"><i class="fa fa-trash-o"></i></button>

                                    </form>
                                </td>

                            </tr>

                        @endforeach


                    </table>
            </div>
        </div>
    </section>


@endsection