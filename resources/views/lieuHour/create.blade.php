@extends('layouts.main')

@section('head')

@include('layouts.partials.head')

@stop

@section('content')

<div class="form lieuHour">
	
	<h2>Book Lieu Hours</h2>
	
@if(Session::has('message'))
    <div>
    {{{ Session::get('message') }}}
    </div>
@endif

{!! Form::open(array(
	'action' => 'LieuHourController@store'
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
	
	{!! Form::hidden('approved', 0) !!}
	
	<p>
    	{!! Form::label('date_regarding', 'Date:') !!}
    	{!! Form::date('date_regarding', old('date_regarding')) !!}
    	{!! $errors->first('date_regarding', '<div class="errorMessage">:message</div>') !!}
	</p>
	
	<p>
    	{!! Form::label('lieu_hours', 'To:') !!}
    	{!! Form::number('lieu_hours', old('lieu_hours:')) !!}
    	{!! $errors->first('lieu_hours', '<div class="errorMessage">:message</div>') !!}
	</p>
	
	<p>
    	{!! Form::label('description', 'Description:') !!}
    	{!! Form::text('description', old('description')) !!}
    	{!! $errors->first('description', '<div class="errorMessage">:message</div>') !!}
	</p>
	
	<p>
	    {!! Form::submit('Create') !!}
	</p>
	
	<a href="{{ action('LieuHourController@index') }}">cancel</a>

{{ Form::close() }}


</div>

@stop