@extends("layout.admin")

@section('content')
    <div class="container box">
        <div class="box-header with-border">
            <h3 class="box-title">Add expense</h3>
        </div>
        <div class=" box-body">
            <div class="container">
                <div class="col-md-6">
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
                        <div class="box-body">
                            <div class="form-group">
                                <label>Purpose</label><br/>
                                <input class="form-control" id="txtKeyword" type="text" name="title" autocapitalize="words"  style="width: 100%;">
                                <ul id="suggestion" style="width: 100%;"></ul>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label>Amounts</label>
                                <input class="form-control" id="amount" type="number" name="amount"
                                       style="width: 100%;">

                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
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
    </div>

@endsection

@push('page-js')

    <script>
        $(function ($) {
                i = 0;
                var sto;
                $('#txtKeyword').on('keyup', function () {

                    if (sto) clearTimeout(sto);

                    var text = $(this).val();

                    if (text == "") return;

                    sto = setTimeout(function () {
                        $.ajax({
                            url: '{{ url("/ajaxRequest") }}',
                            data: {keyword: text},
                            dataType: 'JSON',
                            success: function (data) {
                                $.each(data.success, function (i, v) {
                                    $('#suggestion').append("<li class='form-control' >" + v.title + "</li>");
                                });
                            }
                        });
                    }, 500);
                });

                $('#suggestion').on('click', 'li', function () {
                   // console.log("Li clicked");
                    $('#txtKeyword').val($(this).html());
                    $('#suggestion').html("");
                });
                $('#suggestion').html("");

            }(jQuery)
        )
        ;
    </script>
@endpush