{!! 
    Form::model($course, [
        'route' => $course->exists ? ['admin.course.update', $course->id] : 'admin.course.store',
        'method' => $course->exists ? 'PUT' : 'POST'
    ]) 
!!}
    {!! Form::hidden('id') !!}
    <div class="form-group">
        <label for="" class="control-label">Instructor</label>
        {!! Form::select('user_id', $user,null, ['class' => 'form-control', 'id' => 'user_id']) !!}
    </div>

    <div class="form-group">
        <label for="" class="control-label">Level</label>
        {!! Form::select('level_id', $level,null, ['class' => 'form-control', 'id' => 'level_id']) !!}
    </div>

    <div class="form-group">
        <label for="" class="control-label">Title</label>
        {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'title', 'autofocus']) !!}
    </div>

    <div class="form-group">
        <label for="" class="control-label">Description</label>
        {!! Form::textarea('desc', null, ['class' => 'form-control', 'id' => 'desc', 'cols'=>"30", 'rows'=>"10"]) !!}
    </div>

    <div class="form-group">
        <label for="" class="control-label">Price</label>
        {!! Form::text('price', null, ['class' => 'form-control', 'id' => 'price']) !!}
    </div>

    <div class="form-group">
        <label for="" class="control-label">Subjects</label>
        {!! Form::select('subjects[]', [''=>'']+App\Models\Subject::pluck('subject','id')->all(), null, ['id' => 'subjects', 'class'=>'form-control js-selectize', 'multiple', 'placeholder' => 'Click Here!', 'required' => 'required']) !!}
    </div>

    <div class="form-group">
        <label for="" class="control-label">Software</label>
        {!! Form::select('software[]', [''=>'']+App\Models\Software::pluck('software','id')->all(), null, ['id' => 'software', 'class'=>'form-control js-selectize', 'multiple', 'placeholder' => 'Click Here!', 'required' => 'required']) !!}
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
    });
</script>