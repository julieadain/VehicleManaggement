@extends("layout.admin")

@section('content')
    <div class="container">
        <section class="col-md-6 connectedSortable pull-left" style="padding-top: 10px;">
            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle"
                         src="{{asset('upload').'/'.$organization->logo}}" alt="User profile picture">
                </div>
                @if ($errors->any())
                    <div class="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-danger">{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ url('/storeLogo') }}" enctype="multipart/form-data"
                      style="padding: 10px;">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputFile">Logo</label>
                        <input type="file" class="form-control" name="logo" id="exampleInputFile"
                               aria-describedby="fileHelp">
                       {{--@if($errors('logo'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @endif--}}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Enter Password</label>
                        @if (session('error'))
                            <h5 class="text-danger pull-right">{{session('error')}}</h5>
                        @endif
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1"
                               placeholder="Password">
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
