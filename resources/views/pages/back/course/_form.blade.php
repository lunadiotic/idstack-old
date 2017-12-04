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
        {!! Form::text('price', null, ['class' => 'form-control', 'id' => 'price', 'autofocus']) !!}
    </div>
    
{!! Form::close() !!}