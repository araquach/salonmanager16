@extends('layouts.main')

@section('head')

@include('layouts.partials.head')

@stop

@section('content')

<div class="pageHead holiday">

@include('widgets.holiday')

<nav class"pageHeadNav">
<ul class="list--inline">
<li><a href="{{ url('/holiday/create') }}">Book holiday</a></li>
<li><a href="{{ url('/holiday/index', 'upcoming') }}">Upcoming Holidays</a></li>
<li><a href="{{ url('/holiday/index', 'awaiting') }}">Awaiting Approval</a></li>
<li><a href="{{ url('/holiday/index', 'denied') }}">Denied Holidays</a></li>
<li><a href="{{ url('/holiday/index') }}">All Holidays</a></li>
</ul>
</nav>

</div> <!--.pageHead holiday-->


<div class="views">

@foreach($holidays as $holiday)

<a href="/holiday/view/{{ $holiday->id }}" >
<div class="view @if($holiday->approved == 1) 
						unapproved 
					@elseif($holiday->approved == 2) 
						approved 
					@else 
						pending 
					@endif" >
					
	<b>Requested:</b> 
	{{ $holiday->hours_requested }} {{-- hour converter function --}}
	<br />

	<b>From:</b> 
	{{ $holiday->request_date_from->format('d/m/Y') }}
	<br />

	<b>To:</b> 
	{{ $holiday->request_date_to->format('d/m/Y') }}
	<br />
	
	@if($holiday->id == 1) 
	 	<img src="{{ asset('/images/icons/icons_1xsat.png') }}" />
	@elseif($holiday->id == 2)
		<img src="{{ asset('/images/icons/icons_2xsat.png') }}" />
	@endif
	
	@if($holiday->prebooked ==1)
		<img src="{{ asset('images/icons/pb-11.png') }}">
	@endif
</div>

<div class="view bg--error" >
	<img src="{{ asset('/images/icons/icons_1xsat.png') }}" />
</div>
</a>

@endforeach

</div>

@stop