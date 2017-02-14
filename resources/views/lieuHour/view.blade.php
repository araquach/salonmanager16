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
		<td>{!! $lieuHour->lieu_hours !!}</td>
	</tr>
	<tr>
		<td><strong>From:</strong></td>
		<td>{{ $lieuHour->date_regarding->format('D d/m/Y') }}</td>
	</tr>
	<tr>
		<td><strong>Description:</strong></td>
		<td>{{ $lieuHour->description }}</td>
	</tr>
	<tr>
		<td><strong>Approved:</strong></td>
		<td>
			@if($lieuHour->approved == 1)
			No
			@elseif($lieuHour->approved == 2)
			Yes
			@else
			Waiting Approval
			@endif
		</td>
			
	</tr>
</table>

{!! link_to('lieu/index', 'Back to Lieu Hours overview') !!}

</div> <!-- detail lieuHour  -->


@stop