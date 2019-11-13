@extends("layout.admin")

@section('content')
    <div class="container">
        <section class="col-md-6 connectedSortable pull-left" style="padding-top: 10px;">
            <!-- Profile Image -->
            <div class="box box-primary">
                <form style="padding: 10px;">

                    <div class="form-group">
                        <label for="exampleInputPassword1">Current Password</label>
                        <input type="password" class="form-control" name="currentPassword" id="exampleInputPassword1"  placeholder="Enter current phone">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword2">New Password</label>
                        <input type="password" class="form-control" name="password1" id="exampleInputPassword2" aria-describedby="addressHelp" placeholder="Enter new password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword3">Re-enter new Password</label>
                        <input type="password" class="form-control" name="password2" id="exampleInputPassword3" placeholder="Re-enter new Password">
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
