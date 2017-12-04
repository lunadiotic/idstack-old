<div class="row">
    <a href="{{ route('admin.course.detail.create') }}" class="btn btn-primary show-modal" id="{{ $course->id }}">Add Content</a>
</div>
<br>
<div class="row">
    <div class="panel-group" id="accordion">
    @if($course->detail->count())
        @foreach($course->detail as $row)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$row->id}}">
                        {{$row->title}}</a>
                    </h4>

                    <a href="{{ route('admin.course.detail.destroy', $row->id) }}" class="btn btn-danger pull-right btn-xs show-modal-confirm" style="margin-top: -22px;" title="Delete">Delete</a>
                    <a href="{{ route('admin.course.detail.edit', $row->id) }}" class="btn btn-primary pull-right btn-xs show-modal edit" style="margin-top: -22px;" title="Edit" id="{{ $course->id }}">Edit</a>
                </div>
                <div id="collapse{{$row->id}}" class="panel-collapse collapse">
                    <div class="panel-body">
                        {!! $row->desc !!}
                    </div>
                </div>
            </div>
        @endforeach
    @endif
    </div>
</div>