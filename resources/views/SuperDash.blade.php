@extends("layout.admin")

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">{{'Organizations'}}</span>
                        <span class="info-box-number">{{ \App\Organization::where('id', '!=', \Illuminate\Support\Facades\Auth::user()->id)->count() }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="ion ion-ios-people-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">{{"Payments"}}</span>
                        <span class="info-box-number">{{ \App\Payment::whereStatus(1)->count() }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{url("/paymentRequestList")}}">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Payment Requests</span>
                            <span class="info-box-number">{{ \App\Payment::whereStatus(0)->count() }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </a>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Payment Due</span>
                        <span class="info-box-number">{{ \App\Payment::whereStatus(-1)->count() }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Monthly Report</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
                            <div class="btn-group">
                                <button type="button" class="btn btn-box-tool dropdown-toggle"
                                        data-toggle="dropdown">
                                    <i class="fa fa-wrench"></i></button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul>
                            </div>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-8">
                                <p class="text-center">
                                    <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                                </p>

                                <div class="chart">
                                    <!-- Sales Chart Canvas -->
                                    <canvas id="salesChart" style="height: 180px;"></canvas>
                                </div>
                                <!-- /.chart-responsive -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-4">
                                <p class="text-center">
                                    <strong>Last few months income</strong>
                                </p>

                                <div class="progress-group">
                                    <span class="progress-text">Some info</span>
                                    <span class="progress-number"><b>31</b>/08</b>/2019</span>

                                    <div class="progress sm">
                                        <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                                    </div>
                                </div>
                                <!-- /.progress-group -->
                                <div class="progress-group">
                                    <span class="progress-text">Some info</span>
                                    <span class="progress-number"><b>31</b>/07</b>/2019</span>

                                    <div class="progress sm">
                                        <div class="progress-bar progress-bar-red" style="width: 80%"></div>
                                    </div>
                                </div>
                                <!-- /.progress-group -->
                                <div class="progress-group">
                                    <span class="progress-text">Some info</span>
                                    <span class="progress-number"><b>30</b>/06</b>/2019</span>

                                    <div class="progress sm">
                                        <div class="progress-bar progress-bar-green" style="width: 80%"></div>
                                    </div>
                                </div>
                                <!-- /.progress-group -->
                                <div class="progress-group">
                                    <span class="progress-text">Some info</span>
                                    <span class="progress-number"><b>31</b>/05</b>/2019</span>

                                    <div class="progress sm">
                                        <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
                                    </div>
                                </div>
                                <!-- /.progress-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- ./box-body -->
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-sm-3 col-xs-6">
                                <div class="description-block border-right">
                                    <span class="description-percentage text-green"><i
                                                class="fa fa-caret-up"></i> 0%</span>
                                    <h5 class="description-header">$0</h5>
                                    <span class="description-text">TOTAL REVENUE</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-3 col-xs-6">
                                <div class="description-block border-right">
                                        <span class="description-percentage text-yellow"><i
                                                    class="fa fa-caret-left"></i> 0%</span>
                                    <h5 class="description-header">$0</h5>
                                    <span class="description-text">TOTAL COST</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-3 col-xs-6">
                                <div class="description-block border-right">
                                    <span class="description-percentage text-green"><i
                                                class="fa fa-caret-up"></i> 0%</span>
                                    <h5 class="description-header">$0</h5>
                                    <span class="description-text">TOTAL PROFIT</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-3 col-xs-6">
                                <div class="description-block">
                                    <span class="description-percentage text-red"><i
                                                class="fa fa-caret-down"></i> 18%</span>
                                    <h5 class="description-header">1200</h5>
                                    <span class="description-text">GOAL COMPLETIONS</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <div class="col-md-8">

                <!-- TABLE: LATEST ORDERS -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Payment list</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                <tr>
                                    <th>Client name</th>
                                    <th>Package details</th>
                                    <th>Status</th>
                                    <td></td>
                                    <th>Cost</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($payments as $payment)
                                    <tr>
                                        <td>{{$payment->organization->owner->name}}</td>

                                        <td>{{$payment->package->title}}</td>
                                        @if($payment->status == 1)
                                            <td><span class="label label-success">{{"Paid"}}</span></td>
                                        @elseif($payment->status == -1)
                                            <td><span class="label label-danger">{{"Due"}}</span></td>
                                        @endif
                                        <td>
                                        <td>{{$payment->paid}}</td>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <a href="{{url('/payment/create')}}" class="btn btn-sm btn-info btn-flat pull-left">Place New
                            Payment</a>
                        <a href="{{url('/payment')}}" class="btn btn-sm btn-default btn-flat pull-right">View All
                            Payments</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->

            <div class="col-md-4">

                <!-- ORGANIZATION LIST -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Latest Organizations</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <ul class="products-list product-list-in-box">
                            @foreach($organizations as $organization)
                                <li class="item">
                                    <div class="product-img">
                                        <img src="{{'data:image/jpeg;base64,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'}}"
                                             alt="Product Image" height="15px;" width="25px;">
                                    </div>
                                    <div class="product-info">
                                        <a href="javascript:void(0)" class="product-title">
                                            <span class="label label-warning pull-right"> {{date('d-m-Y', strtotime($organization->created_at)) }}</span></a>
                                        <span class="product-description">{{$organization->org_name}} </span>
                                    </div>
                                </li>
                        @endforeach
                        <!-- /.item -->
                        </ul>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                        <a href="{{ url('/organization') }}" class="uppercase">View All Organizations</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
    </div>

@endsection

@push('page-js')
    <!-- ChartJS -->
    <script src="{{ asset('bower_components/chart.js/Chart.js') }}"></script>


    <script>

        // -----------------------
        // - MONTHLY SALES CHART -
        // -----------------------

        // Get context with jQuery - using jQuery's .get() method.
        var salesChartCanvas = $('#salesChart').get(0).getContext('2d');
        // This will get the first returned node in the jQuery collection.
        var salesChart = new Chart(salesChartCanvas);

        var months = JSON.parse('{!! $months !!}');
        var data1 = JSON.parse('{!! $data1 !!}');

        var salesChartData = {
            labels: months,
            datasets: [
                {
                    label: 'Electronics',
                    fillColor: 'rgb(118,116,222)',
                    strokeColor: 'rgb(93,133,222)',
                    pointColor: 'rgb(133,75,222)',
                    pointStrokeColor: '#1212d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgb(220,220,220)',
                    data: data1
                }

            ]
        };

        var salesChartOptions = {
            // Boolean - If we should show the scale at all
            showScale: true,
            // Boolean - Whether grid lines are shown across the chart
            scaleShowGridLines: false,
            // String - Colour of the grid lines
            scaleGridLineColor: 'rgba(0,0,0,.05)',
            // Number - Width of the grid lines
            scaleGridLineWidth: 1,
            // Boolean - Whether to show horizontal lines (except X axis)
            scaleShowHorizontalLines: true,
            // Boolean - Whether to show vertical lines (except Y axis)
            scaleShowVerticalLines: true,
            // Boolean - Whether the line is curved between points
            bezierCurve: true,
            // Number - Tension of the bezier curve between points
            bezierCurveTension: 0.3,
            // Boolean - Whether to show a dot for each point
            pointDot: false,
            // Number - Radius of each point dot in pixels
            pointDotRadius: 4,
            // Number - Pixel width of point dot stroke
            pointDotStrokeWidth: 1,
            // Number - amount extra to add to the radius to cater for hit detection outside the drawn point
            pointHitDetectionRadius: 20,
            // Boolean - Whether to show a stroke for datasets
            datasetStroke: true,
            // Number - Pixel width of dataset stroke
            datasetStrokeWidth: 2,
            // Boolean - Whether to fill the dataset with a color
            datasetFill: true,
            // String - A legend template
            legendTemplate: '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<datasets.length; i++){%><li><span style=\'background-color:<%=datasets[i].lineColor%>\'></span><%=datasets[i].label%></li><%}%></ul>',
    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio     : true,
    // Boolean - whether to make the chart responsive to window resizing
    responsive              : true
  };

  // Create the line chart
  salesChart.Line(salesChartData, salesChartOptions);

  // ---------------------------
  // - END MONTHLY SALES CHART -
  // ---------------------------

</script>

@endpush