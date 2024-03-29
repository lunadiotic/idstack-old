{!! 
    Form::model($level, [
        'route' => $level->exists ? ['admin.level.update', $level->id] : 'admin.level.store',
        'method' => $level->exists ? 'PUT' : 'POST'
    ]) 
!!}
    {!! Form::hidden('id') !!}
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="field-4" class="control-label">Level</label>
                {!! Form::text('level', null, ['class' => 'form-control', 'id' => 'level', 'autofocus']) !!}
            </div>
        </div>
    </div>
    
{!! Form::close() !!}