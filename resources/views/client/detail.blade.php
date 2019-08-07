
@extends("layout.admin")

@section('content')
    <section class="content-header">
        <h3>
             Client Detail
        </h3>
        <ol class="breadcrumb">
            <li><a href="{{url('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        </ol>
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
                            <th scope="col">Option</th>

                        </tr>
                        </thead>

                        @foreach($clients as $client)

                        <tr>
                            <td>{{$client->name}}</td>
                            <td>{{$client->email}}</td>
                            <td>{{$client->phone}}</td>
                            <td>{{$client->address}}</td>
                            <td>
                                <a title="rdgrdg" href="{{url("client/$client->id/edit")}}" class="btn btn-primary" style="float: left; margin-right: 2px"><i class="fa fa-pencil"></i></a>
                                <form action="{{ route('client.destroy', $client->id) }}" method="post" style="float: left; margin-right: 2px">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure')"><i class="fa fa-trash-o"></i></button>

                                </form>
                            </td>

                        </tr>

                        @endforeach

                        {{$clients->links()}}

                    </table>
            </div>
        </div>
    </section>


@endsection
