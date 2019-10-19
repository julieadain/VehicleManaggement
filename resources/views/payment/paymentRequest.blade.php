@extends("layout.admin")

@section('content')
    <div class="container" xmlns:margin-right="http://www.w3.org/1999/xhtml">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Payment
                <small>{{'#000343'}}</small>
            </h1>
        </section>
{{--        Package Option--}}
        <div class="pull-right" style="width: 250px;" ><a href='{{ url('package') }}' class="btn btn-success">Select package</a></div>

        <!-- Main content -->
        <section class="invoice col-md-11">
            <!-- title row -->
            <div class="container row">
                <div class="col-xs-10">
                    <h2 class="page-header">
                        <i><img src="data:image/jpeg;base64,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" alt="LatentSoft" width="30px" height="30px"></i> LatentSoft.com
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
                            <th>Serial #</th>
                            <th>Package Description</th>
                            <th>Subtotal</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Call of Duty</td>
                            <td>$64.50</td>
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
