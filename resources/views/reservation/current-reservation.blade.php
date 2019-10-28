
@extends("layout.admin")

@section('content')
    <section class="content-header">
        <h3 >
            Running Reservation
        </h3>

    </section>


    <!-- Main content -->
    <section class="container">

        <!-- /.col -->
        <!-- /.row -->
        <div class="row">
            <div class="col-xs-11">
                <div class="box">

                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th class="bg-primary"> Client Name</th>
                                <th class="bg-primary">Start Date Time</th>
                                <th class="bg-primary">end_date_time</th>
                                <th class="bg-primary">Seat Capacity  </th>
                                <th class="bg-primary">AC/Non AC </th>
                                <th class="bg-primary">Owner </th>
                                <th class="bg-primary"> Option </th>




                            </tr>
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
                                            {{"Yes"}}
                                        @else
                                            {{"No"}}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($reservation->share == 1)
                                            {{"Yes"}}
                                        @else
                                            {{"No"}}

                                        @endif
                                    </td>
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
{{--                        {{$reservations->links()}}--}}
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>

@endsection
