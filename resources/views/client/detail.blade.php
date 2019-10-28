@extends("layout.admin")

@section('content')
    <section class="content-header">
        <h3>
            Client List
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-default" style="margin-right: 45px;"><a
                            href="{{url('client/create')}}">
                        <i class="fa fa-plus"> </i> </a></button>
            </div>
        </h3>

    </section>


    <!-- Main content -->
    <section class="container">

        <!-- /.col -->
        <!-- /.row -->
        <div class="row">
            <div class="col-xs-11">
                <div class="box">

                    <div class="box-body table-responsive no-padding">
                        <table id="client_datatable" class="table table-hover">
                            <thead>
                            <tr>
                                <th class="bg-primary">Name</th>
                                <th class="bg-primary">Email</th>
                                <th class="bg-primary">Phone</th>
                                <th class="bg-primary"> Address</th>
                                <th class="bg-primary"> Option</th>


                            </tr>
                            </thead>
                            <tbody>
                            @foreach($clients as $client)
                                <tr>
                                    <td> {{$client-> name}}</td>
                                    <td> {{$client->email}} </td>
                                    <td> {{$client->phone}}</td>
                                    <td> {{$client->address}}</td>

                                    <td>
                                        <div style="width: 200px;">

                                            <a title="rdgrdg" href="{{url("client/$client->id/reservation/create")}}"
                                               class="btn btn-primary" style="float: left; margin-right: 2px"> Order
                                                now </a>
                                            <a title="rdgrdg" href="{{url("client/$client->id/edit")}}"
                                               class="btn btn-primary" style="float: left; margin-right: 2px"><i
                                                        class="fa fa-pencil"></i></a>
                                            <form action="{{ route('client.destroy', $client->id) }}" method="post"
                                                  style="float: left; margin-right: 2px">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Are you sure')"><i
                                                            class="fa fa-trash-o"></i></button>
                                            </form>
                                        </div>
                                    </td>


                                </tr>
                            @endforeach
                            </tbody>


                        </table>
                        <div class="pull-right" style="padding-right: 25px;">{{$clients->links()}}</div>

                    </div>
                    <!-- /.box-body -->
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
        $('#client_datatable').DataTable({
            'paging': false,
            'lengthChange': false,
            'searching': true,
            'ordering': false,
            'info': false,
            'autoWidth': false
        })
    </script>

@endpush
