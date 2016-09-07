@extends('layouts.main')

@section('head')

@include('layouts.partials.head')

@stop

@section('content')

<h2>Login</h2>

{{ Form::open(array('url' => '/login')) }}

    <div class="row">
    	{!! Form::label('email', 'Email Address') !!}
    	{!! Form::email('email', old('email')) !!}
    	{!! $errors->first('email', '<div class="errorMessage">:message</div>') !!}
    </div>
    
    <div class="row">
    	{!! Form::label('password', 'Password') !!}
    	{!! Form::text('password', old('password')) !!}
    	{!! $errors->first('password', '<div class="errorMessage">:message</div>') !!}
    </div>
    
    <div class="row">
    	{!! Form::label('remember', 'Remember Me') !!}
    	{!! Form::checkBox('remember', old('remember')) !!}
    </div>
    
    <div class="row">
	{!! Form::submit('Login') !!}
	</div>

{{ Form::close() }}

<a href="{{ url('/password/reset') }}">Forgot Your Password?</a>

@endsection
