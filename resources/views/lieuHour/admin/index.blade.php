@extends('layouts.main')

@section('head')

@include('layouts.partials.head')

@stop

@section('content')

<div class="pageHead lieuHour">

@include('widgets.admin.lieuHour')

<nav class"pageHeadNav">
<ul class="list--inline">
<li><a href="{{ url('/lieu/admin/create') }}">Book lieuHour</a></li>
<li><a href="{{ url('/lieu/admin/index', 'upcoming') }}">Upcoming lieuHours</a></li>
<li><a href="{{ url('/lieu/admin/index', 'awaiting') }}">Awaiting Approval</a></li>
<li><a href="{{ url('/lieu/admin/index', 'denied') }}">Denied lieuHours</a></li>
<li><a href="{{ url('/lieu/admin/index') }}">All lieuHours</a></li>
</ul>
</nav>

</div> <!--.pageHead lieuHour-->


<div class="views">

@foreach($lieuHours as $lieuHour)

<a href="/admin/lieuHour/view/{{ $lieuHour->id }}" >
	<div class="view @if($lieuHour->approved == 1) 
							unapproved 
						@elseif($lieuHour->approved == 2) 
							approved 
						@else 
							pending 
						@endif" >
						
		<b>{!! $lieuHour->staff->first_name !!} {!! $lieuHour->staff->second_name !!}</b> 
		
		<br />
		
		<b>Requested:</b> 
		{!! calculateDays($lieuHour->hours_requested) !!}
		<br />
	
		<b>From:</b> 
		{{ $lieuHour->request_date_from->format('d/m/Y') }}
		<br />
	
		<b>To:</b> 
		{{ $lieuHour->request_date_to->format('d/m/Y') }}
		<br />
		
		@if($lieuHour->saturday == 0.5) 
		 	<img src="{{ asset('/images/icons/icons_halfxsat.png') }}" />
		@elseif($lieuHour->saturday == 1)
			<img src="{{ asset('/images/icons/icons_1xsat.png') }}" />
		@elseif($lieuHour->saturday == 1.5)
			<img src="{{ asset('/images/icons/icons_1andhalfxsat.png') }}" />
		@elseif($lieuHour->saturday == 2)
			<img src="{{ asset('/images/icons/icons_2xsat.png') }}" />
		@endif
		
		@if($lieuHour->prebooked ==1)
			<img src="{{ asset('images/icons/pb-11.png') }}">
		@endif
	</div>
</a>

@endforeach

</div>

@stop