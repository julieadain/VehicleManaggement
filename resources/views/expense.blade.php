@extends("layout.admin")

@section('content')

    <div class="Container">
        <label> Select expense purpose : </label><br/>
        <input id="#txtKeyword" type="text">
        <ul id="suggestion"></ul>
    </div>

@endsection

@push('page-js')

    <script>
        $(function ($) {
            i = 0;
            var sto;
            $("input").on('keyup', function () {
                if (sto) clearTimeout(sto);

                var text = $(this).val();

                sto = setTimeout(function () {
                    $('#suggestion').html("");
                    $.ajax({
                        url: '{{ url("/ajaxRequest") }}',
                        data: {keyword: text},
                        dataType:'JSON',
                        success: function (data) {
                            $.each(data.success, function (i, v) {
                                $('#suggestion').append("<li>" + v.title + "</li>");
                            });
                        }
                    });
                }, 500);
            });
        }(jQuery));
    </script>
@endpush