@extends("layout.admin")

@section('content')
    <div class="container" xmlns:margin-right="http://www.w3.org/1999/xhtml">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Invoice
                <small>{{'#000343'}}</small>
            </h1>
        </section>
        <!-- Main content -->
        <section class="invoice col-md-11">
            <!-- title row -->
            <div class="container row">
                <div class="col-xs-10">
                    <h2 class="page-header">
                        <i class="fa fa-globe"></i> LatentSoft.com
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
                        Phone: (804) 123-5432<br>
                        Email: info@almasaeedstudio.com
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    To
                    <address>
                        <strong>John Doe</strong><br>
                        795 Folsom Ave, Suite 600<br>
                        San Francisco, CA 94107<br>
                        Phone: (555) 539-1037<br>
                        Email: john.doe@example.com
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <b>Invoice #007612</b><br>
                    <br>
                    <b>Order ID:</b> 4F3S8J<br>
                    <b>Payment Due:</b> 2/22/2014<br>
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
                            <th>Qty</th>
                            <th>Product</th>
                            <th>Serial #</th>
                            <th>Description</th>
                            <th>Subtotal</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Call of Duty</td>
                            <td>455-981-221</td>
                            <td>El snort testosterone trophy driving gloves handsome</td>
                            <td>$64.50</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Need for Speed IV</td>
                            <td>247-925-726</td>
                            <td>Wes Anderson umami biodiesel</td>
                            <td>$50.00</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Monsters DVD</td>
                            <td>735-845-642</td>
                            <td>Terry Richardson helvetica tousled street art master</td>
                            <td>$10.70</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Grown Ups Blue Ray</td>
                            <td>422-568-642</td>
                            <td>Tousled lomo letterpress</td>
                            <td>$25.99</td>
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
                <div class="col-xs-6 pull-right">
                    <p class="lead">Amount Due 2/22/2014</p>

                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th style="width:50%">Subtotal:</th>
                                <td>$250.30</td>
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
                    <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
                    </button>
                    <a href="{{ url('/invoicePrint') }}" target="_blank" class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-print"></i> Print</a>

                </div>
            </div>
        </section>
        <!-- /.content -->
        <div class="clearfix"></div>
    </div>
@endsection