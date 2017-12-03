@extends('layouts.app')

@section('styles')
    {{-- dataTables --}}
    <link href="{{ url('/') }}/assets/plugins/DataTables/css/dataTables.bootstrap.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Software Data
                    <a href="{{ route('admin.software.create') }}" class="btn btn-primary pull-right show-modal" style="margin-top: -8px;" title="Create Data">Create Data</a>
                </div>

                <div class="panel-body">
                    <table id="datatable" class="table table-striped">
                        <thead>
                            <tr>
                                <th width="30">ID</th>
                                <th>Software</th>
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

@include('pages.back.software.modal')
@include('pages.back.software.modalconfirm')
@endsection

@section('scripts')
    {{-- dataTables --}}
    <script src="{{ url('/') }}/assets/plugins/DataTables/js/jquery.dataTables.min.js"></script>
    <script src="{{ url('/') }}/assets/plugins/DataTables/js/dataTables.bootstrap.min.js"></script>

    <script type="text/javascript">
        $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('data.software') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'software', name: 'software'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    </script>
@endsection
