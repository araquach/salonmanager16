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
		<td><strong>Hours Requested:</strong></td>
		<td>{!! $freeTime->free_time_hours !!}</td>
	</tr>
	<tr>
		<td><strong>From:</strong></td>
		<td>{{ $freeTime->date_regarding->format('d/m/Y') }}</td>
	</tr>
	<tr>
		<td><strong>To:</strong></td>
		<td>{{ $freeTime->description }}</td>
	</tr>
	<tr>
		<td><strong>Approved?:</strong></td>
		<td>{{ $freeTime->approved ? 'Yes' : 'No' }}</td>
	</tr>
</table>

{!! link_to('/freeTime/index', 'Back to freeTimes overview') !!}

</div> <!-- detail freeTime  -->


@stop