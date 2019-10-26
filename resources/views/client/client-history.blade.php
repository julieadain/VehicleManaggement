@extends("layout.admin")

@section('content')
    <section class="content-header">
        <h3>
            Client History
        </h3>

    </section>

    {{--    {{dd('kasvbdf')}}--}}

    <!-- Main content -->
    <section class="container">

        <!-- /.col -->
        <!-- /.row -->
        <div class="row">
            <div class="col-xs-10">
                <div class="box">

                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th class="bg-primary">Name</th>
                                <th class="bg-primary">Start Date Time</th>
                                <th class="bg-primary">end_date_time</th>
                                <th class="bg-primary"> Pickup Address</th>

                                <th class="bg-primary">Location</th>
                                <th class="bg-primary">Amount</th>


                                @foreach($clientRcvs as $reservation)
                            </tr>

                            {{--                            @foreach($reservations as $reservation)--}}
                            <td>{{$reservation->name}}</td>
                            <td>{{$reservation->location}}</td>
{{--                            <td>{{$reservation->name}}</td>--}}
{{--                            <td>{{$reservation->name}}</td>--}}
{{--                            @foreach($reservation->reservations as $rr)--}}
{{--                                <td><ul>--}}
{{--                                        <li>{{$rr->location}}</li>--}}
{{--                                    </ul></td>--}}
{{--                                @endforeach--}}


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


