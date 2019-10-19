@extends("layout.admin")

@section("content")
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
    <div class="container" xmlns:margin-right="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Payment
            </h1>
        </section>
        <!-- Main content -->
        <section class="invoice col-md-11">
            <!-- title row -->
            <div class="container">
                <div class="col-xs-6">
                    <div class="col-xs-10">
                        <!-- small box -->
                        <form role="form" action="{{ url("expense") }}" method="post">
                            @csrf
                            <div class="box-body" style="width: 350px;">
                                <div class="form-group">
                                    <label>Choose Organization</label>
                                    <input class="form-control" id="txtKeyword" type="text" name="organization"
                                           autocomplete="off"
                                           style="width: 100%;">
                                    <ul class="" id="suggestion"></ul>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Choose Package</label>
                                    <select class="form-control">
                                        <option selected>{{ 'Current Package'.' :  '.'aiiwbfiuabf ' .'@'.' '. 'Cost' }}</option>
                                        {{--                                        @foreach( as )--}}
                                        <option>One</option>
                                        {{--                                        @endforeach--}}
                                    </select>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-3 pull-right">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Submit') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('page-js')
    <script>
        $(function ($) {
            i = 0;
            var sto;
            $('#txtKeyword').on('keyup', function () {
                // console.log("typing");
                if (sto) clearTimeout(sto);
                $('#suggestion').html("");
                var text = $(this).val();
                if (text == "") return;


                sto = setTimeout(function () {
                    $.ajax({
                        url: '{{ url("/org_ajaxRequest") }}',
                        data: {keyword: text},
                        dataType: 'JSON',
                        success: function (data) {
                            $.each(data.success, function (i, v) {
                                $('#suggestion').append("<li class='form-control'>" + v.org_name + "</li>");
                            });
                        }
                    });
                }, 350);
            });
            console.log("typing");
            $('#suggestion').on('click', 'li', function () {
                // console.log("Li clicked");
                $('#txtKeyword').val($(this).html());
                $('#suggestion').html("");
            });
            $('#suggestion').html("");

        }(jQuery));
    </script>
@endpush