
@extends("layout.admin")

@section('content')
    <section class="content-header">
        <h3>
            Driver Information
        </h3>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">

                <!-- /.box-header -->
                <!-- form start -->


                <table class="table">
                    <caption></caption>
                    <thead>


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
                        <th scope="row">DL Scan:</th>
                        <td>
                            <img src="{{asset('upload').'/'.$driver->dl_scan}}" alt="image" style="width: 20rem;">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Driver Photo:</th>
                        <td>
                            <img src="{{asset('upload').'/'.$driver->photo}}" alt="image" style="width: 20rem;">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">NID Scan:</th>
                        <td>
                            <img src="{{asset('upload').'/'.$driver->nid_scan}}" alt="image" style="width: 20rem;">
                        </td>
                    </tr>

                    </thead>
                </table>
            </div>
        </div>

        </div>
    </section>


@endsection