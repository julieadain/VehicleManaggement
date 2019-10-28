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
{{--        Package Option--}}
        <div class="pull-right" style="width: 250px;" ><a href='{{ url('package') }}' class="btn btn-success">Select package</a></div>

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
                <div class="col-xs-6">
                    <p class="lead">Payment Methods:</p>
                    <a href="">
                        <img src="{{'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGgAAABoCAMAAAAqwkWTAAAAh1BMVEX4+PjjEG7////iAGf5/PvxwtLhAF713+bzztnhAFziAGXiAGnhAGDhAGL7///5//3pYpLgAFf86fDse6LoWYv41uH57vPmQX3pdZ3oaJXuj7HlLHXytcjqbZftharlM3z3y9nnS4XuoLvtlrTyp77oYIvtjKnkPHX0vMzjJ2vlR3nmV4TyrsU0nxHFAAAD9klEQVRoge2Z2ZKqMBRFSQKCiSgyBDWKjBen//++y6igtiTE8on90FJdlMszcBJ2FGXSpEmTJk0aKVVEoyGrJdUNjVOhTpfLMSxVtWPLZ4AgLhHAfDexFVGUujQ2pkmAkAhebA2xqFRlhwUpLcuhAiRVcc0xmFLYpytuDvVHhdME5eu8MS0tPJ4DAPKXfJzVTopTkByukFQdyXEKksdTpuVGGkRcjuSpOqvvPkaMAYQRGdMY3nDyVvu6QiSi1Av36W7ro/V8YQoBcTycu1WbOXSArRRbS4NDFh0BWnA9yGQ7nLrVsf2meQz7oroXnmKXB3XkAM3rW5nrnk/wjTapNUya0SGOStfNvSfFwPSVQ01qLwZB88HpoOpNRACHcO8rLyCPKTAdfKJnxlA3PEAA76GzeQEF/8r0DT1qQiCAb9DfP4Oq/1AwUCYxEFik1AyfMpfb5Uf4XRDASZj3y3Ty689/nxtCFARmuzjqN3fcXLgfYxIGARwcki7I9JqLzzNeHASQlXcaQj/fH639p+SNABUzgth3UNLpd+dDTKNA5SBvvzxLH6Bej5NyaycLArgd5Pr5ERyEBqkRJmJ+FjguI7IgMG/KFJJeCyYLsp4fnVTzipBdTcPSIIC06pur+dNRtL1HaF8oDLE0iLCqTORpTui53l7GTtmJSBYEkFv+6l6Jqh5vBgVU/Ho0MVkQMIuspRl81qZJpr6wLLeQdERF650e86fT43lTPUwqfQEEkMGeM1fII7TKXP9eKRBhxHhDSsqHTHsasVKgQtd8Brax5undtSNKXseRXOoOObW9MN6y2fmaOTdPaftAh89rhhRo7h20Jghbi4MsX6+j4HbyaBjFz+9tcjWCu6DXcLq+DyKWX96sgTIgsoGn1+eo0G5x/CoI3SB9mQxFe7uZ/l0Q8DoLeavwGmnwvrn9Dqicaof+aDD8awjt5M3NEiBUNsLN7SbtygwYbsA7p0ACNCuzZpiPpEUXzU7B/P2uSwJULUh2u/4Y2UULD+xP22M8iDgVILuVf7UsSm7RH8FIglC9/SnXcsPKHYuhL+9UW+E6Z9pVO5gsGnxxHg9idW2UNd/L+fhdUDvleCgyoIXRgAI+W2U06NgOOY43chkQafbEdsRpfI0F4bq5vTOvTTMWtK72qSm/7cUBejPzC5WdHQj4hcOGxt2i6QoXzU0PIn7usEXTMZ0eQmGxTxSyC3lMpzeuiE+1IQejLy4bbf9SCmKlbwv3txCHMXi3OnsoMQ6X1fkz81ZR7R/Z0Yr6I4P9d0cGxXSIJLIncAgidaxjChzrlDGNPqgKRA6qfnf0pvzsMLFCCR2PGmOPR9u4fnDgO2nSpEmTJin/AeYxVHzHBRlkAAAAAElFTkSuQmCC'}}" alt="Bkash">
                    </a>
                </div>
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
