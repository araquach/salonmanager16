@extends('layouts.main')

@section('head')

@include('layouts.partials.head')

@stop

@section('content')

<div id="holidayPage">

<div class="pageHead holiday">

<nav>
<ul>
<li><a href="{{ url('/holiday/create', 'upcoming') }}">Book holiday</a></li>
<li><a href="{{ url('/holiday/index', 'upcoming') }}">Upcoming Holidays</a></li>
<li><a href="{{ url('/holiday/index', 'awaiting') }}">Awaiting Approval</a></li>
<li><a href="{{ url('/holiday/index', 'denied') }}">Denied Holidays</a></li>
<li><a href="{{ url('/holiday/index') }}">All Holidays</a></li>
</ul>
</nav>

@include('widgets.holiday')

</div> <!--.pageHead holiday-->

{{-- @foreach($holidays as $holiday) --}}

<div class="{{-- view @if($holiday->approved == 1) 
						unapproved 
					@elseif($holiday->approved == 2) 
						approved 
					@else 
						pending 
					@endif --}}" >
					
	
	{{-- <a href="{{ action('HolidayController@showView', $holiday->id) }}"></a> --}}
	<b>Requested:</b> 
	{{-- $holiday->hours_requested --}} {{-- hour converter function --}}
	<br />

	<b>From:</b> 
	{{-- $holiday->request_date_from->toFormattedDateString() --}}
	<br />

	<b>To:</b> 
	{{-- $holiday->request_date_to->toFormattedDateString() --}}
	<br />
	
	{{-- @if($holiday->id == 1) --}}
	 	<img src="{{ asset('/images/icons/icons_1xsat.png') }}" />
	{{-- @elseif($holiday->id == 2) --}}
		<img src="{{ asset('/images/icons/icons_2xsat.png') }}" />
	{{-- @endif --}}
	
	{{-- @if($holiday->prebooked ==1) --}}
		<img src="{{ asset('images/icons/pb-11.png') }}">
	{{-- @endif --}}
</div>

{{-- @endforeach --}}

</div> <!--holidayPage-->

@stop