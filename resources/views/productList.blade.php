@extends('layout.app')
@section('title','Product')
@section('button')
    <a href="{{route('product.index')}}" class="btn btn-primary d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> New Product</a>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">View Products</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped " id="datatable">
                                <thead>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{route('product.data')}}',
                },
                columns: [

                    {data: 'id'},
                    {data: 'product_name'},
                    {data: 'product_quantity'},
                    {data: 'product_price'},
                    {data:'action',orderable: false, searchable: false},
                ]
            });
        });
    </script>
@endsection()
