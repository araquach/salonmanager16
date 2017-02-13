@extends('layouts.main')

@section('head')

@include('layouts.partials.head')

@stop

@section('content')

<div class="detail sickDay">


<table class="detail-view @if($sickDay->deducted == 1)
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
		<td>{{ $sickDay->sick_from->format('D d/m/Y') }}</td>
	</tr>
	<tr>
		<td><strong>To:</strong></td>
		<td>{{ $sickDay->sick_to->format('D d/m/Y') }}</td>
	</tr>
	<tr>
		<td><strong>Days:</strong></td>
		<td>{{ calculateDays($sickDay->sick_hours) }}</td>
	</tr>
	<tr>
		<td><strong>Description:</strong></td>
		<td>{{ $sickDay->descrition }}</td>
	</tr>
	<tr>
		<td><strong>Deducted:</strong></td>
		<td>{{ $sickDay->deducted ? 'Yes' : 'No' }}</td>
	</tr>
	
</table>

{!! link_to('/sickDay/index', 'Back to sickDays overview') !!}

</div> <!-- detail sickDay  -->


@stop