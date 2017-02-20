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
		<td><strong>Staff:</strong></td>
		<td>{{ $freeTime->staff->first_name }} {{ $freeTime->staff->second_name }}</td>
	</tr>
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
		<td><strong>Approved:</strong></td>
		<td>
			@if($freeTime->approved == 1)
				No
			@elseif($freeTime->approved == 2)
				Yes
			@else
				Waiting Approval
			@endif
		</td>
	</tr>
	<tr>
		<td><strong>Request Date:</strong></td>
		<td>{{ $freeTime->created_at->format('d/m/Y') }}</td>
	</tr>
</table>

<div class="form freeTime">
	
@if(Session::has('message'))
    <div>
    {{{ Session::get('message') }}}
    </div>
@endif

{!! Form::open(array(
	'action' => 'AdminFreeTimeController@authorise'
)) !!}
	
	<p>
    	{!! Form::label('approved', 'Approve') !!}
    	{!! Form::checkBox('approved', old('request_date_from')) !!}
    	{!! $errors->first('approved', '<div class="errorMessage">:message</div>') !!}
	</p>
	
	<p>
	    {!! Form::submit('Send') !!}
	</p>
	
	<a href="{{ action('AdminFreeTimeController@index') }}">cancel</a>

{{ Form::close() }}


</div>

<a href="{{ action('AdminFreeTimeController@index') }}">Back to Free Time menu</a>

</div> <!-- detail freeTime  -->

@stop