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
                    Subject Data
                    <a onclick="" class="btn btn-primary pull-right" style="margin-top: -8px;">Add Subject</a>
                </div>

                <div class="panel-body">
                    <table id="subject-table" class="table table-striped">
                        <thead>
                            <tr>
                                <th width="30">ID</th>
                                <th>Parent_ID</th>
                                <th>Slug</th>
                                <th>Subject</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    {{-- dataTables --}}
    <script src="{{ url('/') }}/assets/plugins/DataTables/js/jquery.dataTables.min.js"></script>
    <script src="{{ url('/') }}/assets/plugins/DataTables/js/dataTables.bootstrap.min.js"></script>

    <script type="text/javascript">
        $('#subject-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('data.subject') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'parent_id', name: 'parent_id'},
                {data: 'slug', name: 'slug'},
                {data: 'subject', name: 'subject'},
            ]
        });
    </script>
@endsection
