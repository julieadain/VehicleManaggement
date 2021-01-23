@extends("layout.admin")

@section('content')
    <section class="content">
        <div class="row">

        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h2 class="box-title">Payment List </h2>
                        @if(\Illuminate\Support\Facades\Auth::user()->role != 1 || session('Org_info'))
                            <a class=" btn btn-default pull-right" href="{{ url('adminPaymentCreate') }}">Make payment</a>
                        @endif
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table id="vehicle_datatable" class="table table-hover">
                            <thead>
                            @if(\Illuminate\Support\Facades\Auth::user()->role == 1 && empty(session('Org_info')))
                                <tr>
                                    <th class="bg-primary">Date</th>
                                    <th class="bg-primary">Organization</th>
                                    <th class="bg-primary">Client name</th>
                                    <th class="bg-primary">Package</th>
                                    <th class="bg-primary">Paid</th>
                                    <th class="bg-primary"></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($payments as $payment )
                                <tr>
                                    <td>{{$payment->date}}</td>
                                    <td>{{$payment->organization? $payment->organization->org_name : null}}</td>
                                    <td>{{$payment->organization ? $payment->organization->owner->name : null}}</td>
                                    <td>{{$payment->package? $payment->package->title : null}}</td>
                                    <td> {{$payment->paid}}</td>

                                    <td>
                                        <form action="{{url("payment/".$payment->id)}}" method="post"
                                              style="float: left; margin-right: 2px">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure')"><i
                                                        class="fa fa-trash-o"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            @endif

                            @if(\Illuminate\Support\Facades\Auth::user()->role != 1 || session('Org_info'))
                                <tr>
                                    <th class="bg-primary">Date</th>
                                    <th class="bg-primary">Client name</th>
                                    <th class="bg-primary">Location</th>
                                    <th class="bg-primary">Paid</th>
                                    <th class="bg-primary">Due</th>
                                    <th class="bg-primary"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($payments as $payment )
                                    <tr>
                                        <td>{{$payment->date}}</td>
                                        <td>{{$payment->client ? $payment->client->name : null}}</td>
                                        <td>{{$payment->organization? $payment->organization->org_name : null}}</td>
                                        <td> {{$payment->paid}}</td>
                                        <td> {{$payment->paid}}</td>
                                        <td>
                                            <form action="{{url("payment/".$payment->id) }}" method="post"
                                                  style="float: left; margin-right: 2px">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Are you sure')"><i
                                                            class="fa fa-trash-o"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            @endif
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix" style="margin-right:50px;">

                        <ul class="pagination pagination-sm no-margin pull-right">
                            {{$payments->links()}}
                        </ul>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
@endsection

