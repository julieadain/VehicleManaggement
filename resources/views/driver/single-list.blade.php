
@extends("layout.admin")

@section('content')
    <section class="content-header">


    </section>

    <!-- Main content -->
    <section class="content">
        <h3 class="container">
            Driver Profile
        </h3>
        <div class="container">
            <div class="col-md-7 pull-left">


                <!-- Horizontal Form -->
                <div class=" container box box-success">

                    <!-- /.box-header -->
                    <!-- form start -->


                    <table class="table">

                        <tbody>
                        <tr>
                            <th scope="row">Name:</th>
                            <td>{{ $driver->name }}</td>
                        </tr>

                        <tr>
                            <th scope="row">Email:</th>
                            <td>{{ $driver->email}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Phone:</th>
                            <td>{{ $driver->phone}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Address:</th>
                            <td>{{ $driver->address}}</td>
                        </tr>
                        <tr>
                            <th scope="row">DL Scan Copy:</th>
                            <td><a href="{{asset('upload').'/'.$driver->dl_scan}}" target="_blank">{{$driver->dl_scan}}</a>

                            </td>
                        </tr>
                        <tr>
                            <th scope="row">NID Scan Copy:</th>
                            <td><a href="{{asset('upload').'/'.$driver->nid_scan}}" target="_blank">{{$driver->nid_scan }}</a>

                            </td>
                        </tr>

                        </tr>



                        </tbody>
                    </table>
                </div>
            </div>
            <div class=" col-md-5 pull-right ">
                <div class="card">
                    <img src="{{asset('upload').'/'.$driver->photo}}" alt="image" style="width: 32rem;">

                </div>
            </div>
        </div>
    </section>
@endsection










































{{--@extends("layout.admin")--}}

{{--@section('content')--}}
{{--    <section class="content-header">--}}
{{--        <h3 class="container">--}}
{{--            Driver Detail--}}
{{--        </h3>--}}

{{--    </section>--}}

{{--    <!-- Main content -->--}}
{{--    <section class="content">--}}
{{--        <div class="col-md-8">--}}
{{--            <!-- Horizontal Form -->--}}
{{--            <div class="box box-info">--}}

{{--                <!-- /.box-header -->--}}
{{--                <!-- form start -->--}}


{{--                <table class="table">--}}
{{--                    <caption></caption>--}}
{{--                    <thead>--}}


{{--                    <tr>--}}
{{--                        <th scope="row">Name:</th>--}}
{{--                        <td>{{ $driver->name }}</td>--}}
{{--                    </tr>--}}

{{--                    <tr>--}}
{{--                        <th scope="row">Email:</th>--}}
{{--                        <td>{{ $driver->email}}</td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <th scope="row">Phone:</th>--}}
{{--                        <td>{{ $driver->phone}}</td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <th scope="row">Address:</th>--}}
{{--                        <td>{{ $driver->address}}</td>--}}
{{--                    </tr>--}}

{{--                    <tr>--}}
{{--                        <th scope="row">DL Scan:</th>--}}
{{--                        <td>--}}
{{--                            <img src="{{asset('upload').'/'.$driver->dl_scan}}" alt="image" style="width: 20rem;">--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <th scope="row">Driver Photo:</th>--}}
{{--                        <td>--}}
{{--                            <img src="{{asset('upload').'/'.$driver->photo}}" alt="image" style="width: 20rem;">--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <th scope="row">NID Scan:</th>--}}
{{--                        <td>--}}
{{--                            <img src="{{asset('upload').'/'.$driver->nid_scan}}" alt="image" style="width: 20rem;">--}}
{{--                        </td>--}}
{{--                    </tr>--}}

{{--                    </thead>--}}
{{--                </table>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        </div>--}}
{{--    </section>--}}


{{--@endsection--}}