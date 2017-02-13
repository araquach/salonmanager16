@extends('layouts.main')

@section('head')

@include('layouts.partials.head')

@stop

@section('content')

<div class="detail lieuHour">


<table class="detail-view @if($lieuHour->approved == 1)
							unapproved
						@elseif($lieuHour->approved == 2)
							approved
						@else
							pending
						@endif">
	<tr>
		<td><strong>Days Requested:</strong></td>
		<td>{!! calculateDays($lieuHour->hours_requested) !!}</td>
	</tr>
	<tr>
		<td><strong>From:</strong></td>
		<td>{{ $lieuHour->request_date_from->format('d/m/Y') }}</td>
	</tr>
	<tr>
		<td><strong>To:</strong></td>
		<td>{{ $lieuHour->request_date_to->format('d/m/Y') }}</td>
	</tr>
	<tr>
		<td><strong>Approved?:</strong></td>
		<td>{{ $lieuHour->approved ? 'Yes' : 'No' }}</td>
	</tr>
	<tr>
		<td>
			@if($lieuHour->saturday == 0.5) 
		 	<img src="{{ asset('/images/icons/icons_halfxsat.png') }}" />
			@elseif($lieuHour->saturday == 1)
				<img src="{{ asset('/images/icons/icons_1xsat.png') }}" />
			@elseif($lieuHour->saturday == 1.5)
				<img src="{{ asset('/images/icons/icons_1andhalfxsat.png') }}" />
			@elseif($lieuHour->saturday == 2)
				<img src="{{ asset('/images/icons/icons_2xsat.png') }}" />
			@endif
		</td>
		<td>
			@if($lieuHour->prebooked ==1)
			<img src="{{ asset('images/icons/pb-11.png') }}">
			@endif
		</td>
	</tr>
</table>

{!! link_to('/lieuHour/index', 'Back to lieuHours overview') !!}

</div> <!-- detail lieuHour  -->


@stop