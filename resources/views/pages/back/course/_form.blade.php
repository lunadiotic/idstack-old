{!! 
    Form::model($course, [
        'route' => $course->exists ? ['admin.course.update', $course->id] : 'admin.course.store',
        'method' => $course->exists ? 'PUT' : 'POST'
    ]) 
!!}
    {!! Form::hidden('id') !!}

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="field-3" class="control-label">Title</label>
                {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'title', 'autofocus']) !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="field-3" class="control-label">Description</label>
                {!! Form::textarea('desc', null, ['class' => 'form-control', 'id' => 'desc', 'cols'=>"30", 'rows'=>"30"]) !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="" class="control-label">Price</label>
                {!! Form::text('price', null, ['class' => 'form-control', 'id' => 'price']) !!}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="field-3" class="control-label">Instructor</label>
                {!! Form::select('user_id', $user,null, ['class' => 'form-control', 'id' => 'user_id']) !!}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="" class="control-label">Level</label>
                {!! Form::select('level_id', $level,null, ['class' => 'form-control', 'id' => 'level_id']) !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="" class="control-label">Subjects</label>
                {!! Form::select('subjects[]', [''=>'']+App\Models\Subject::pluck('subject','id')->all(), null, ['id' => 'subjects', 'class'=>'form-control js-selectize', 'multiple', 'placeholder' => 'Click Here!', 'required' => 'required']) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="" class="control-label">Software</label>
                {!! Form::select('software[]', [''=>'']+App\Models\Software::pluck('software','id')->all(), null, ['id' => 'software', 'class'=>'form-control js-selectize', 'multiple', 'placeholder' => 'Click Here!', 'required' => 'required']) !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="field-3" class="control-label">Image</label>
                <div class="input-group">
                    {!! Form::text('image', null, ['id' => 'thumbnail', 'class' => 'form-control', 'readonly' => 'readonly']) !!}
                    <span class="input-group-btn">
                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-default">
                        <i class="fa fa-cloud-upload"></i> Choose
                    </a>
                    </span>
                </div>
                @if (isset($course) && $course->image !== '')
                <img src="{{ $course->image }}" id="holder" style="margin-top:15px;max-height:254px;max-width: 152px;">
                @endif
                <img id="holder" style="margin-top:15px;max-height:254px;max-width: 152px;">
            </div>
        </div>
    </div>
    
{!! Form::close() !!}

<script type="text/javascript">
    $(document).ready(function () {
        $('.js-selectize').selectize({
            plugins: ['remove_button'],
            delimiter: ',',
            persist: false,
            create: function(input) {
                return {
                    value: input,
                    text: input
                }
            }
        });
        $('#lfm').filemanager('image', {prefix: '/filemanager'});
    });
</script>