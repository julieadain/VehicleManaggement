@extends("layout.admin")

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="col-xs-7">
            <div class="container box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Organizations |
                        <span class="label label-primary pull-right">{{ $organizations->count() }}</span>
                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table id="org_datatable" class="table table-hover">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Owner</th>
                            <th>Email</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($organizations as $organization)
                            <tr class="lovelyrow" onclick="location.href='organization/{{$organization->id}}'">
                                <td>{{$organization->org_name}}</td>
                                <td>{{ $organization->owner ? $organization->owner->name : null }}</td>
                                <td>{{ $organization->owner ? $organization->owner->email : null }}</td>
                                <td><span class="label label-success">Approved</span></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

        <div class="col-xs-5">
            <div class="container box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Requests |
                        <span class="label label-warning pull-right">{{ $requests->count()}}</span>
                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover ">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Owner</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($requests as $request)
                            <tr class="lovelyrow" onclick="location.href='organization/{{$request->id}}'">
                                <td>{{$request->org_name}}</td>
                                <td>{{ $request->owner ? $request->owner->name : null ?? ''}}</td>
                                <td>{{ $request->owner ? $request->owner->email : null  ?? ''}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <div class="col-xs-5 pull-right">
            <div class="container box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Denied |
                        <span class="label label-danger pull-right">{{ $denials->count()}}</span>
                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover ">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Owner</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($denials as $denial)
                            <tr class="lovelyrow">
                                {{--                                {{ dd($denial->owner) }}--}}
                                <td>{{$denial->org_name}}</td>
                                <td>{{ $denial->owner ? $denial->owner->name : null }}</td>
                                <td>{{ $denial->owner ? $denial->owner->email : null }}</td>
                                <td><a class="btn btn-success" href="{{url('/approve/'. $denial->id)}}">Approve</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection

@push("page-js")
    <!-- DataTables -->
    <script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $('#org_datatable').DataTable({
            'paging': false,
            'lengthChange': false,
            'searching': true,
            'ordering': false,
            'info': false,
            'autoWidth': false
        })
    </script>

@endpush