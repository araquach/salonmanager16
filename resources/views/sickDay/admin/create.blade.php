@extends('layouts.main')

@section('head')

@include('layouts.partials.head')

@stop

@section('content')

<div class="form sickDay">
	
	<h2>Log Sick Days</h2>
	
	@if(Session::has('message'))
	    <div>
	    	{{{ Session::get('message') }}}
	    </div>
	@endif
	
	{!! Form::open(array(
		'action' => 'AdminSickDayController@store'
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
	
		<p>
	    	{!! Form::label('staff_id', 'Staff:') !!}
	    	{!! Form::text('staff_id', old('staff_id')) !!}
	    	{!! $errors->first('staff_id', '<div class="errorMessage">:message</div>') !!}
		</p>
		
		<p>
	    	{!! Form::label('sick_from', 'From:') !!}
	    	{!! Form::date('sick_from', old('sick_from')) !!}
	    	{!! $errors->first('sick_from', '<div class="errorMessage">:message</div>') !!}
		</p>
		
		<p>
	    	{!! Form::label('sick_to', 'To:') !!}
	    	{!! Form::date('sick_to', old('sick_to:')) !!}
	    	{!! $errors->first('sick_to', '<div class="errorMessage">:message</div>') !!}
		</p>
		
		<p>
	    	{!! Form::label('sick_hours', 'How many days:') !!}
	    	{!! Form::number('sick_hours', old('sick_hours')) !!}
	    	{!! $errors->first('sick_hours', '<div class="errorMessage">:message</div>') !!}
		</p>
		
		<p>
	    	{!! Form::label('description', 'Description:') !!}
	    	{!! Form::text('description', old('description')) !!}
	    	{!! $errors->first('description', '<div class="errorMessage">:message</div>') !!}
		</p>
		
		<div class="row question">
			<p>
		    	<p class="scale_label">Deducted</p>
		    	{!! Form::radio('deducted', '1') !!}
		    	<p class="scale_label">Pending</p>
		    	{!! Form::radio('deducted', '0') !!}
			</p>
		</div>
		
		<p>
		    {!! Form::submit('Create') !!}
		</p>
		
		<a href="{{ action('AdminSickDayController@index') }}">cancel</a>
	
	{{ Form::close() }}

</div>

@stop