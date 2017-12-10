{!! 
    Form::model($user, [
        'route' => $user->exists ? ['admin.user.update', $user->id] : 'admin.user.store',
        'method' => $user->exists ? 'PUT' : 'POST'
    ]) 
!!}
    {!! Form::hidden('id') !!}

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="field-4" class="control-label">Name</label>
                {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'autofocus' => 'autofocus']) !!}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="field-5" class="control-label">Phone</label>
                {!! Form::text('phone', null, ['class' => 'form-control', 'id' => 'phone']) !!}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="field-6" class="control-label">Title</label>
                {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'title', ]) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="field-4" class="control-label">Email</label>
                {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'email', ]) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="field-5" class="control-label">Password</label>
                <input id="password" type="password" class="form-control" name="password" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="field-4" class="control-label">Facebook</label>
                {!! Form::text('facebook', null, ['class' => 'form-control', 'id' => 'facebook', ]) !!}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="field-5" class="control-label">Twitter</label>
                {!! Form::text('twitter', null, ['class' => 'form-control', 'id' => 'twitter', ]) !!}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="field-6" class="control-label">GitHub</label>
                {!! Form::text('github', null, ['class' => 'form-control', 'id' => 'github', ]) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="field-4" class="control-label">Role</label>
                {!! Form::select('role', $role, null, ['id' => 'role', 'class'=>'form-control', 'required' => 'required']) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="field-5" class="control-label">Is Active</label>
                {!! Form::select('active', ['1' => 'Active', '0' => 'Non-Active'], null, ['id' => 'active', 'class'=>'form-control', 'required' => 'required']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="field-3" class="control-label">Description</label>
                {!! Form::textarea('desc', null, ['class' => 'form-control', 'id' => 'desc', 'required' => 'required', 'cols'=>"30", 'rows'=>"10"]) !!}
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
                @if (isset($user) && $user->image !== '')
                <img src="{{ $user->image }}" id="holder" style="margin-top:15px;max-height:254px;max-width: 152px;">
                @endif
                <img id="holder" style="margin-top:15px;max-height:254px;max-width: 152px;">
            </div>
        </div>
    </div>
    
{!! Form::close() !!}

<script type="text/javascript">
    $(document).ready(function () {        
        $('#lfm').filemanager('image', {prefix: '/filemanager'});
    });
</script>