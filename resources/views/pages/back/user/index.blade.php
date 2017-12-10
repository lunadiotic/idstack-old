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
                        <a href="{{ route('admin.user.create') }}" class="btn btn-primary pull-right show-modal" style="margin-top: -29px;" title="Create Data">Create Data</a>
                    </p>

                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="30">ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Active</th>
                                <th></th>
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
    {{-- dataTables --}}
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
            ajax: "{{ route('data.user') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'role', name: 'role'},
                {data: 'active', name: 'active'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    </script>
    <script type="text/javascript">
        var editor_config = {
            path_absolute : "/",
            selector: "textarea",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern",
            ],
            setup: function (editor) {
                editor.on('change', function () {
                    tinymce.triggerSave();
                });
            },
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            file_browser_callback : function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'filemanager?field_name=' + field_name;
                if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
                } else {
                cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no"
                });
            }
        };

        

        $('#modal').on('shown.bs.modal', function () {
            tinymce.init(editor_config);
        });
        $('#modal').on('hidden.bs.modal', function () {
            tinymce.remove();
        });
    </script>
@endsection
