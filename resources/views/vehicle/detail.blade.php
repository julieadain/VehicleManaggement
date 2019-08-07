
@extends("layout.admin")

@section('content')
    <section class="content-header">
        <h3>
            Vehicle Detail
        </h3>
        <ol class="breadcrumb">
            <li><a href="{{url('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        </ol>
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
                        <th scope="col">Brand</th>
                        <th scope="col">Model</th>
                        <th scope="col">Color</th>
                        <th scope="col">Registration Number</th>
                        <th scope="col">Registration Date</th>
                        <th scope="col">Seat Capacity</th>
                        <th scope="col">AC/Non-AC</th>
                        <th scope="col">Registration Scan copy</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Insurance Scan Copy</th>
                        <th scope="col">Route Permit  Scan Copy</th>
                        <th scope="col">Owner</th>
                        <th scope="col">Status</th>
                        <th scope="col">option</th>

                    </tr>
                    </thead>

                    @foreach($vehicles as $vehicle)

                        <tr>
                            <td>{{$vehicle->brand}}</td>
                            <td>{{$vehicle->model}}</td>
                            <td>{{$vehicle->color}}</td>
                            <td>{{$vehicle->reg_number}}</td>
                            <td>{{$vehicle->reg_date}}</td>
                            <td>{{$vehicle->seat_capacity}}</td>
                            <td>
                                @if ($vehicle->ac == 1)
                                    {{"AC"}}
                                    @else
                                {{"Non-ac"}}
                                    @endif
                            </td>
                            <td>
                                <img src="{{asset('upload').'/'.$vehicle->reg_scan_copy}}" alt="image" height="50px" width="50px">
                            </td>

                            <td>
                                <img src="{{asset('upload').'/'.$vehicle->photo}}" alt="image" height="50px" width="50px">
                            </td>
                            <td>
                                <img src="{{asset('upload').'/'.$vehicle->insurance_scan_copy}}" alt="image" height="50px" width="50px">
                            </td>
                            <td>
                                <img src="{{asset('upload').'/'.$vehicle->roadPermit_scan_copy}}" alt="image" height="50px" width="50px">
                            </td>
                            <td>
                                @if( $vehicle->ownership_status == 1)
                                    {{"yes"}}
                                    @else
                                    {{"no"}}
                                   @endif

                            </td>
                            <td>
                               @if ($vehicle->status== 1)
                                   {{"yes"}}
                                   @else
                                   {{"no"}}

                               @endif

                            <td>
                                <a title="rdgrdg" href="{{url("vehicle/$vehicle->id/edit")}}" class="btn btn-primary" style="float: left; margin-right: 2px"><i class="fa fa-pencil"></i></a>
                                <form action="{{url("vehicle/$vehicle->id") }}" method="post" style="float: left; margin-right: 2px">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure')"><i class="fa fa-trash-o"></i></button>

                                </form>
                            </td>

                        </tr>

                    @endforeach
                    {{$vehicles->links()}}

                </table>
            </div>
        </div>
    </section>


@endsection
