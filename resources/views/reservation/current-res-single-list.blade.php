
@extends("layout.admin")

@section('content')
    <section class="content-header">
        <h3>
            Current Reservation
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
                        <th scope="row">Client Name:</th>
                        <td>{{ $reservation->clients-> name }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Vehicle:</th>
                        <td>{{ $reservation->vehicles-> reg_number }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Driver:</th>
                        <td>{{ $reservation->drivers-> name }}</td>
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
                        <th scope="row">Seat Capacity:</th>
                        <td>{{ $reservation->seat_capacity}}</td>
                    </tr>
                    <tr>
                        <th scope="row">AC/Non AC:</th>
                        <td> @if ($reservation->ac == 1)
                                 {{'AC'}}
                                 @else
                                 {{ "Non AC" }}

                        @endif
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Own Car:</th>
                        <td>
                            @if ($reservation->share == 1)
                                {{'Yes'}}
                            @else
                                {{ "No" }}

                            @endif
                        </td>
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

        </div>
    </section>


@endsection