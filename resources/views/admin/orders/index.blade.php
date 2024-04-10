@extends('admin.layouts.app')
@section('extra-css')
<link rel="stylesheet" href="{{asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection
@section('content')
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">All Orders</h2>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{route('admin.blog.create')}}">New Orders</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-body">
                    <table id="blogs" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                        <tr>
                            <th>Order Number</th>
                            <th>Profile</th>
                            <th>Products</th>
                            <th>status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
@endsection

@section('custom-js')
<script src="{{asset('backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
{{-- <script src="{{asset('backend/js/readmore.min.js')}}"></script> --}}

<script>
    "use strict";
    $('#blogs').DataTable({
        processing: true,
        serverSide: true,
        responsive:true,
        ajax:'{{route('admin.orders.get.all')}}',
        columns: [
            { "data": "order_number" },
            { "data": "profile" },
            { "data": "products" },
            { "data": "status" },
            { "data": "action" },
        ]
    });


</script>
@endsection