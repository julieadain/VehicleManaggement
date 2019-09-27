
@extends("layout.admin")

@section('content')
    <section class="content-header">
        <h3>
            Driver Detail
        </h3>
{{--        <ol class="breadcrumb">--}}
{{--            <li><a href="{{url('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>--}}
{{--        </ol>--}}
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
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Driver Photo</th>
                        <th scope="col">DL Scan Copy</th>
                        <th scope="col">NID Scan Copy</th>

                    </tr>
                    </thead>

                    @foreach($drivers as $driver)

                        <tr>
                            <td>{{$driver->name}}</td>
                            <td>{{$driver->email}}</td>
                            <td>{{$driver->phone}}</td>
                            <td>{{$driver->address}}</td>
                            <td>
                                <img src="{{asset('upload').'/'.$driver->photo}}" alt="image" height="50px" width="50px">
                            </td>

                            <td>
                                <img src="{{asset('upload').'/'.$driver->dl_scan}}" alt="image" height="50px" width="50px">
                            </td>
                            <td>
                                <img src="{{asset('upload').'/'.$driver->nid_scan}}" alt="image" height="50px" width="50px">
                            </td>
                            <td>
                            <a title="rdgrdg" href="{{url("driver/$driver->id/edit")}}" class="btn btn-primary" style="float: left; margin-right: 2px"><i class="fa fa-pencil"></i></a>
                                <form action="{{url("driver/$driver->id") }}" method="post" style="float: left; margin-right: 2px">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure')"><i class="fa fa-trash-o"></i></button>

                                </form>
                            </td>

                        </tr>

                    @endforeach
                    {{$drivers->links()}}

                </table>
            </div>
        </div>
    </section>


@endsection

