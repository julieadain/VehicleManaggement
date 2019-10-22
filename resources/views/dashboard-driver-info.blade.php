@extends("layout.admin")

@section('content')
    <section class="content-header">


    </section>

    <!-- Main content -->
    <section class="content">

        <div class="col-md-4 pull-left">
            <h3>
                Driver Information
            </h3>
{{--            <a title="rdgrdg" href="{{url("vehicle/$vehicle->id/edit")}}" class="btn btn-primary" style="float: left; margin-right: 2px"><i class="fa fa-pencil"></i></a>--}}
            <!-- Horizontal Form -->
            <div class=" container box box-success">

                <!-- /.box-header -->
                <!-- form start -->


                <table class="table">

                    <tbody>
                    {{--                    {{ dd($vehicle) }}--}}
                    <tr>
                        <th scope="row">Name:</th>
                        <td>{{ $driver->name }}</td>
                    </tr>

                    <tr>
                        <th scope="row">Email:</th>
                        <td>{{ $driver->email}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Phone:</th>
                        <td>{{ $driver->phone}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Address:</th>
                        <td>{{ $driver->address}}</td>
                    </tr>

                    <tr>
                        <th scope="row">DL Scan Copy:</th>
                        <td>
                            <img src="{{asset('upload').'/'.$driver->dl_scan}}" alt="image"
                                 style="width: 20rem;">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Photo:</th>
                        <td>
                            <img src="{{asset('upload').'/'.$driver->photo}}" alt="image" style="width: 20rem;">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">nid_scanInsurance Scan Copy:</th>
                        <td>
                            <img src="{{asset('upload').'/'.$driver->nid_scan }}" alt="image"
                                 style="width: 20rem;">
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-8 pull-right">
            <h4>Running Reservation</h4>
            <!-- Horizontal Form -->
            <div class="container box box-info">

                <!-- /.box-header -->
                <!-- form start -->


                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col"> Client Name</th>
                        <th  scope="col">Start Date Time</th>
                        <th  scope="col">End Date Time</th>
                        <th  scope="col">Pickup Address</th>
                        <th   scope="col">location</th>
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
            <div class="container box box-info">

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

                    @foreach($driverHistory as $dHistory)
                        <tr>

                            <td>{{ $dHistory->clients->name }}</td>

                            <td>{{date("dM y", strtotime( $dHistory->start_date_time))}}
                                at{{date(" h:ia", strtotime( $dHistory->start_date_time))}}
                            </td>
                            <td>
                                {{date("dM y", strtotime( $dHistory->end_date_time))}}
                                at{{date(" h:ia", strtotime( $dHistory->end_date_time))}}
                            </td>
                            <td>{{$dHistory->pickup_address}}</td>
                            <td>{{$dHistory->location}}</td>

                        </tr>


                    @endforeach




                    </tbody>



                </table>
                {{ $driverHistory->links() }}

            </div>
        </div>



    </section>


@endsection
