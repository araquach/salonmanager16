@extends('layouts.main')

@section('head')

@include('layouts.partials.head')

@stop

@section('content')

<div class="pageHead lieuHour">
	<h3>Admin</h3>

	@include('widgets.admin.lieuHour')

	<nav class"pageHeadNav">
		<ul class="list--inline">
			<li><a href="{{ url('/admin/lieu/create') }}">Book lieuHour</a></li>
			<li><a href="{{ url('/admin/lieu/index', 'upcoming') }}">Upcoming lieuHours</a></li>
			<li><a href="{{ url('/admin/lieu/index', 'awaiting') }}">Awaiting Approval</a></li>
			<li><a href="{{ url('/admin/lieu/index', 'denied') }}">Denied lieuHours</a></li>
			<li><a href="{{ url('/admin/lieu/index') }}">All lieuHours</a></li>
		</ul>
	</nav>

</div> <!--.pageHead lieuHour-->


<div class="views">

@foreach($lieuHours as $lieuHour)
	
	<a href="/admin/lieu/view/{{ $lieuHour->id }}" >
		<div class="view @if($lieuHour->approved == 1) 
								unapproved 
							@elseif($lieuHour->approved == 2) 
								approved 
							@else 
								pending 
							@endif" >
							
			<b>Request Date:</b> 
			{{ $lieuHour->date_regarding->format('d/m/Y') }}
			<br>
			
			<b>Hours:</b> 
			{!! $lieuHour->lieu_hours !!}
			
			<br>
			
			@if($lieuHour->approved == 1)
				Denied
				@elseif($lieuHour->approved == 2)
				Approved
				@else
				Waiting Approval
			@endif
			
			<br>
		</div>
	</a>
	
	@endforeach

</div>

@stop