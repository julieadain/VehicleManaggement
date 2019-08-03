@extends("layout.admin")

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="col-xs-7">
            <div class="container box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Organizations |
                        <span class="label label-primary pull-right">{{ "125"}}</span>
                    </h3>

                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control pull-right"
                                   placeholder="Search">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr class="lovelyrow">
                            <th>Name</th>
                            <th>Owner</th>
                            <th>Email</th>
                            <th>Status</th>
                        </tr>
                        @foreach($organizations as $organization)
                            <tr class="lovelyrow" onclick="location.href='organization/{{$organization->id}}'">
                                <td>{{$organization->org_name}}</td>

                                <td>{{ $organization->owner ? $organization->owner->name : null }}</td>
                                <td>{{ $organization->owner ? $organization->owner->email : null }}</td>
                                <td><span class="label label-success">Approved</span></td>
                            </tr>
                        @endforeach
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
                        <span class="label label-warning pull-right">{{ "15"}}</span>
                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table id="example1" class="table table-hover ">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Owner</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr class="lovelyrow" onclick="location.href='organization/{{$organization->id}}'">
                            <td>Try</td>
                            <td>Mr. Abc</td>
                            <td>abc@xyz.com</td>
                        </tr>

                        <tr class="lovelyrow" onclick="location.href='organization/{{$organization->id}}'">
                            <td>Trident</td>
                            <td>Mr. Abc</td>
                            <td>abc@xyz.com</td>
                        </tr>
                        <tr class="lovelyrow" onclick="location.href='organization/{{$organization->id}}'">
                            <td>Trident</td>
                            <td>Mr. Abc</td>
                            <td>abc@xyz.com</td>
                        </tr>
                        <tr class="lovelyrow" onclick="location.href='organization/{{$organization->id}}'">
                            <td>Trident</td>
                            <td>Mr. Abc</td>
                            <td>abc@xyz.com</td>
                        </tr>
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
                        <span class="label label-danger pull-right">{{ "3"}}</span>
                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table id="example1" class="table table-hover ">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Owner</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Trident</td>
                            <td>Mr. Abc</td>
                            <td>abc@xyz.com</td>
                            <th><a class="btn btn-success" href="#">Approve</a></th>
                        </tr>
                        <tr>
                            <td>Trident</td>
                            <td>Mr. Abc</td>
                            <td>abc@xyz.com</td>
                            <th><a class="btn btn-success" href="#">Approve</a></th>
                        </tr>
                        <tr>
                            <td>Trident</td>
                            <td>Mr. Abc</td>
                            <td>abc@xyz.com</td>
                            <th><a class="btn btn-success" href="#">Approve</a></th>
                        </tr>
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