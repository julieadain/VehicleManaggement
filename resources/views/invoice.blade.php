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
                <div class="col-xs-6">
                    <p class="lead">Payment Methods:</p>
                    <a href="">
                    <img src="{{'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGgAAABoCAMAAAAqwkWTAAAAh1BMVEX4+PjjEG7////iAGf5/PvxwtLhAF713+bzztnhAFziAGXiAGnhAGDhAGL7///5//3pYpLgAFf86fDse6LoWYv41uH57vPmQX3pdZ3oaJXuj7HlLHXytcjqbZftharlM3z3y9nnS4XuoLvtlrTyp77oYIvtjKnkPHX0vMzjJ2vlR3nmV4TyrsU0nxHFAAAD9klEQVRoge2Z2ZKqMBRFSQKCiSgyBDWKjBen//++y6igtiTE8on90FJdlMszcBJ2FGXSpEmTJk0aKVVEoyGrJdUNjVOhTpfLMSxVtWPLZ4AgLhHAfDexFVGUujQ2pkmAkAhebA2xqFRlhwUpLcuhAiRVcc0xmFLYpytuDvVHhdME5eu8MS0tPJ4DAPKXfJzVTopTkByukFQdyXEKksdTpuVGGkRcjuSpOqvvPkaMAYQRGdMY3nDyVvu6QiSi1Av36W7ro/V8YQoBcTycu1WbOXSArRRbS4NDFh0BWnA9yGQ7nLrVsf2meQz7oroXnmKXB3XkAM3rW5nrnk/wjTapNUya0SGOStfNvSfFwPSVQ01qLwZB88HpoOpNRACHcO8rLyCPKTAdfKJnxlA3PEAA76GzeQEF/8r0DT1qQiCAb9DfP4Oq/1AwUCYxEFik1AyfMpfb5Uf4XRDASZj3y3Ty689/nxtCFARmuzjqN3fcXLgfYxIGARwcki7I9JqLzzNeHASQlXcaQj/fH639p+SNABUzgth3UNLpd+dDTKNA5SBvvzxLH6Bej5NyaycLArgd5Pr5ERyEBqkRJmJ+FjguI7IgMG/KFJJeCyYLsp4fnVTzipBdTcPSIIC06pur+dNRtL1HaF8oDLE0iLCqTORpTui53l7GTtmJSBYEkFv+6l6Jqh5vBgVU/Ho0MVkQMIuspRl81qZJpr6wLLeQdERF650e86fT43lTPUwqfQEEkMGeM1fII7TKXP9eKRBhxHhDSsqHTHsasVKgQtd8Brax5undtSNKXseRXOoOObW9MN6y2fmaOTdPaftAh89rhhRo7h20Jghbi4MsX6+j4HbyaBjFz+9tcjWCu6DXcLq+DyKWX96sgTIgsoGn1+eo0G5x/CoI3SB9mQxFe7uZ/l0Q8DoLeavwGmnwvrn9Dqicaof+aDD8awjt5M3NEiBUNsLN7SbtygwYbsA7p0ACNCuzZpiPpEUXzU7B/P2uSwJULUh2u/4Y2UULD+xP22M8iDgVILuVf7UsSm7RH8FIglC9/SnXcsPKHYuhL+9UW+E6Z9pVO5gsGnxxHg9idW2UNd/L+fhdUDvleCgyoIXRgAI+W2U06NgOOY43chkQafbEdsRpfI0F4bq5vTOvTTMWtK72qSm/7cUBejPzC5WdHQj4hcOGxt2i6QoXzU0PIn7usEXTMZ0eQmGxTxSyC3lMpzeuiE+1IQejLy4bbf9SCmKlbwv3txCHMXi3OnsoMQ6X1fkz81ZR7R/Z0Yr6I4P9d0cGxXSIJLIncAgidaxjChzrlDGNPqgKRA6qfnf0pvzsMLFCCR2PGmOPR9u4fnDgO2nSpEmTJin/AeYxVHzHBRlkAAAAAElFTkSuQmCC'}}" alt="Bkash">
                    </a>
                </div>
                <!-- /.col -->
                <div class="col-xs-6">
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