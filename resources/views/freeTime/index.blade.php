@extends('layouts.main')

@section('head')

@include('layouts.partials.head')

@stop

@section('content')

<div class="pageHead freeTime">

@include('widgets.freeTime')

<nav class"pageHeadNav">
<ul class="list--inline">
<li><a href="{{ url('/freetime/create') }}">Book freeTime</a></li>
<li><a href="{{ url('/freetime/index', 'upcoming') }}">Upcoming Free Time</a></li>
<li><a href="{{ url('/freetime/index', 'awaiting') }}">Awaiting Approval</a></li>
<li><a href="{{ url('/freetime/index', 'denied') }}">Denied Free Time</a></li>
<li><a href="{{ url('/freetime/index') }}">All Free Time</a></li>
</ul>
</nav>

</div> <!--.pageHead freeTime-->


<div class="views">

@foreach($freeTimes as $freeTime)

<a href="/freeTime/view/{{ $freeTime->id }}" >
	<div class="view @if($freeTime->approved == 1) 
							unapproved 
						@elseif($freeTime->approved == 2) 
							approved 
						@else 
							pending 
						@endif" >
						
		<b>Requested:</b> 
		{!! $freeTime->free_time_hours !!}
		<br />
	
		<b>Date:</b> 
		{{ $freeTime->date_regarding->format('d/m/Y') }}
		<br />
	
		<b>Approved:</b> 
		{{ $freeTime->approved }}
		<br />
	</div>
</a>

@endforeach

</div>

@stop