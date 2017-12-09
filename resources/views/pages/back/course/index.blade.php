@extends('layouts.app')

@section('styles')
    {{-- dataTables --}}
    <link href="{{ url('/') }}/assets/plugins/DataTables/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('assets/plugins/selectize/css/selectize.bootstrap3.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
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
                                <th>Detail</th>
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
    <script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>

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
                {data: 'detail', name: 'detail'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            order : [[ 0, "desc" ]]
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
