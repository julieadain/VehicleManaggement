
@extends("layout.admin")

@section('content')
    <section class="content-header">
        <h3>
            Reservation List
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
                            <th scope="col">Start Date Time</th>
                            <th scope="col"> End Date Time</th>
                            <th scope="col">Seat Capacity </th>
                            <th scope="col">AC/Non-AC</th>
                            <th scope="col">Ownership</th>
                            <th scope="col">Option</th>


                        </tr>
                        </thead>

{{--                        {{ dd( Auth::id()) }}--}}

                        @foreach($reservationList as $reservation)

                            <tr>

                                <td>{{date("dM y,", strtotime( $reservation->start_date_time))}}
                                    at{{date(" h:ia", strtotime( $reservation->start_date_time))}}

                                </td>
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
                                    <a title="rdgrdg" href="{{url("reservation/$reservation->id")}}" class="btn btn-primary" style="float: left; margin-right: 2px">View</a>
                                    <a title="rdgrdg" href="{{url("reservation/$reservation->id/edit")}}" class="btn btn-primary" style="float: left; margin-right: 2px"><i class="fa fa-pencil"></i></a>
                                    <form action="{{ url("reservation/$reservation->id")  }}" method="post" style="float: left; margin-right: 2px">
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