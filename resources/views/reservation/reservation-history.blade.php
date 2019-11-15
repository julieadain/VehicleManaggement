

@extends("layout.admin")

@section('content')
    <section class="content-header">
        <h3 >
            Reservation History
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
                                <th class="bg-primary">Driver </th>
                            </tr>
                            @foreach($reservations as $reservation)
                                <tr>
                                    <td>{{$reservation->client-> name}}</td>
                                    <td>{{date("d M y,", strtotime( $reservation->start_date_time))}}
                                        at{{date(" h:ia", strtotime( $reservation->start_date_time))}}</td>
                                    <td>{{date("d M y,", strtotime( $reservation->end_date_time))}}
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
                                    <td>{{$reservation->driver->name}}</td>
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


