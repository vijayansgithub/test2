<div class="form-group {{ $errors->has('department') ? 'has-error' : ''}}">
	{!! Form::label('department', 'department', ['class' => 'control-label']) !!}
	{!! Form::text('department', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
	{!! $errors->first('department', '<p class="help-block">:message</p>') !!}
				</div>
	<div class="form-group {{ $errors->has('year') ? 'has-error' : ''}}">
	{!! Form::label('year', 'year', ['class' => 'control-label']) !!}
	{!! Form::text('year', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
	{!! $errors->first('year', '<p class="help-block">:message</p>') !!}
				</div>
	<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
	@csrf
	
</div> 