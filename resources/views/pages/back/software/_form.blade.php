{!! 
    Form::model($software, [
        'route' => $software->exists ? ['admin.software.update', $software->id] : 'admin.software.store',
        'method' => $software->exists ? 'PUT' : 'POST'
    ]) 
!!}
    {!! Form::hidden('id') !!}
    <div class="form-group">
        <label for="" class="control-label">Software</label>
        {!! Form::text('software', null, ['class' => 'form-control', 'id' => 'software', 'autofocus']) !!}
    </div>
    
{!! Form::close() !!}