@extends("layout.admin")

@section('content')
    <section class="content-header">
        <h1>
            Add Client
        </h1>
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
                <form action="{{url('client')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    <div class="form-group">
                        <label for="inputBrand" class="col-sm-2 control-label">Name</label>

                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="inputBrand" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputModel" class="col-sm-2 control-label">Email</label>

                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control" id="exampleInputModel" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputColor" class="col-sm-2 control-label">Phone</label>

                        <div class="col-sm-10">
                            <input type="number" name="phone" class="form-control" id="exampleInputColor"
                                   placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputRegnum" class="col-sm-2 control-label">Address</label>

                        <div class="col-sm-10">
                            <input type="text" name="address" class="form-control" id="exampleInputRegNum"
                                   placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputbtn" class="col-sm-2 control-label"></label>

                        <div class="col-md-1">
                            <button type="submit" class="form-control btn btn-primary" id="exampleInputbtn">Save
                            </button>
                        </div>
                    </div>
                    <br/>
                </form>
            </div>
        </div>
    </section>


@endsection
