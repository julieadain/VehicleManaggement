@extends("layout.admin")

@section("content")
    <div class="container" xmlns:margin-right="http://www.w3.org/1999/xhtml">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Packages
            </h1>
        </section>
        <!-- Main content -->
        <section class="invoice col-md-11">
            <!-- title row -->
            <div class="container row">
                <div class="col-xs-6 pull-left">
                    <h4>Current Package</h4><br/><br>
                    <div class="col-xs-10">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <a href="{{url('/setPackage/'.$organization->package->id)}}">
                                    <div class="inner">
                                        @if($organization->package)
                                            <h4>{{$organization->package->title}}</h4>
                                            @if($organization->package->remark)
                                                <p class="text-bold">{{ $organization->package->remark}}</p>
                                            @endif
                                            <p class="text-bold">{{$organization->package->cost}}</p>
                                        @else
                                            <h4 class="text-bold">{{"Not selected"}}</h4>
                                        @endif
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @Super_admin
                @if((session('org_info')))
                    <div class="col-xs-6 pull-right">
                        <h4>Create Package</h4>
                        <div class="col-xs-8">
                            <!-- small box -->
                            <form role="form" action="{{ url("expense") }}" method="post">
                                @csrf
                                <div class="box-body" style="width: 350px;">
                                    <div class="form-group">
                                        <label>Title</label><br/>
                                        <input class="form-control" type="text" name="title"
                                               style="width: 100%;">
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label>Cost</label>
                                        <input class="form-control" type="number" name="cost"
                                               style="width: 100%;">
                                    </div>
                                    <div class="form-group">
                                        <label>Remark</label>
                                        <input class="form-control" type="text" name="remark"
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
                        </div>
                    </div>
                @endif
                @endSuper_admin
            </div>
        </section>
        <section class="invoice col-xs-11">
            <div class="container row">
                <div class=" col-xs-10 pull-left">
                    <h4>Available Package</h4>
                    @foreach($packages as $package)
                        <div class="col-xs-4">
                            <!-- small box -->
                            <div class="small-box bg-light-blue">
                                <div class="inner">
                                    <a href="{{url('/setPackage/'.$package->id)}}">
                                        <div class="inner">
                                            @if($package)
                                                <h4>{{$package->title}}</h4>
                                                @if($package->remark)
                                                    <p class="text-bold">{{ $package->remark}}</p>
                                                @endif
                                                <p class="text-bold">{{ "Cost ".$package->cost. " Tk."}}</p>

                                            @else
                                                <h4 class="text-bold">{{"No packages available"}}</h4>
                                            @endif
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </section>
    </div>


@endsection