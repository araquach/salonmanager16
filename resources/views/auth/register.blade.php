@extends('layouts.main')

@section('head')

@include('layouts.partials.head')

@stop

@section('content')

<h2>Register</h2>

{{ Form::open(array('url' => '/register')) }}

    <div class="row">
    	{!! Form::label('name', 'Name') !!}
    	{!! Form::text('name', old('name')) !!}
    	{!! $errors->first('name', '<div class="errorMessage">:message</div>') !!}
    </div>
    
    <div class="row">
    	{!! Form::label('email', 'Email address') !!}
    	{!! Form::email('email', old('email')) !!}
    	{!! $errors->first('email', '<div class="errorMessage">:message</div>') !!}
    </div>
    
    <div class="row">
    	{!! Form::label('password', 'Password') !!}
    	{!! Form::text('password', old('password')) !!}
    	{!! $errors->first('password', '<div class="errorMessage">:message</div>') !!}
    </div>
    
    <div class="row">
    	{!! Form::label('password_confirmation', 'Confirm Password') !!}
    	{!! Form::text('password_confirmation', old('password_confirmation')) !!}
    	{!! $errors->first('password_confirmation', '<div class="errorMessage">:message</div>') !!}
    </div>
    
    <div class="row">
    	{!! Form::submit('Register') !!}
	</div>

{{ Form::close() }}

@endsection
