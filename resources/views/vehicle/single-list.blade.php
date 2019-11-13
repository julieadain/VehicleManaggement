    @extends("layout.admin")

@section('content')
    <!-- Main content -->
    <section class="content">
        <h3 class="container">
            Vehicle Profile
        </h3>
        <div class="container">
            <div class="col-md-7 pull-left">


            <!-- Horizontal Form -->
                <div class=" container box box-success">

                    <!-- /.box-header -->
                    <!-- form start -->


                    <table class="table">

                        <tbody>
                        <tr>
                            <th scope="row">Brand:</th>
                            <td>{{ $vehicle->brand }}</td>
                        </tr>

                        <tr>
                            <th scope="row">Model:</th>
                            <td>{{ $vehicle->model}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Color:</th>
                            <td>{{ $vehicle->color}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Reg Number:</th>
                            <td>{{ $vehicle->reg_number}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Reg Date:</th>
                            <td>{{ $vehicle-> reg_date}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Seat Capacity:</th>
                            <td>{{ $vehicle->seat_capacity}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Owner:</th>
                            <td>
                                @if ($vehicle->ownership_status == 1)
                                    {{"Yes"}}
                                @else
                                    {{"No"}}

                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">AC:</th>
                            <td>
                                @if ($vehicle->ac == 1)
                                    {{"Yes"}}
                                @else
                                    {{"No"}}

                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">Registration Scan Copy:</th>
                            <td><a href="{{asset('upload').'/'.$vehicle->reg_scan_copy}}" target="_blank">{{$vehicle->reg_scan_copy}}</a>

                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Insurance Scan Copy:</th>
                            <td><a href="{{asset('upload').'/'.$vehicle->insurance_scan_copy}}" target="_blank">{{$vehicle->insurance_scan_copy}}</a>

                            </td>
                        </tr>
                        <tr>
                            <th scope="row">RoadPermit Scan Copy:</th>
                            <td><a href="{{asset('upload').'/'.$vehicle->insurance_scan_copy}}" target="_blank">{{$vehicle->roadPermit_scan_copy}}</a>

                            </td>
                        </tr>


                        </tbody>
                    </table>
                </div>
            </div>
            <div class=" col-md-5 pull-right ">
                <div class="card">
                    <img src="{{asset('upload').'/'.$vehicle->photo}}" alt="image" style="width: 32rem;">

                </div>
            </div>
        </div>
    </section>
@endsection






