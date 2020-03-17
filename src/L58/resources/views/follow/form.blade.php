<div class="form-group{{ $errors->has('id_follower') ? 'has-error' : ''}}">
    {!! Form::label('id_follower', 'Id Follower', ['class' => 'control-label']) !!}
    {!! Form::number('id_follower', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('id_follower', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('id_followed') ? 'has-error' : ''}}">
    {!! Form::label('id_followed', 'Id Followed', ['class' => 'control-label']) !!}
    {!! Form::number('id_followed', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('id_followed', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
