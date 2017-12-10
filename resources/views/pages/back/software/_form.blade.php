{!! 
    Form::model($software, [
        'route' => $software->exists ? ['admin.software.update', $software->id] : 'admin.software.store',
        'method' => $software->exists ? 'PUT' : 'POST'
    ]) 
!!}
    {!! Form::hidden('id') !!}

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="field-4" class="control-label">Subject</label>
                {!! Form::text('software', null, ['class' => 'form-control', 'id' => 'software', 'autofocus']) !!}
            </div>
        </div>
    </div>
    
{!! Form::close() !!}