@extends("layout.admin")

@section('content')
    <section class="content-header">
        <h1>
           Add vehicle
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="container box box-info">
                <div class="box-header ">
                </div>
               @if ($errors->any())
                   @foreach ($errors->all() as $error)
                       <p>{{$error}}</p>
                   @endforeach
                   
               @endif
                
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{url('vehicle')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    <div class="form-group">
                        <label for="inputBrand" class="col-sm-2 control-label">Brand</label>

                        <div class="col-sm-10">
                            <input type="text" name="brand" class="form-control" id="inputBrand" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputModel" class="col-sm-2 control-label">Model</label>

                        <div class="col-sm-10">
                            <input type="text" name="model" class="form-control" id="exampleInputModel" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputColor" class="col-sm-2 control-label">Color</label>

                        <div class="col-sm-10">
                            <input type="text" name="color" class="form-control" id="exampleInputColor" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputRegnum" class="col-sm-2 control-label">Registration number</label>

                        <div class="col-sm-10">
                            <input type="text" name="reg_number" class="form-control" id="exampleInputRegNum" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputRegYear" class="col-sm-2 control-label">Registration year</label>

                        <div class="col-sm-10">
                            <input type="date" name="reg_date" class="form-control" id="exampleInputRegYear" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCapacity" class="col-sm-2 control-label">Seat capacity</label>

                        <div class="col-sm-10">
                            <input type="number" name="seat_capacity" class="form-control" id="exampleInputCapacity" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputAc" class="col-sm-2 control-label">AC/Non-AC</label>
                        <div class="col-sm-10">
                            <select name="ac" class="form-control">
                                <option value="1">AC</option>
                                <option value="2">Non-AC</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputAc" class="col-sm-2 control-label">Ownership Status</label>
                        <div class="col-sm-10">
                            <select name="ownership_status" class="form-control">
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPhoto" class="col-sm-2 control-label">Vehicle Photo</label>

                        <div class="col-sm-10">
                            <input type="file" name="photo" class="form-control" id="exampleInputPhoto" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPhoto" class="col-sm-2 control-label">Scanned registration copy</label>

                        <div class="col-sm-10">
                            <input type="file"  name="reg_scan_copy" class="form-control" id="exampleInputPhoto" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPhoto" class="col-sm-2 control-label">Scanned Insurance Copy</label>

                        <div class="col-sm-10">
                            <input type="file" name="insurance_scan_copy" class="form-control" id="exampleInputPhoto" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPhoto" class="col-sm-2 control-label">Scanned Route Permit copy</label>

                        <div class="col-sm-10">
                            <input type="file" name="roadPermit_scan_copy" class="form-control" id="exampleInputPhoto" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputAc" class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-10">
                            <select name="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="2">Inactive</option>
                            </select>
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
