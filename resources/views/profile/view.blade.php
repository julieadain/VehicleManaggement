@extends("layout.admin")

@section('content')
    <div class="container">
        <section class="col-md-6 connectedSortable pull-left" style="padding-top: 10px;">
                           <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle"
                             src="{{asset('dist/img/user4-128x128.jpg')}}" alt="User profile picture">

                        <h3 class="profile-username text-center">{{$organization->org_name}}</h3>

                        <p class="text-muted text-center">{{"Member since - " . date('d M Y', strtotime($organization->created_at)) }}</p>

                        <ul class="list-group">
                            <li class="list-group-item">
                                <b>Owner : </b>{{$organization->owner->name}}
                            </li>
                            <li class="list-group-item">
                                <b>Address : </b>{{$organization->address}}
                            </li>
                            <li class="list-group-item">
                                <b>Email : </b>{{$organization->owner->email}}
                            </li>
                            <li class="list-group-item">
                                <b>Phone : </b>{{$organization->owner->phone}}
                            </li>
                            <li class="list-group-item">
                                <b>Trade license : </b>
                                <td><a href="{{asset('upload').'/'.$organization->trade_license_copy}}"
                                       target="_blank">{{$organization->trade_license_copy}}</a>
                            </li>
                        </ul>
                    </div>
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