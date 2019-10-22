
@extends("layout.admin")

@section('content')
    <section class="content-header">
        <h3 >
            Active Client
        </h3>

    </section>


    <!-- Main content -->
    <section class="container">

        <!-- /.col -->
        <!-- /.row -->
        <div class="row">
            <div class="col-xs-9">
                <div class="box">

                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th class="bg-primary">Name</th>
                                <th class="bg-primary">Email</th>
                                <th class="bg-primary">Phone</th>
                                <th class="bg-primary"> Address </th>



                            </tr>
                            @foreach($activeClient as $client)
                                <tr>
                                    <td> {{$client-> name}}</td>
                                    <td> {{$client->email}} </td>
                                    <td> {{$client->phone}}</td>
                                    <td> {{$client->address}}</td>


                                </tr>
                            @endforeach


                        </table>
                        {{$activeClient->links()}}
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>




@endsection
