@extends("layout.admin")

@section('content')
    <style>
        #suggestion {
            padding: 0;
            margin: 0;
            float: left;
            position: absolute;
            border: 1px solid #dfdfdf;
        }

        #suggestion li:hover {
            background: #cbddd8;
            cursor: pointer;
            border: 1px solid #6f72df;

        }

        #suggestion li {
            padding: 5px 20px;
            list-style-type: none;
            border-bottom: 1px solid #dfdfdf;
        }
    </style>
    <div class="row">
        <div class="col-md-7">
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
                        <div class="col-md-11">
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
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-footer -->
            </div>
        </div>
        <div class="col-md-5 pull-right">
            <div class="container box">
                <div class="box-header with-border">
                    <h3 class="box-title">Add expense</h3>
                </div>
                <div class="offset-md-4 col-md-8">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li><h4>{{ $error }}</h4></li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form role="form" action="{{ url("expense") }}" method="post">
                        @csrf
                        <div class="box-body" style="width: 350px;">
                            <div class="form-group">
                                <label>Purpose</label><br/>
                                <input class="form-control" id="txtKeyword" type="text" name="title"  autocomplete="off"
                                       style="width: 100%;">
                                <ul class="" id="suggestion"></ul>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label>Amounts</label>
                                <input class="form-control" id="amount" type="number" name="amount"
                                       style="width: 100%;">
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-3 pull-right">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- /.form-group -->
                </div>
            </div>
        </div>

        <div class="col-md-6 pull-left">
            <div class=" box">
                <div class="box-header">
                    <h3 class="box-title">Expense in this month</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Title</th>
                            <th>Amount(Tk.)</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($expenses as $expense)
                            <tr>
{{--                                {{ dd($expense->purpose->title) }}--}}
                                <td>{{$expense->created_at->format('d-m-y')}}</td>
                                <td>{{$expense->purpose->title}}</td>
                                <td>{{ $expense->amount}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-6 pull-left">
            <div class=" box">
                <div class="box-header">
                    <h3 class="box-title">Income from this month</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Amount(Tk.)</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Trident</td>
                            <td>Internet
                                Explorer 4.0
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- /.row -->

@endsection
@push('page-js')

    <script>
        $(function ($) {
                i = 0;
                var sto;
                $('#txtKeyword').on('keyup', function () {

                    if (sto) clearTimeout(sto);
                    $('#suggestion').html("");
                    var text = $(this).val();
                    if (text == "") return;

                    sto = setTimeout(function () {
                        $.ajax({
                            url: '{{ url("/ajaxRequest") }}',
                            data: {keyword: text},
                            dataType: 'JSON',
                            success: function (data) {
                                $.each(data.success, function (i, v) {
                                    $('#suggestion').append("<li class='form-control'>" + v.title + "</li>");
                                });
                            }
                        });
                    }, 350);
                });

                $('#suggestion').on('click', 'li', function () {
                    // console.log("Li clicked");
                    $('#txtKeyword').val($(this).html());
                    $('#suggestion').html("");
                });
                $('#suggestion').html("");

            }(jQuery)
        );
    </script>
@endpush

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
        var data2 = JSON.parse('{!! $data2 !!}');

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
                },
                {
                    label: 'Expenses',
                    fillColor: 'rgb(222,130,123)',
                    strokeColor: 'rgb(222,123,184)',
                    pointColor: 'rgb(222,177,119)',
                    pointStrokeColor: '#d1689a',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgb(220,220,220)',
                    data: data2
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
