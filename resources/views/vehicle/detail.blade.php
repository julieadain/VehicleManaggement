
@extends("layout.admin")

@section('content')
    <section class="content-header">
        <h3 >
            Vehicle List
        </h3>

    </section>


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
                                <th class="bg-primary">Brand</th>
                                <th class="bg-primary">Model</th>
                                <th class="bg-primary">Color</th>
                                <th class="bg-primary">Ac/Non AC</th>
                                <th class="bg-primary">Owner</th>
                                <th class="bg-primary">status</th>
                                <th class="bg-primary">Option</th>

                            </tr>
                            @foreach($vehicles as $vehicle)
                            <tr>
                                <td> {{$vehicle-> brand}}</td>
                                <td> {{$vehicle->model}} </td>
                                <td> {{$vehicle->color}}</td>
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
                                </td>
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


                        </table>
                        {{$vehicles->links()}}
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>



@endsection
