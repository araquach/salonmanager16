@extends('layouts.main')

@section('head')

@include('layouts.partials.head')
	
@stop

@section('content')

@if(Auth::user())

<h2>Welcome {{ Auth::user()->name }}</h2>

@else

<h2>Welcome</h2>

@endif

@stop