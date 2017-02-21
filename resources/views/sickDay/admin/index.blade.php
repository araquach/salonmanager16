@extends('layouts.main')

@section('head')

@include('layouts.partials.head')

@stop

@section('content')

<div class="pageHead sickDay">
	<h3>Admin</h3>

@include('widgets.admin.sickDay')

	<nav class"pageHeadNav">
		<ul class="list--inline">
			<li><a href="{{ url('/admin/sick/create') }}">Log Sick Day</a></li>
			<li><a href="{{ url('/admin/sick/index', 'deducted') }}">Deducted</a></li>
			<li><a href="{{ url('/admin/sick/index', 'waiting') }}">Not Deducted</a></li>
			<li><a href="{{ url('/admin/sick/index') }}">All Sick Days</a></li>
		</ul>
	</nav>

</div> <!--.pageHead sickDay-->


<div class="views">

@foreach($sickDays as $sickDay)

<a href="/admin/sick/view/{{ $sickDay->id }}" >
	<div class="view pending" >
						
		<b>{!! $sickDay->staff->first_name !!} {!! $sickDay->staff->second_name !!}</b> 
		
		<br>
		
		<b>Days Sick:</b> 
		{!! calculateDays($sickDay->sick_hours) !!}
		<br>
	
		<b>From:</b> 
		{{ $sickDay->sick_from->format('d/m/Y') }}
		<br>
	
		<b>To:</b> 
		{{ $sickDay->sick_to->format('d/m/Y') }}
		<br>
	</div>
</a>

@endforeach

</div>

@stop