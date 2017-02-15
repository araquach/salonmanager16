@extends('layouts.main')

@section('head')

@include('layouts.partials.head')
	
@stop

@section('content')

@if(Auth::user())

<h4>Welcome {{ Auth::user()->name }}</h4>

<div id="menuBox">
    
    <a href="{{ url('/holiday/index') }}">
        <div class="menu holiday">
            <h2><strong>Holidays</strong></h2>
            @include('widgets.holiday')
        </div>
    </a>
    
    <a href="{{ url('/sick/index') }}">
        <div class="menu sickDay">
            <h2><strong>Sick Days</strong></h2>
            @include('widgets.sickDay')
        </div>
    </a>
    
    <a href="{{ url('/lieu/index') }}">
        <div class="menu lieuHour">
            <h2><strong>Lieu Hours</strong></h2>
            @include('widgets.lieuHour')
        </div>
    </a>
    
    <a href="{{ url('/freetime/index') }}">
        <div class="menu freeTime">
            <h2><strong>Free Time</strong></h2>
            @include('widgets.freeTime')
        </div>
    </a>


</div>

@if(Auth::user()->staff->role == 1)
<a href="{{ url('/admin') }}">Admin Index</a>
@endif

@else

<h2>Welcome</h2>

@endif

@stop