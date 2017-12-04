@extends('layouts.app')

@section('styles')
    {{-- dataTables --}}
    <link href="{{ url('/') }}/assets/plugins/DataTables/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('assets/plugins/selectize/css/selectize.bootstrap3.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Course Data
                    <a href="{{ route('admin.course.create') }}" class="btn btn-primary pull-right show-modal" style="margin-top: -8px;" title="Create Data">Create Data</a>
                </div>

                <div class="panel-body">
                    <table id="datatable" class="table table-striped">
                        <thead>
                            <tr>
                                <th width="30">ID</th>
                                <th>User</th>
                                <th>Level</th>
                                <th>Course</th>
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

@include('pages.back.course.modal')
@include('pages.back.course.modalconfirm')
@endsection

@section('scripts')
    {{-- dataTables --}}
    <script src="{{ url('/') }}/assets/plugins/DataTables/js/jquery.dataTables.min.js"></script>
    <script src="{{ url('/') }}/assets/plugins/DataTables/js/dataTables.bootstrap.min.js"></script>
    
    <script src="{{ asset('assets/plugins/selectize/js/standalone/selectize.min.js') }}"></script>

    <script type="text/javascript">
        $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('data.course') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'user', name: 'user'},
                {data: 'level', name: 'level'},
                {data: 'title', name: 'title'},
                {data: 'price', name: 'price'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    </script>

    
@endsection
