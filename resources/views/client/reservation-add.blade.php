@extends("layout.admin")

@section('content')
    <section class="content-header">
        <h1>
            Add Reservation
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class=" container box box-info">
                <div class="box-header">
                </div>


                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
            @endif

            <!-- /.box-header -->
                <!-- form start -->
                <form action="{{url("client/$clientId/reservation/create")}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    @csrf


                    <div class="form-group">
                        <label for="inputBrand" class="col-sm-2 control-label">Start Date Time</label>

                        <div class="col-sm-10">
                            <input type="datetime-local" name="start_date_time" class="form-control" id="inputBrand" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputBrand" class="col-sm-2 control-label">End Date Time</label>

                        <div class="col-sm-10">
                            <input type="datetime-local" name="end_date_time" class="form-control" id="inputBrand" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputBrand" class="col-sm-2 control-label">Seat Capacity</label>

                        <div class="col-sm-10">
                            <input type="text" name="seat_capacity" class="form-control" id="inputBrand" placeholder="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputAc" class="col-sm-2 control-label">Select</label>
                        <div class="col-sm-10">
                            <select name="ac" class="form-control">
                                <option value="1">AC</option>
                                <option value="2">Non-AC</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputAc" class="col-sm-2 control-label">Ownership</label>
                        <div class="col-sm-10">
                            <select name="share" class="form-control">
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputBrand" class="col-sm-2 control-label">Pick up Address</label>

                        <div class="col-sm-10">
                            <input type="text" name="pickup_address" class="form-control" id="inputBrand" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputBrand" class="col-sm-2 control-label">Location</label>

                        <div class="col-sm-10">
                            <input type="text" name="location" class="form-control" id="inputBrand" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputBrand" class="col-sm-2 control-label">Start Meter reading</label>

                        <div class="col-sm-10">
                            <input type="text" name="start_meter_reading" class="form-control" id="inputBrand" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputBrand" class="col-sm-2 control-label">End Meter Reading</label>

                        <div class="col-sm-10">
                            <input type="text" name="end_meter_reading" class="form-control" id="inputBrand" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputBrand" class="col-sm-2 control-label">Total Payable</label>

                        <div class="col-sm-10">
                            <input type="text" name="total_payable" class="form-control" id="inputBrand" placeholder="">
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

