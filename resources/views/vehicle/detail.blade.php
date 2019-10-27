
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

                        {{--<div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>--}}
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table id="vehicle_datatable" class="table table-hover">
                            <thead>
                            <tr>
                                <th class="bg-primary">Brand</th>
                                <th class="bg-primary">Model</th>
                                <th class="bg-primary">Color</th>
                                <th class="bg-primary">Seat Capacity</th>
                                <th class="bg-primary">AC/Non AC</th>

                                <th class="bg-primary">Registration Number</th>
                                <th class="bg-primary">Option</th>
                            </tr>
                            </thead>
                            <tbody>
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
                            </tbody>
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



@endsection

@push("page-js")
    <!-- DataTables -->
    <script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $('#vehicle_datatable').DataTable({
            'paging': false,
            'lengthChange': false,
            'searching': true,
            'ordering': false,
            'info': false,
            'autoWidth': false
        })
    </script>

@endpush
