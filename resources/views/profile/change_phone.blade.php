@extends("layout.admin")

@section('content')
    <div class="container">
        <section class="col-md-6 connectedSortable pull-left" style="padding-top: 10px;">
            <!-- Profile Image -->
            <div class="box box-primary">
                @if ($errors->any())
                    <div class="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-danger">{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ url('storePhone') }}" enctype="multipart/form-data"
                      style="padding: 10px;">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputPhone1">Present Phone</label>
                        <input type=tel class="form-control" name="phone" id="exampleInputPhone1" {{--value="{{$request?? $request->old('phone') }}"--}} placeholder="Enter current phone">
                        @if (session('errorPhone'))
                            <h5 class="text-danger pull-right">{{session('errorPhone')}}</h5>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPhone">New Phone</label>
                        <input type=tel class="form-control" name="newPhone" id="exampleInputPhone" {{--value="{{$request?? $request->old('newPhone')}}"--}} aria-describedby="addressHelp" placeholder="Enter new phone">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Enter Password</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                        @if (session('errorPass'))
                            <h5 class="text-danger pull-right">{{session('errorPass')}}</h5>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>
        <section class="col-md-6 connectedSortable pull-right" style="padding-top: 10px;">
            <!-- Profile Image -->
            <div class="box no-border">
                <div class="box-body ">
                    <ul class="list-group">
                        <li class="list-group-item no-border">
                            <a href="{{url('changeLogo')}}">Change profile Logo</a>
                        </li>
                        <li class="list-group-item no-border">
                            <a href="{{url('changePhone')}}">Change Phone</a>
                        </li>
                        <li class="list-group-item no-border ">
                            <a href="{{url('changeEmail')}}">Change Email</a>
                        </li>
                        <li class="list-group-item no-border">
                            <a href="{{url('changeAddress')}}">Change Address</a>
                        </li>
                        <li class="list-group-item no-border">
                            <a href="{{url('changePassword')}}">Change Password</a>
                        </li>

                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>
    </div>
@endsection
