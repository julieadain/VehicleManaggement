@extends("layout.admin")

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="col-xs-7">
            <div class="box box-primary">
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
                        <tr>
                            <th>Name</th>
                            <th>Owner</th>
                            <th>Email</th>
                            <th>Status</th>
                        </tr>
                        <tr>
                            <td>183</td>
                            <td>John Doe</td>
                            <td>abc@xyz.com</td>
                            <td><span class="label label-success">Approved</span></td>
                        </tr>
                        <tr>
                            <td>219</td>
                            <td>Alexander Pierce</td>
                            <td>abc@xyz.com</td>
                            <td><span class="label label-warning">Pending</span></td>
                        </tr>
                        <tr>
                            <td>657</td>
                            <td>Bob Doe</td>
                            <td>abc@xyz.com</td>
                            <td><span class="label label-success">Approved</span></td>
                        </tr>
                        <tr>
                            <td>175</td>
                            <td>Mike Doe</td>
                            <td>abc@xyz.com</td>
                            <td><span class="label label-danger">Denied</span></td>
                        </tr>
                        <tr>
                            <td>219</td>
                            <td>Alexander Pierce</td>
                            <td>abc@xyz.com</td>
                            <td><span class="label label-warning">Pending</span></td>
                        </tr>
                        <tr>
                            <td>657</td>
                            <td>Bob Doe</td>
                            <td>abc@xyz.com</td>
                            <td><span class="label label-success">Approved</span></td>
                        </tr>
                        <tr>
                            <td>175</td>
                            <td>Mike Doe</td>
                            <td>abc@xyz.com</td>
                            <td><span class="label label-danger">Denied</span></td>
                        </tr>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>


        <div class="col-xs-5">
            <div class="box box-primary">
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

                        <tr>
                            <td>Try</td>
                            <td>Mr. Abc</td>
                            <td>abc@xyz.com</td>
                           <td><a class="button" href="#"><span> >> </span> </a></td>
                        </tr>

                        <tr>
                            <td>Trident</td>
                            <td>Mr. Abc</td>
                            <td>abc@xyz.com</td>
                            <td><a class="button" href="#"><span> >> </span> </a></td>

                        </tr>
                        <tr>
                            <td>Trident</td>
                            <td>Mr. Abc</td>
                            <td>abc@xyz.com</td>
                            <td><a class="button" href="#"><span> >> </span> </a></td>

                        </tr>
                        <tr>
                            <td>Trident</td>
                            <td>Mr. Abc</td>
                            <td>abc@xyz.com</td>
                            <td><a class="button" href="#"><span> >> </span> </a></td>

                        </tr>

                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <div class="col-xs-5">
            <div class="box box-primary">
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
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>


        </div>


        <!-- /.row -->
    </section>
    <!-- /.content -->
    </div>

@endsection