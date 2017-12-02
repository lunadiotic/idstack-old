{!! Form::model($subject, ['route' => 'admin.subject.store']) !!}
    <div class="form-group">
        <label for="" class="control-label">Subject</label>
        {!! Form::text('subject', null, ['class' => 'form-control', 'id' => 'subject']) !!}
    </div>
    <div class="form-group">
        <label for="" class="control-label">Parent</label>
        {!! Form::select('parent_id', [''=>' - Pilih Parent - ']+$option, null, ['id' => 'parent_id', 'class' => 'form-control']) !!}
    </div>
{!! Form::close() !!}