@extends('layouts.main')

@section('head')

@include('layouts.partials.head')

@stop

@section('content')

<div class="pageHead lieuHour">

@include('widgets.lieuHour')

<nav class"pageHeadNav">
<ul class="list--inline">
<li><a href="{{ url('/lieu/create') }}">Book Lieu Hours</a></li>
<li><a href="{{ url('/lieu/index', 'upcoming') }}">Upcoming Lieu</a></li>
<li><a href="{{ url('/lieu/index', 'awaiting') }}">Awaiting Approval</a></li>
<li><a href="{{ url('/lieu/index', 'denied') }}">Denied Lieu Hours</a></li>
<li><a href="{{ url('/lieu/index') }}">All Lieu Hours</a></li>
</ul>
</nav>

</div> <!--.pageHead lieuHour-->


<div class="views">

@foreach($lieuHours as $lieuHour)

<a href="/lieu/view/{{ $lieuHour->id }}" >
	<div class="view @if($lieuHour->approved == 1) 
							unapproved 
						@elseif($lieuHour->approved == 2) 
							approved 
						@else 
							pending 
						@endif" >
						
		<b>Requested:</b> 
		{!! $lieuHour->lieu_hours !!}
		<br />
	
		<b>From:</b> 
		{{ $lieuHour->date_regarding->format('d/m/Y') }}
		<br />
	
		<b>Approved:</b> 
		@if($lieuHour->approved == 1)
			No
			@elseif($lieuHour->approved == 2)
			Yes
			@else
			Waiting Approval
		@endif
		<br />
	</div>
</a>

@endforeach

</div>

@stop