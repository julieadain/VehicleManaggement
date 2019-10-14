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
                <div class="box ">
                    <div class="box-header with-border">
                        <h3 class="box-title">Bar Chart</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="chart">
                            <canvas id="barChart" style="height:230px"></canvas>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            {{--                 End Bar Chart --}}
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
                                <label>Date</label>

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="datepicker" name="date"
                                           value="{{ date('m/d/Y') }}" autocomplete="off">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label>Purpose</label><br/>
                                <input class="form-control" id="txtKeyword" type="text" name="title" autocomplete="off"
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
{{--                              {{ dd($expense->purpose->title) }}--}}
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
    <script src="{{ asset('bower_components/chart.js/Chart.js') }}"></script>
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

        }(jQuery));

        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        });

        var areaChartData = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [
                {
                    label: 'Electronics',
                    fillColor: 'rgba(60,141,188,0.9)',
                    strokeColor: 'rgba(60,141,188,0.9)',
                    pointColor: 'rgba(60,141,188,0.9)',
                    pointStrokeColor: 'rgba(60,141,188,0.9)',
                    pointHighlightFill: 'rgba(60,141,188,0.9)',
                    pointHighlightStroke: 'rgba(60,141,188,0.9)',
                    data: [65, 59, 80, 81, 56, 55, 40]
                },
                {
                    label: 'Digital Goods',
                    fillColor: 'rgb(222,31,94)',
                    strokeColor: 'rgb(222,31,94)',
                    pointColor: 'rgb(222,31,94)',
                    pointStrokeColor: 'rgb(222,31,94)',
                    pointHighlightFill: 'rgb(222,31,94)',
                    pointHighlightStroke: 'rgb(222,31,94)',
                    data: [28, 48, 40, 19, 86, 27, 90]
                }
            ]
        }

        //-------------
        //- BAR CHART -
        //-------------
        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var barChart = new Chart(barChartCanvas)
        var barChartData = areaChartData
        barChartData.datasets[1].fillColor = '#a6002d'
        barChartData.datasets[1].strokeColor = '#a6808f'
        barChartData.datasets[1].pointColor = '#a6000c'
        var barChartOptions = {
            //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
            scaleBeginAtZero: true,
            //Boolean - Whether grid lines are shown across the chart
            scaleShowGridLines: true,
            //String - Colour of the grid lines
            scaleGridLineColor: 'rgba(230,219,239,0.14)',
            //Number - Width of the grid lines
            scaleGridLineWidth: 1,
            //Boolean - Whether to show horizontal lines (except X axis)
            scaleShowHorizontalLines: true,
            //Boolean - Whether to show vertical lines (except Y axis)
            scaleShowVerticalLines: true,
            //Boolean - If there is a stroke on each bar
            barShowStroke: true,
            //Number - Pixel width of the bar stroke
            barStrokeWidth: 2,
            //Number - Spacing between each of the X value sets
            barValueSpacing: 5,
            //Number - Spacing between data sets within X values
            barDatasetSpacing: 1,
            //String - A legend template
            /// legendTemplate: '<ul class="<\%=name.toLowerCase()\%>-legend"><\% for (var i=0; i<datasets.length; i++){\%><li><span style="background-color:<\%=datasets[i].fillColor\%>"></span><\%if(datasets[i].label){\%><\%=datasets[i].label\%><\%}\%></li><\%}\%></ul>',
            //Boolean - whether to make the chart responsive
            responsive: true,
            maintainAspectRatio: true
        }

        barChartOptions.datasetFill = false
        barChart.Bar(barChartData, barChartOptions)
</script>

@endpush
