@extends('layouts.main')

@section('head')

@include('layouts.partials.head')

@stop

@section('content')

<div class="form holiday">
	
	<h2>Book a holiday</h2>
	
@if(Session::has('message'))
    <div>
    {{{ Session::get('message') }}}
    </div>
@endif

{!! Form::open(array(
	'action' => 'AdminHolidayController@store'
)) !!}

@if (count($errors) > 0)

	<div class="errorSummary">
		<p>Please fix the following input errors:</p>
		<ul>
	   		 @foreach($errors->all() as $error)
		        <li>{{{ $error }}}</li>
	    	@endforeach
		</ul>
	</div>
   
@endif

	{!! Form::hidden('approved', 2) !!}
	
	<p>
    	{!! Form::label('staff_id', 'Staff:') !!}
    	{!! Form::select('staff_id', $staffs, old('staff_id')) !!}
    	{!! $errors->first('staff_id', '<div class="errorMessage">:message</div>') !!}
	</p>
	
	<p>
    	{!! Form::label('request_date_from', 'From:') !!}
    	{!! Form::date('request_date_from', old('request_date_from')) !!}
    	{!! $errors->first('request_date_from', '<div class="errorMessage">:message</div>') !!}
	</p>
	
	<p>
    	{!! Form::label('request_date_to', 'To:') !!}
    	{!! Form::date('request_date_to', old('request_date_to:')) !!}
    	{!! $errors->first('request_date_to', '<div class="errorMessage">:message</div>') !!}
	</p>
	
	<p>
    	{!! Form::label('hours_requested', 'Hours Requested:') !!}
    	{!! Form::number('hours_requested', old('hours_requested')) !!}
    	{!! $errors->first('hours_requested', '<div class="errorMessage">:message</div>') !!}
	</p>
	
	<div class="row question">
		<p>
			{!! Form::label('saturday', 'How Many Saturdays:') !!}
	    	<p class="scale_label">0</p>
	    	{!! Form::radio('saturday', '0') !!}
	    	<p class="scale_label">1/2</p>
	    	{!! Form::radio('saturday', '.5') !!}
	        <p class="scale_label">1</p>
	        {!! Form::radio('saturday', '1') !!}
	        <p class="scale_label">1 1/2</p>
	        {!! Form::radio('saturday', '1.5') !!}
	        <p class="scale_label">2</p>
	        {!! Form::radio('saturday', '2') !!}
	    	{!! $errors->first('saturday', '<div class="errorMessage">:message</div>') !!}
		</p>
	</div>
	
	<p>
	    {!! Form::submit('Save') !!}
	</p>
	
	<a href="{{ action('AdminHolidayController@index') }}">cancel</a>

{{ Form::close() }}


</div>

@stop