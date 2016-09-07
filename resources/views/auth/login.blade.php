@extends('layouts.main')

@section('head')

@include('layouts.partials.head')

@stop

@section('content')

<h2>Login</h2>

{{ Form::open(array('url' => '/login')) }}

    <p>
    	{!! Form::label('email', 'Email Address') !!}
    	{!! Form::email('email', old('email')) !!}
    	{!! $errors->first('email', '<div class="errorMessage">:message</div>') !!}
    </p>
    
    <p>
    	{!! Form::label('password', 'Password') !!}
    	{!! Form::text('password', old('password')) !!}
    	{!! $errors->first('password', '<div class="errorMessage">:message</div>') !!}
    </p>
    
    <p>
    	{!! Form::label('remember', 'Remember Me') !!}
    	{!! Form::checkBox('remember') !!}
    </p>
    
    <div class="row">
	{!! Form::submit('Login') !!}
	</div>

{{ Form::close() }}

<p><a href="{{ url('/password/reset') }}">Forgot Your Password?</a></p>

@endsection
