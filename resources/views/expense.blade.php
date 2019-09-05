@extends("layout.admin")

@section('content')

    <div class="Container">
        <label> Select expense purpose : </label><br/>
        <input type="text" id="keyword">
        <ul id="suggestion">

        </ul>
    </div>

@endsection

@push('page-js')
    <script>
        data = ["Dhaka", "Chittagong", "Rajshahi", "khulna", "Barishal", "Sylhet", "Mymensing", "Rangpur"];
        $(document).ready(function () {
            console.log("Document is ready");
            $('#keyword').on('keyup', function () {
                $('#suggestion').html("");
                input = $(this).val();
                // console.log(input);
                if (input == "") return;
                $.each(data, function (i, v) {
                    if (v.toLowerCase().indexOf(input.toLowerCase()) >= 0) {
                        $('#suggestion').append("<li>" + v + "</li>")
                    }
                })
            });
            $('#suggestion').on('click', 'li', function () {
                console.log("Li clicked");
                $('#keyword').val($(this).html());
                $('#suggestion').html("");
            })
        })
    </script>
@endpush