@extends("layout.admin")

@section('content')
    <section class="col-md-6 connectedSortable pull-left" style="padding-top: 10px;">
        <!-- Profile Image -->
        <div class="box box-primary">
            <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle"
                     src="{{asset('dist/img/user4-128x128.jpg')}}" alt="logo">
            </div>

            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
@endsection