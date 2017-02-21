@extends('layouts.main')

@section('head')

@include('layouts.partials.head')

@stop

@section('content')

<div class="pageHead freeTime">

@include('widgets.admin.freeTime')

<nav class"pageHeadNav">
<ul class="list--inline">
<li><a href="{{ url('/freeTime/admin/create') }}">Book freeTime</a></li>
<li><a href="{{ url('/freeTime/admin/index', 'upcoming') }}">Upcoming freeTimes</a></li>
<li><a href="{{ url('/freeTime/admin/index', 'awaiting') }}">Awaiting Approval</a></li>
<li><a href="{{ url('/freeTime/admin/index', 'denied') }}">Denied freeTimes</a></li>
<li><a href="{{ url('/freeTime/admin/index') }}">All freeTimes</a></li>
</ul>
</nav>

</div> <!--.pageHead freeTime-->


<div class="views">

@foreach($freeTimes as $freeTime)

<a href="/admin/freetime/view/{{ $freeTime->id }}" >
	<div class="view @if($freeTime->approved == 1) 
							unapproved 
						@elseif($freeTime->approved == 2) 
							approved 
						@else 
							pending 
						@endif" >
						
		<b>{!! $freeTime->staff->first_name !!} {!! $freeTime->staff->second_name !!}</b> 
		
		<br />
		
		<b>Date:</b> 
		{{ $freeTime->date_regarding->format('d/m/Y') }}
		<br>
		
		<b>Hours Requested:</b> 
		{!! $freeTime->free_time_hours !!}
		<br>

		@if($freeTime->approved == 1)
			Denied
		@elseif($freeTime->approved == 2)
			Approved
		@else
			Waiting Approval
		@endif
	</div>
</a>

@endforeach

</div>

@stop