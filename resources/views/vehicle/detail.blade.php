
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

                        <th scope="col">Seat Capacity</th>
                        <th scope="col">AC/Non-AC</th>

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
                            <td>{{$vehicle->seat_capacity}}</td>
                            <td>
                                @if ($vehicle->ac == 1)
                                    {{"AC"}}
                                    @else
                                {{"Non AC"}}
                                    @endif
                            </td>

                            <td>
                                @if( $vehicle->ownership_status == 1)
                                    {{"Yes"}}
                                    @else
                                    {{"No"}}
                                   @endif

                            </td>
                            <td>
                               @if ($vehicle->status== 1)
                                   {{"Yes"}}
                                   @else
                                   {{"No"}}

                               @endif

                            <td>
                                <a title="" href="{{url("vehicle/$vehicle->id")}}" class="btn btn-primary" style="float: left; margin-right: 2px"><i>View</i></a>
                                <a title="" href="{{url("vehicle/$vehicle->id/edit")}}" class="btn btn-primary" style="float: left; margin-right: 2px"><i class="fa fa-pencil"></i></a>
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
