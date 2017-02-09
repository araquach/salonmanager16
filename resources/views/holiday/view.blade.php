@extends('layouts.main')

@section('head')

@include('layouts.partials.head')

@stop

@section('content')

<div class="detail holiday">


<table class="detail-view @if($holiday->approved == 1)
							unapproved
						@elseif($holiday->approved == 2)
							approved
						@else
							pending
						@endif">
	<tr>
		<td><strong>Days Requested:</strong></td>
		<td>{!! calculateDays($holiday->hours_requested) !!}</td>
	</tr>
	<tr>
		<td><strong>From:</strong></td>
		<td>{{ $holiday->request_date_from->format('d/m/Y') }}</td>
	</tr>
	<tr>
		<td><strong>To:</strong></td>
		<td>{{ $holiday->request_date_to->format('d/m/Y') }}</td>
	</tr>
	<tr>
		<td><strong>Approved?:</strong></td>
		<td>{{ $holiday->approved ? 'Yes' : 'No' }}</td>
	</tr>
	<tr>
		<td>
			@if($holiday->id == 1) 
		 	<img src="{{ asset('/images/icons/icons_1xsat.png') }}" />
			@elseif($holiday->id == 2)
			<img src="{{ asset('/images/icons/icons_2xsat.png') }}" />
			@endif
		</td>
		<td>
			@if($holiday->prebooked ==1)
			<img src="{{ asset('images/icons/pb-11.png') }}">
			@endif
		</td>
	</tr>
</table>

{!! link_to('/holiday/index', 'Back to Holidays overview') !!}

</div> <!-- detail holiday  -->


@stop