
@extends("layout.admin")

@section('content')
    <section class="content-header">
        <h3>
            Reservation List
        </h3>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="col-md-5">
            <!-- Horizontal Form -->
            <div class="box box-info">

                <!-- /.box-header -->
                <!-- form start -->


                    <table class="table">
                        <caption></caption>
                        <thead>


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
                            <th scope="row">AC:</th>
                            <td>{{ $reservationList->ac }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Share:</th>
                            <td>{{ $reservationList-> share}}</td>
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
    </section>

    <section class="content">
        <div class="col-md-7">
            <!-- Horizontal Form -->
            <div class="box box-info">

                <!-- /.box-header -->
                <!-- form start -->


                <table class="table">
                     <h1>Vehicle</h1>
                    <thead>
                    <tr>
{{--                        {{ dd($vehicles) }}--}}

                        <th scope="col">Brand</th>

                    </tr>
                    </thead>

                    @foreach($vehicles as $vehicle)
                        <tr>
                            <td>{{$vehicle ->brand }}</td>


                        </tr>

                    @endforeach


                </table>
            </div>
        </div>
    </section>


@endsection