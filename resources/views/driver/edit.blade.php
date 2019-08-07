@extends("layout.admin")

@section('content')
    <section class="content-header">
        <h1>
            Edit Driver
            {{--            <small>Preview</small>--}}
        </h1>
        {{--        <ol class="breadcrumb">--}}
        {{--            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>--}}
        {{--        </ol>--}}
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class=" container box box-info">
                <div class="box-header">
                </div>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <p>{{$error}}</p>
                @endforeach
            @endif

            <!-- /.box-header -->
                <!-- form start -->
                <form action="{{url("driver/$driver->id")}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    @method('PATCH')

                    <div class="form-group">
                        <label for="inputBrand" class="col-sm-2 control-label">Name</label>

                        <div class="col-sm-10">
                            <input type="text" name="name" value="{{old('name', $driver->name)}}" class="form-control" id="inputBrand" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputModel" class="col-sm-2 control-label">Email</label>

                        <div class="col-sm-10">
                            <input type="email" name="email" value="{{old('email', $driver->email)}}" class="form-control" id="exampleInputModel" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputColor" class="col-sm-2 control-label">Phone</label>

                        <div class="col-sm-10">
                            <input type="text" name="phone" value="{{old('phone', $driver->phone)}}" class="form-control" id="exampleInputColor" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputRegnum" class="col-sm-2 control-label">Address</label>

                        <div class="col-sm-10">
                            <input type="text" name="address" value="{{old('address', $driver->address)}}" class="form-control" id="exampleInputRegNum" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPhoto" class="col-sm-2 control-label">Driver Photo</label>

                        <div class="col-sm-10">
                            <input type="file"  name="photo" class="form-control" id="exampleInputPhoto" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPhoto" class="col-sm-2 control-label">DL Scan Copy</label>

                        <div class="col-sm-10">
                            <input type="file"  name="dl_scan" class="form-control" id="exampleInputPhoto" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPhoto" class="col-sm-2 control-label">NID Scan Copy</label>

                        <div class="col-sm-10">
                            <input type="file"  name="nid_scan" class="form-control" id="exampleInputPhoto" placeholder="">
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
