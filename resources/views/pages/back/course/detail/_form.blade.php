{!! 
    Form::model($detail, [
        'route' => $detail->exists ? ['admin.course.detail.update', $detail->id] : 'admin.course.detail.store',
        'method' => $detail->exists ? 'PUT' : 'POST'
    ]) 
!!}
    {!! Form::hidden('id') !!}    
    {!! Form::hidden('course_id', null, ['id' => 'data_id']) !!}
    <div class="form-group">
        <label for="" class="control-label">Title</label>
        {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'title', 'autofocus']) !!}
    </div>

    <div class="form-group">
        <label for="" class="control-label">Description</label>
        {!! Form::textarea('desc', null, ['class' => 'form-control', 'id' => 'desc', 'cols'=>"30", 'rows'=>"10"]) !!}
    </div>

    <div class="form-group">
        <label for="" class="control-label">Embed URL</label>
        {!! Form::text('iframe', null, ['class' => 'form-control', 'id' => 'iframe',]) !!}
    </div>
    
{!! Form::close() !!}