
@extends("layout.admin")

@section('content')



    <section class="content">
        <div class="row">

            <!-- /.col -->

            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h2 class="box-title">Vehicle List </h2>

                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th class="bg-primary">Brand</th>
                                <th class="bg-primary">Model</th>
                                <th class="bg-primary">Color</th>
                                <th class="bg-primary">Seat Capacity</th>
                                <th class="bg-primary">AC/Non AC</th>

                                <th class="bg-primary">Registration Number</th>
                                <th class="bg-primary">Option</th>
                            </tr>
                            @foreach($vehicles as $vehicle )
                            <tr>
                                <td>{{ $vehicle-> brand}}</td>
                                <td> {{$vehicle->model}}</td>
                                <td>{{$vehicle->color}}</td>
                                <td>{{$vehicle->seat_capacity}}</td>
                                <td>
                                    @if ($vehicle->ac == 1)
                                        {{"AC"}}
                                    @else
                                        {{"Non AC"}}
                                    @endif
                                </td>
                                <td>{{$vehicle->reg_number}}</td>
                                <td>
                                    <a title="" href="{{url("vehicle/$vehicle->id")}}" class="btn btn-primary" style="float: left; margin-right: 2px"><i class="fa fa-eye"></i></a>
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
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix" style="margin-right:50px;">

                        <ul class="pagination pagination-sm no-margin pull-right">
                            {{$vehicles->links()}}

                            {{--                            <li><a href="#">&laquo;</a></li>--}}
{{--                            <li><a href="#">1</a></li>--}}
{{--                            <li><a href="#">2</a></li>--}}
{{--                            <li><a href="#">3</a></li>--}}
{{--                            <li><a href="#">&raquo;</a></li>--}}
                        </ul>
                    </div>


                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>















{{--    <section class="content-header">--}}
{{--        <h3 >--}}
{{--            Vehicle List--}}
{{--        </h3>--}}

{{--    </section>--}}


{{--    <!-- Main content -->--}}
{{--    <section class="container">--}}

{{--            <!-- /.col -->--}}
{{--        <!-- /.row -->--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-10" style="  margin: 60px; height: 50px;" >--}}
{{--                <div class="box">--}}

{{--                    <div class="box-body table-responsive no-padding">--}}
{{--                        <table class="table table-hover">--}}
{{--                            <tr>--}}
{{--                                <th class="bg-primary">Brand</th>--}}
{{--                                <th class="bg-primary">Model</th>--}}
{{--                                <th class="bg-primary">Color</th>--}}
{{--                                <th class="bg-primary">Ac/Non AC</th>--}}
{{--                                <th class="bg-primary">Owner</th>--}}
{{--                                <th class="bg-primary">status</th>--}}
{{--                                <th class="bg-primary">Option</th>--}}

{{--                            </tr>--}}
{{--                            @foreach($vehicles as $vehicle)--}}
{{--                            <tr>--}}
{{--                                <td> {{$vehicle-> brand}}</td>--}}
{{--                                <td> {{$vehicle->model}} </td>--}}
{{--                                <td> {{$vehicle->color}}</td>--}}
{{--                                <td>--}}
{{--                                    @if ($vehicle->ac == 1)--}}
{{--                                        {{"AC"}}--}}
{{--                                    @else--}}
{{--                                        {{"Non AC"}}--}}
{{--                                    @endif--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    @if( $vehicle->ownership_status == 1)--}}
{{--                                        {{"Yes"}}--}}
{{--                                    @else--}}
{{--                                        {{"No"}}--}}
{{--                                    @endif--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                @if ($vehicle->status== 1)--}}
{{--                                    {{"Yes"}}--}}
{{--                                @else--}}
{{--                                    {{"No"}}--}}
{{--                                @endif--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <a title="" href="{{url("vehicle/$vehicle->id")}}" class="btn btn-primary" style="float: left; margin-right: 2px"><i class="fa fa-eye"></i></a>--}}
{{--                                    <a title="" href="{{url("vehicle/$vehicle->id/edit")}}" class="btn btn-primary" style="float: left; margin-right: 2px"><i class="fa fa-pencil"></i></a>--}}
{{--                                    <form action="{{url("vehicle/$vehicle->id") }}" method="post" style="float: left; margin-right: 2px">--}}
{{--                                        @csrf--}}
{{--                                        @method('DELETE')--}}
{{--                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure')"><i class="fa fa-trash-o"></i></button>--}}
{{--                                                                </form>--}}
{{--                                                            </td>--}}




{{--                            </tr>--}}
{{--                            @endforeach--}}


{{--                        </table>--}}
{{--                        <div class="box-footer clearfix">--}}
{{--                        {{$vehicles->links()}}--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- /.box-body -->--}}
{{--                </div>--}}
{{--                <!-- /.box -->--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}



@endsection
