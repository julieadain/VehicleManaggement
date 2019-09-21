@extends("layout.admin")

@section("content")
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="container box">
                    <div class="box-header">
                        {{-- {{ dd($organization->owner) }}--}}
                        <h4 class="box-title">{{$organization->org_name}}
                            @if($organization->status == 1)

                                <span class="label label-primary">Approved</span>
                            @else
                                <span class="label label-warning">Pending</span>
                            @endif
                        </h4>
                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 300px;">

                                @if($organization->status != 1)
                                    <div class="input-group-btn" style="padding-right: 5px;">
                                         <span class="label label-primary"><a class="btn btn-success text-bold" href="{{  url('/approve/'. $organization->id) }}"> Approve </a></span>
                                    </div>
                                @elseif($organization->status !=0)
                                    <div class="input-group-btn" style="padding-right: 5px;">
                                        <span class="label label-primary"><a class="btn btn-success text-bold" href="{{ url('/details/'. $organization->id) }}"> View details </a></span>
                                    </div>
                                    <div class="input-group-btn" style="padding-right: 5px;">
                                        <span class="label label-primary"><a class="btn btn-warning text-bold" href="{{ url('/pending/'. $organization->id)}}"> Pending </a></span>
                                    </div>
                                @endif
                                <div class="input-group-btn" style="padding-right: 5px;">
                                    <span class="label label-primary"><a class="btn btn-danger text-bold" href="{{ url('/deny/'. $organization->id) }}"> Deny </a></span>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table text-center">
                            <thead>
                            <tr class="hidden">
                                <th scope="col">Id</th>
                                <td>{{ $organization->id }}</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">Address</th>
                                <td>{{ $organization->address }}</td>

                            </tr>
                            <tr>
                                <th scope="row">Owner</th>
                                <td>{{ $organization->owner->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Email</th>
                                <td colspan="2">{{ $organization->owner->email }}d</td>
                            </tr>
                            <tr>
                                <th scope="row">Phone</th>
                                <td colspan="2">{{ $organization->owner->phone }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Trade license</th>
                                <td colspan="2"><a href="#">{{ $organization->trade_license_copy }}</a></td>
                            </tr>
                            </tbody>
                        </table>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </div>
    </section>
@endsection