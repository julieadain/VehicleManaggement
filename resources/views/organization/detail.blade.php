@extends("layout.admin")

@section("content")
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="container box">
                    <div class="box-header">
                        <h4 class="box-title">{{"Organization name"}} <span
                                    class="label label-primary">Approved</span>
                        </h4>

                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-success"> Approve <span
                                                class="fa fa-check"> </span></button>
                                </div>

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-danger"> Deny <span
                                                class="fa fa-close"> </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table text-center">
                            <thead>
                            <tr class="hidden">
                                <th scope="col">Id</th>
                                <td>02</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">Address</th>
                                <td>Mark</td>

                            </tr>
                            <tr>
                                <th scope="row">Owner</th>
                                <td>Jacob</td>
                            </tr>
                            <tr>
                                <th scope="row">Email</th>
                                <td colspan="2">Larry the Bird</td>
                            </tr>
                            <tr>
                                <th scope="row">Phone</th>
                                <td colspan="2">Larry the Bird</td>
                            </tr>
                            <tr>
                                <th scope="row">Trade license</th>
                                <td colspan="2"><a href="#">akjrbga</a></td>
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