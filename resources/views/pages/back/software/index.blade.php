@extends('layouts.back.app')

@section('styles')
    <!-- DataTables -->
    <link href="{{ asset('assets/back/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/back/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ asset('assets/back/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .modal-lg {
            width: 750px;
            margin: auto;
        }
    </style>
@endsection

@section('content')
<div class="container-fluid">

    @include('layouts.back.partials._bread')

    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title"><b>Default Example</b></h4>
                <p class="text-muted font-13 m-b-30">
                    <a href="{{ route('admin.software.create') }}" class="btn btn-primary pull-right show-modal" style="margin-top: -29px;" title="Create Data">Create Data</a>
                </p>

                <table id="datatable" class="table table-bordered">
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
    </div> <!-- end row -->
    @include('pages.back.user.modal')
    @include('pages.back.user.modalconfirm')
</div> <!-- container -->
@endsection

@section('scripts')
    <!-- Required datatable js -->
    <script src="{{ asset('assets/back/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/back/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/back/plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/back/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>

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
