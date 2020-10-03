@extends('layout.app')
@section('title','Tag')
@section('button')
    <a href="{{route('tag.index')}}" class="btn btn-primary d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> New Tag</a>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="m-b-0 text-white">View Tags</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped " id="datatable">
                                <thead>
                                <tr>
                                    <th>Tag ID</th>
                                    <th>Name</th>
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
                    url: '{{route('tag.data')}}',
                },
                columns: [

                    {data: 'id'},
                    {data: 'tag_name'},
                    {data:'action',orderable: false, searchable: false},
                ]
            });
        });
    </script>
@endsection()
