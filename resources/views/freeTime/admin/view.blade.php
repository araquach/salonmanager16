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
		<td><strong>Days Requested:</strong></td>
		<td>{{ calculateDays($freeTime->hours_requested) }}</td>
	</tr>
	<tr>
		<td><strong>Prebooked:</strong></td>
		<td>{{ $freeTime->prebooked ? 'Yes' : 'No'}}</td>
	</tr>
	<tr>
		<td><strong>From:</strong></td>
		<td>{{ $freeTime->request_date_from->format('D d/m/Y') }}</td>
	</tr>
	<tr>
		<td><strong>To:</strong></td>
		<td>{{ $freeTime->request_date_to->format('D d/m/Y') }}</td>
	</tr>
	<tr>
		<td><strong>Approved:</strong></td>
		<td>{{ $freeTime->approved ? 'Yes' : 'No'}}</td>
	</tr>
	<tr>
		<td><strong>Saturday:</strong></td>
		<td>{{ $freeTime->saturday}}</td>
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
	'action' => 'freeTimeController@update'
)) !!}
	
	<p>
    	{!! Form::label('approved', 'Approve') !!}
    	{!! Form::checkBox('approved', old('request_date_from')) !!}
    	{!! $errors->first('approved', '<div class="errorMessage">:message</div>') !!}
	</p>
	
	<p>
	    {!! Form::submit('Send') !!}
	</p>
	
	<a href="{{ action('freeTimeController@adminIndex') }}">cancel</a>

{{ Form::close() }}


</div>

{!! link_to('admin/freeTime/index', 'Back to freeTimes overview') !!}

</div> <!-- detail freeTime  -->

@stop