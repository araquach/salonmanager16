@extends('layouts.main')

@section('head')

@include('layouts.partials.head')
	
@stop

@section('content')

@if(Auth::user())

<h2>Welcome {{ Auth::user()->name }}</h2>

<div id="menuBox">
    
    <a href="{{ url('/holiday/index') }}">
        <div class="menu holiday">
            <h2><strong>Holidays</strong></h2>
            @include('widgets.holiday')
        </div>
    </a>
</div>

@else

<h2>Welcome</h2>

@endif

@stop