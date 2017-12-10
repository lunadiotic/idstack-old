{!! 
    Form::model($subject, [
        'route' => $subject->exists ? ['admin.subject.update', $subject->id] : 'admin.subject.store',
        'method' => $subject->exists ? 'PUT' : 'POST'
    ]) 
!!}
    {!! Form::hidden('id') !!}
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="field-4" class="control-label">Subject</label>
                {!! Form::text('subject', null, ['class' => 'form-control', 'id' => 'subject']) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="field-5" class="control-label">Parent</label>
                {!! Form::select('parent_id', [''=>' - Pilih Parent - ']+$option, null, ['id' => 'parent_id', 'class' => 'form-control']) !!}
            </div>
        </div>
    </div>
    
{!! Form::close() !!}