@extends('layouts.main')

@section('head')

@include('layouts.partials.head')

@stop

@section('content')

<div class="form holiday">

{!! Form::open(array(
	'action' => 'HolidayController@store'
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

	{!! Form::hidden('staff_id', Auth::id()) !!}
	
	<p>
    	{!! Form::label('request_date_from', 'From:') !!}
    	{!! Form::text('request_date_from', old('request_date_from')) !!}
    	{!! $errors->first('request_date_from', '<div class="errorMessage">:message</div>') !!}
	</p>
	
	<p>
    	{!! Form::label('request_date_to', 'To:') !!}
    	{!! Form::text('request_date_to', old('request_date_to:')) !!}
    	{!! $errors->first('request_date_to', '<div class="errorMessage">:message</div>') !!}
	</p>
	
	<p>
    	{!! Form::label('hours_requested', 'Days Requested:') !!}
    	{!! Form::text('hours_requested', old('hours_requested')) !!}
    	{!! $errors->first('hours_requested', '<div class="errorMessage">:message</div>') !!}
	</p>
	
	<p>
	    {!! Form::submit('Create') !!}
	</p>
	
	<a href="{{ action('HolidayController@index') }}">cancel</a>

{{ Form::close() }}


</div>

@stop