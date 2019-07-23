@extends("layout.admin")

@section('content')
    <section class="content-header">
        <h1>
            Add driver
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Add driver</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Add drive's information</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Name</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPhone" class="col-sm-2 control-label">Phone</label>

                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="exampleInputPhone" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPhoto" class="col-sm-2 control-label">Photo</label>

                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="exampleInputPhoto" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputDl" class="col-sm-2 control-label">Scanned driving license</label>

                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="exampleInputDl" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputNID" class="col-sm-2 control-label">Scanned NID copy</label>

                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="exampleInputNID" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputbtn" class="col-sm-2 control-label"></label>

                        <div class="col-md-1">
                            <button type="submit" class="form-control btn btn-primary" id="exampleInputbtn">Save</button>
                        </div>
                    </div>
                    <br/>
                </form>
            </div>
        </div>
    </section>


@endsection
