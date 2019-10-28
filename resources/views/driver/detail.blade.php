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
                        <h2 class="box-title">Driver List </h2>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table id="driver_datatable" class="table table-hover">
                            <thead>
                            <tr>
                                <th class="bg-primary">Name</th>
                                <th class="bg-primary">Email</th>
                                <th class="bg-primary">Phone</th>
                                <th class="bg-primary">Address</th>

                                <th class="bg-primary">Option</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($drivers as $driver )
                                <tr>
                                    <td>{{ $driver->name }}</td>
                                    <td> {{$driver->email}}</td>
                                    <td>{{$driver->phone}}</td>
                                    <td>{{$driver->address}}</td>

                                    <td>
                                        <a title="" href="{{url("driver/$driver->id")}}" class="btn btn-primary" style="float: left; margin-right: 2px"><i class="fa fa-eye"></i></a>
                                        <a title="" href="{{url("driver/$driver->id/edit")}}" class="btn btn-primary" style="float: left; margin-right: 2px"><i class="fa fa-pencil"></i></a>
                                        <form action="{{url("driver/$driver->id") }}" method="post" style="float: left; margin-right: 2px">
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
                            {{$drivers->links()}}

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
        $('#driver_datatable').DataTable({
            'paging': false,
            'lengthChange': false,
            'searching': true,
            'ordering': false,
            'info': false,
            'autoWidth': false
        })
    </script>

@endpush












