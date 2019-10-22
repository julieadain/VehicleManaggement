






@extends("layout.admin")

@section('content')
    <section class="content-header">
        <h3 >
            Client List
        </h3>

    </section>


    <!-- Main content -->
    <section class="container">

        <!-- /.col -->
        <!-- /.row -->
        <div class="row">
            <div class="col-xs-11">
                <div class="box">

                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th class="bg-primary">Name</th>
                                <th class="bg-primary">Email</th>
                                <th class="bg-primary">Phone</th>
                                <th class="bg-primary"> Address </th>
                                <th class="bg-primary"> Option </th>



                            </tr>
                            @foreach($clients as $client)
                                <tr>
                                    <td> {{$client-> name}}</td>
                                    <td> {{$client->email}} </td>
                                    <td> {{$client->phone}}</td>
                                    <td> {{$client->address}}</td>

                                    <td>
                                        <a title="rdgrdg" href="{{url("client/$client->id/reservation/create")}}" class="btn btn-primary" style="float: left; margin-right: 2px"> Order now </a>
                                        <a title="rdgrdg" href="{{url("client/$client->id/edit")}}" class="btn btn-primary" style="float: left; margin-right: 2px"><i class="fa fa-pencil"></i></a>
                                        <form action="{{ route('client.destroy', $client->id) }}" method="post" style="float: left; margin-right: 2px">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure')"><i class="fa fa-trash-o"></i></button>
                                        </form>
                                    </td>




                                </tr>
                            @endforeach


                        </table>
                        {{$clients->links()}}
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>






@endsection
