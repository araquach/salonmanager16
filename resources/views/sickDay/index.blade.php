@extends('layouts.main')

@section('head')

@include('layouts.partials.head')

@stop

@section('content')

<div class="pageHead sickDay">

@include('widgets.sickDay')

<nav class"pageHeadNav">
<ul class="list--inline">
<li><a href="{{ url('/sickDay/create') }}">Book sickDay</a></li>
<li><a href="{{ url('/sickDay/index', 'upcoming') }}">Upcoming sickDays</a></li>
<li><a href="{{ url('/sickDay/index', 'awaiting') }}">Awaiting Approval</a></li>
<li><a href="{{ url('/sickDay/index', 'denied') }}">Denied sickDays</a></li>
<li><a href="{{ url('/sickDay/index') }}">All sickDays</a></li>
</ul>
</nav>

</div> <!--.pageHead sickDay-->


<div class="views">

@foreach($sickDays as $sickDay)

<a href="/sickDay/view/{{ $sickDay->id }}" >
	<div class="view @if($sickDay->approved == 1) 
							unapproved 
						@elseif($sickDay->approved == 2) 
							approved 
						@else 
							pending 
						@endif" >
						
		<b>Requested:</b> 
		{!! calculateDays($sickDay->hours_requested) !!}
		<br />
	
		<b>From:</b> 
		{{ $sickDay->request_date_from->format('d/m/Y') }}
		<br />
	
		<b>To:</b> 
		{{ $sickDay->request_date_to->format('d/m/Y') }}
		<br />
		
		@if($sickDay->saturday == 0.5) 
		 	<img src="{{ asset('/images/icons/icons_halfxsat.png') }}" />
		@elseif($sickDay->saturday == 1)
			<img src="{{ asset('/images/icons/icons_1xsat.png') }}" />
		@elseif($sickDay->saturday == 1.5)
			<img src="{{ asset('/images/icons/icons_1andhalfxsat.png') }}" />
		@elseif($sickDay->saturday == 2)
			<img src="{{ asset('/images/icons/icons_2xsat.png') }}" />
		@endif
		
		@if($sickDay->prebooked ==1)
			<img src="{{ asset('images/icons/pb-11.png') }}">
		@endif
	</div>
</a>

@endforeach

</div>

@stop