@extends('layouts.main')

@section('head')

@include('layouts.partials.head')

@stop

@section('content')

<div class="detail freeTime">


<table class="detail-view @if($freeTime->approved == 1)
							unapproved
						@elseif($freeTime->approved == 2)
							approved
						@else
							pending
						@endif">
	<tr>
		<td><strong>Days Requested:</strong></td>
		<td>{!! calculateDays($freeTime->hours_requested) !!}</td>
	</tr>
	<tr>
		<td><strong>From:</strong></td>
		<td>{{ $freeTime->request_date_from->format('d/m/Y') }}</td>
	</tr>
	<tr>
		<td><strong>To:</strong></td>
		<td>{{ $freeTime->request_date_to->format('d/m/Y') }}</td>
	</tr>
	<tr>
		<td><strong>Approved?:</strong></td>
		<td>{{ $freeTime->approved ? 'Yes' : 'No' }}</td>
	</tr>
	<tr>
		<td>
			@if($freeTime->saturday == 0.5) 
		 	<img src="{{ asset('/images/icons/icons_halfxsat.png') }}" />
			@elseif($freeTime->saturday == 1)
				<img src="{{ asset('/images/icons/icons_1xsat.png') }}" />
			@elseif($freeTime->saturday == 1.5)
				<img src="{{ asset('/images/icons/icons_1andhalfxsat.png') }}" />
			@elseif($freeTime->saturday == 2)
				<img src="{{ asset('/images/icons/icons_2xsat.png') }}" />
			@endif
		</td>
		<td>
			@if($freeTime->prebooked ==1)
			<img src="{{ asset('images/icons/pb-11.png') }}">
			@endif
		</td>
	</tr>
</table>

{!! link_to('/freeTime/index', 'Back to freeTimes overview') !!}

</div> <!-- detail freeTime  -->


@stop