@extends("layout.admin")

@section('content')
    <section class="content-header">
        <h3>
            Client History
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
                                <th class="bg-primary">Name</th>
                                <th class="bg-primary">Phone</th>
                                <th class="bg-primary">Start Date Time</th>
                                <th class="bg-primary">end_date_time</th>
                                <th class="bg-primary"> Pickup Address</th>
                                <th class="bg-primary">Location</th>
                                <th class="bg-primary">Amount</th>

                            </tr>
                            @foreach($reservations as $reservation)
                            <td>{{$reservation->client->name}}</td>
                            <td>{{$reservation->client->phone}}</td>
                            <td>{{$reservation->start_date_time}}</td>
                            <td>{{$reservation->end_date_time}}</td>
                            <td>{{$reservation->pickup_address}}</td>
                            <td>{{$reservation->location}}</td>
                            <td>{{$reservation->total_payable}}</td>
                            @endforeach
                        </table>  <div class="box-footer clearfix" style="margin-right:50px;">

                            <ul class="pagination pagination-sm no-margin pull-right">
                                {{$reservations->links()}}
                            </ul>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>






@endsection


