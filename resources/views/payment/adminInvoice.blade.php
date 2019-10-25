@extends("layout.admin")

@section('content')
    <div class="container" xmlns:margin-right="http://www.w3.org/1999/xhtml">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Invoice - Admin
                <small>{{'#000343'}}</small>
            </h1>
        </section>
        <!-- Main content -->
        <section class="invoice col-md-11">
            <!-- title row -->
            <div class="container row">
                <div class="col-xs-10">
                    <h2 class="page-header">
                        <i class="fa fa-globe"></i> {{ $organization->org_name }}
                        <small class="pull-right">Date: {{ date('d-m-Y') }}</small>
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    From
                    <address>
                        <strong>Latent Soft</strong><br>
                        795 Folsom Ave, Suite 600<br>
                        San Francisco, CA 94107<br>
                        Phone: (555) 539-1037<br>
                        Email: john.doe@example.com
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    To
                    <address>
                        <strong>{{ $organization->org_name }}</strong><br>
                        {{$organization->address}}
                        <br>
                        {{ $organization->owner->email}}
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                <br>

                    <b>Order ID:</b> 4F3S8J<br>
                    <b>Payment for:</b> {{'12/12/2020'}}<br>
                    <b>Account:</b> 968-34567
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-xs-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Serial #</th>
                            <th>Package</th>
                            <th>Remark</th>
                            <th>Cost(Tk.)</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>{{$organization->package->title}}</td>
                            <td>{{$organization->package->remark? $organization->package->remark : null}}</td>
                            <td>{{$organization->package->cost}}</td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <!-- accepted payments column -->

                <!-- /.col -->
                <div class="col-xs-6 pull-right" style="padding-top: 25px;">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th style="width:50%">Cost:</th>
                                <td>{{$organization->package->cost}}</td>
                            </tr>
                            <tr>
                                <th>Tax (15.00%)</th>
                                <td>{{'$10.34'}}</td>
                            </tr>

                            <tr>
                                <th>Total:</th>
                                <td>$265.24</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- this row will not appear when printing -->
            <div class="row no-print">
                <div class="col-xs-12">
                    <a href="{{url('/paymentRequest/'.$organization->id)}}"  class="btn btn-success pull-right"
                       style="margin-right: 5px;"><i class="fa fa-credit-card"></i> Submit payment</a>

                    </button>
                    <a href="{{ url('/invoicePrint/'.$organization->id) }}" target="_blank" class="btn btn-primary pull-right"
                       style="margin-right: 5px;"><i class="fa fa-print"></i> Print</a>

                </div>
            </div>
        </section>
        <!-- /.content -->
        <div class="clearfix"></div>
    </div>
@endsection
