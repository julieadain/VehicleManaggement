@extends("layout.admin")

@section('content')
    <section class="content-header">
        <h3 class="container">
            Edit Payment
        </h3>
        <ol class="breadcrumb">
            <li><a href="{{url('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="container box box-info">
                <div class="box-header">
                </div>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <p>{{$error}}</p>
                @endforeach
            @endif

            <!-- /.box-header -->
                <!-- form start -->
                <form action="{{url("payment/$payment->id")}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="inputBrand" class="col-sm-2 control-label">Date</label>

                        <div class="col-sm-10">
                            <input type="date" name="date" value="{{old('date', $payment->date)}}" class="form-control" id="inputBrand" placeholder="" {{'disabled'}}>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputModel" class="col-sm-2 control-label">Email</label>

                        <div class="col-sm-10">
                            <input type="name" name="package" value="{{old('package', $payment->package->title)}}" class="form-control" id="exampleInputModel" placeholder="" {{"disabled"}}>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputColor" class="col-sm-2 control-label">Phone</label>

                        <div class="col-sm-10">
                            <input type="text" name="phone" value="{{old('phone', $client->phone)}}"class="form-control" id="exampleInputColor" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputRegnum" class="col-sm-2 control-label">Address</label>

                        <div class="col-sm-10">
                            <input type="text" name="address" value="{{old('address', $client->address)}}" class="form-control" id="exampleInputRegNum" placeholder="">
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
