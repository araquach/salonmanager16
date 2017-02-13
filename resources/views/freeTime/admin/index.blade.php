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

<a href="/admin/freeTime/view/{{ $freeTime->id }}" >
	<div class="view @if($freeTime->approved == 1) 
							unapproved 
						@elseif($freeTime->approved == 2) 
							approved 
						@else 
							pending 
						@endif" >
						
		<b>{!! $freeTime->staff->first_name !!} {!! $freeTime->staff->second_name !!}</b> 
		
		<br />
		
		<b>Requested:</b> 
		{!! calculateDays($freeTime->hours_requested) !!}
		<br />
	
		<b>From:</b> 
		{{ $freeTime->request_date_from->format('d/m/Y') }}
		<br />
	
		<b>To:</b> 
		{{ $freeTime->request_date_to->format('d/m/Y') }}
		<br />
		
		@if($freeTime->saturday == 0.5) 
		 	<img src="{{ asset('/images/icons/icons_halfxsat.png') }}" />
		@elseif($freeTime->saturday == 1)
			<img src="{{ asset('/images/icons/icons_1xsat.png') }}" />
		@elseif($freeTime->saturday == 1.5)
			<img src="{{ asset('/images/icons/icons_1andhalfxsat.png') }}" />
		@elseif($freeTime->saturday == 2)
			<img src="{{ asset('/images/icons/icons_2xsat.png') }}" />
		@endif
		
		@if($freeTime->prebooked ==1)
			<img src="{{ asset('images/icons/pb-11.png') }}">
		@endif
	</div>
</a>

@endforeach

</div>

@stop