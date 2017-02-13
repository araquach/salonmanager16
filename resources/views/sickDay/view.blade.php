@extends('layouts.main')

@section('head')

@include('layouts.partials.head')

@stop

@section('content')

<div class="detail sickDay">


<table class="detail-view @if($sickDay->approved == 1)
							unapproved
						@elseif($sickDay->approved == 2)
							approved
						@else
							pending
						@endif">
	<tr>
		<td><strong>Days Requested:</strong></td>
		<td>{!! calculateDays($sickDay->hours_requested) !!}</td>
	</tr>
	<tr>
		<td><strong>From:</strong></td>
		<td>{{ $sickDay->request_date_from->format('d/m/Y') }}</td>
	</tr>
	<tr>
		<td><strong>To:</strong></td>
		<td>{{ $sickDay->request_date_to->format('d/m/Y') }}</td>
	</tr>
	<tr>
		<td><strong>Approved?:</strong></td>
		<td>{{ $sickDay->approved ? 'Yes' : 'No' }}</td>
	</tr>
	<tr>
		<td>
			@if($sickDay->saturday == 0.5) 
		 	<img src="{{ asset('/images/icons/icons_halfxsat.png') }}" />
			@elseif($sickDay->saturday == 1)
				<img src="{{ asset('/images/icons/icons_1xsat.png') }}" />
			@elseif($sickDay->saturday == 1.5)
				<img src="{{ asset('/images/icons/icons_1andhalfxsat.png') }}" />
			@elseif($sickDay->saturday == 2)
				<img src="{{ asset('/images/icons/icons_2xsat.png') }}" />
			@endif
		</td>
		<td>
			@if($sickDay->prebooked ==1)
			<img src="{{ asset('images/icons/pb-11.png') }}">
			@endif
		</td>
	</tr>
</table>

{!! link_to('/sickDay/index', 'Back to sickDays overview') !!}

</div> <!-- detail sickDay  -->


@stop