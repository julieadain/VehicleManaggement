
@extends("layout.admin")

@section('content')
    <section class="content-header">
        <h3 class="container">
            Vehicle Detail
        </h3>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="col-md-10">
            <!-- Horizontal Form -->
            <div class="box box-info">

                <!-- /.box-header -->
                <!-- form start -->


                <table class="table">
                    <caption></caption>
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
                        <th scope="row">Reg Scan Copy:</th>
                        <td>
                            <img src="{{asset('upload').'/'.$vehicle->reg_scan_copy}}" alt="image" style="width: 20rem;">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Photo:</th>
                        <td>
                            <img src="{{asset('upload').'/'.$vehicle->photo}}" alt="image" style="width: 20rem;">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Insurance Scan Copy:</th>
                        <td>
                            <img src="{{asset('upload').'/'.$vehicle->insurance_scan_copy}}" alt="image" style="width: 20rem;">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">RoadPermit Scan Copy:</th>
                        <td>
                            <img src="{{asset('upload').'/'.$vehicle->roadPermit_scan_copy}}" alt="image" style="width: 20rem;">
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        </div>
    </section>


@endsection