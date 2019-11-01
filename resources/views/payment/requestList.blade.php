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
                        <h2 class="box-title">Payment requests</h2>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table id="vehicle_datatable" class="table table-hover">
                            <thead>
                            <tr>
                                <th class="bg-primary"> Due Date</th>
                                <th class="bg-primary">Package</th>
                                <th class="bg-primary">Client name</th>
                                <th class="bg-primary">Organization</th>
                                <th class="bg-primary">Paid</th>
                                <th class="bg-primary"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($payments->count() == 0)
                                <tr>
                                    <td><h3 class="text-warning"> No request found !</h3></td>
                                </tr>
                            @endif
                            @foreach($payments as $payment )
                                <tr>
                                    <td>{{$payment->date}}</td>
                                    <td>{{$payment->package? $payment->package->title : null}}</td>
                                    <td>{{$payment->organization ? $payment->organization->owner->name : null}}</td>
                                    <td>{{$payment->organization? $payment->organization->org_name : null}}</td>
                                    <td> {{$payment->paid}}</td>

                                    <td>
                                        <a class="btn btn-success" href="{{url('paymentApprove/'. $payment->id)}}">Approve</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
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

