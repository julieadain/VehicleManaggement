@extends("layout.admin")

@section('content')
       <!-- Main content -->
    <section class="content">

        <div class="col-md-7 pull-left">
            <!-- Horizontal Form -->
            <div class=" container box box-success">
                <h4>
                    Sms Log
                </h4>
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table  table-striped">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Details</th>
                                    <th>to.</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{--                                @foreach()--}}
                                <tr>
                                    {{--                              {{ dd($expense->purpose->title) }}--}}
                                    {{--                                        <td>{{}}</td>--}}
                                    {{--                                        <td>{{}}</td>--}}
                                    {{--                                        <td>{{}}</td>--}}
                                </tr>
{{--                                @endforeach--}}
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->


                </div>
            </div>
        </div>

        <div class="col-xs-5">
            <div class="container box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Sms Configuration</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body box-responsive ">
                    <form method="POST" action="{{ url('#') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="email"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email"
                                       class="form-control @error('email') is-invalid @enderror" name="email"
                                       value="{{ old('email') }}" required autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        </div>
        </div>
    </section>


@endsection
