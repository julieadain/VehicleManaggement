<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Invoice</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{'https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js'}}"></script>
    <script src="{{'https://oss.maxcdn.com/respond/1.4.2/respond.min.js'}}"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body onload="window.print();">
<div class="wrapper">
    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <i> <img class="rounded" src="{{'https://yt3.ggpht.com/a/AGF-l78L_Iax_wJwwTgL8QdaCzBy8E9rJYDppVLAtA=s900-c-k-c0xffffffff-no-rj-mo'}}" alt="" height="20px;" width="20px;"></i> {{"Latent Soft" }}
                    <small class="pull-right">Date: 2/10/2014</small>
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
                    <strong>{{ $organization->org_name }}</strong><br>
                    {{ $organization->address }}<br>
                    Phone: {{ $organization->owner->phone }}<br>
                    Email: {{ $organization->owner->email }}
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <br>
                <b>Payment for:</b> 2/22/2014<br>
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
                    <tr >
                        <td>1</td>
                        <td>{{ $organization->package->title }}</td>
                        <td>{{ $organization->package->remark? $organization->package->remark : null }}</td>
                        <td>{{ $organization->package->cost }}</td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <!-- accepted payments column -->
            @admin
            <div class="col-xs-6">
                <p class="lead">Payment Methods:</p>
                <img src="{{ 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGgAAABoCAMAAAAqwkWTAAAAh1BMVEX4+PjjEG7////iAGf5/PvxwtLhAF713+bzztnhAFziAGXiAGnhAGDhAGL7///5//3pYpLgAFf86fDse6LoWYv41uH57vPmQX3pdZ3oaJXuj7HlLHXytcjqbZftharlM3z3y9nnS4XuoLvtlrTyp77oYIvtjKnkPHX0vMzjJ2vlR3nmV4TyrsU0nxHFAAAD9klEQVRoge2Z2ZKqMBRFSQKCiSgyBDWKjBen//++y6igtiTE8on90FJdlMszcBJ2FGXSpEmTJk0aKVVEoyGrJdUNjVOhTpfLMSxVtWPLZ4AgLhHAfDexFVGUujQ2pkmAkAhebA2xqFRlhwUpLcuhAiRVcc0xmFLYpytuDvVHhdME5eu8MS0tPJ4DAPKXfJzVTopTkByukFQdyXEKksdTpuVGGkRcjuSpOqvvPkaMAYQRGdMY3nDyVvu6QiSi1Av36W7ro/V8YQoBcTycu1WbOXSArRRbS4NDFh0BWnA9yGQ7nLrVsf2meQz7oroXnmKXB3XkAM3rW5nrnk/wjTapNUya0SGOStfNvSfFwPSVQ01qLwZB88HpoOpNRACHcO8rLyCPKTAdfKJnxlA3PEAA76GzeQEF/8r0DT1qQiCAb9DfP4Oq/1AwUCYxEFik1AyfMpfb5Uf4XRDASZj3y3Ty689/nxtCFARmuzjqN3fcXLgfYxIGARwcki7I9JqLzzNeHASQlXcaQj/fH639p+SNABUzgth3UNLpd+dDTKNA5SBvvzxLH6Bej5NyaycLArgd5Pr5ERyEBqkRJmJ+FjguI7IgMG/KFJJeCyYLsp4fnVTzipBdTcPSIIC06pur+dNRtL1HaF8oDLE0iLCqTORpTui53l7GTtmJSBYEkFv+6l6Jqh5vBgVU/Ho0MVkQMIuspRl81qZJpr6wLLeQdERF650e86fT43lTPUwqfQEEkMGeM1fII7TKXP9eKRBhxHhDSsqHTHsasVKgQtd8Brax5undtSNKXseRXOoOObW9MN6y2fmaOTdPaftAh89rhhRo7h20Jghbi4MsX6+j4HbyaBjFz+9tcjWCu6DXcLq+DyKWX96sgTIgsoGn1+eo0G5x/CoI3SB9mQxFe7uZ/l0Q8DoLeavwGmnwvrn9Dqicaof+aDD8awjt5M3NEiBUNsLN7SbtygwYbsA7p0ACNCuzZpiPpEUXzU7B/P2uSwJULUh2u/4Y2UULD+xP22M8iDgVILuVf7UsSm7RH8FIglC9/SnXcsPKHYuhL+9UW+E6Z9pVO5gsGnxxHg9idW2UNd/L+fhdUDvleCgyoIXRgAI+W2U06NgOOY43chkQafbEdsRpfI0F4bq5vTOvTTMWtK72qSm/7cUBejPzC5WdHQj4hcOGxt2i6QoXzU0PIn7usEXTMZ0eQmGxTxSyC3lMpzeuiE+1IQejLy4bbf9SCmKlbwv3txCHMXi3OnsoMQ6X1fkz81ZR7R/Z0Yr6I4P9d0cGxXSIJLIncAgidaxjChzrlDGNPqgKRA6qfnf0pvzsMLFCCR2PGmOPR9u4fnDgO2nSpEmTJin/AeYxVHzHBRlkAAAAAElFTkSuQmCC' }}" alt="Visa">

            </div>
            @endadmin
            <!-- /.col -->
            <div class="col-xs-6 pull-right">
                <p class="lead">Payment for 2/22/2014</p>

                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th style="width:50%">Cost:</th>
                            <td>Tk. {{$organization->package->cost}}</td>
                        </tr>
                        <tr>
                            <th>Tax (5%)</th>
                            <td>Tk. 10.34</td>
                        </tr>
                        <tr>
                            <th>Total:</th>
                            <td>Tk. 265.24</td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>

