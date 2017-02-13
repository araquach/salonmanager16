@extends('layouts.main')

@section('head')

@include('layouts.partials.head')

@stop

@section('content')

<div class="detail lieu">

<table class="detail-view @if($lieuHour->approved == 1)
							unapproved
						@elseif($lieuHour->approved == 2)
							approved
						@else
							pending
						@endif">
	<tr>
		<td><strong>Staff:</strong></td>
		<td>{{ $lieuHour->staff->first_name }} {{ $lieuHour->staff->second_name }}</td>
	</tr>
	<tr>
		<td><strong>Days Requested:</strong></td>
		<td>{{ calculateDays($lieuHour->hours_requested) }}</td>
	</tr>
	<tr>
		<td><strong>Prebooked:</strong></td>
		<td>{{ $lieuHour->prebooked ? 'Yes' : 'No'}}</td>
	</tr>
	<tr>
		<td><strong>From:</strong></td>
		<td>{{ $lieuHour->request_date_from->format('D d/m/Y') }}</td>
	</tr>
	<tr>
		<td><strong>To:</strong></td>
		<td>{{ $lieuHour->request_date_to->format('D d/m/Y') }}</td>
	</tr>
	<tr>
		<td><strong>Approved:</strong></td>
		<td>{{ $lieuHour->approved ? 'Yes' : 'No'}}</td>
	</tr>
	<tr>
		<td><strong>Saturday:</strong></td>
		<td>{{ $lieuHour->saturday}}</td>
	</tr>
	<tr>
		<td><strong>Request Date:</strong></td>
		<td>{{ $lieuHour->created_at->format('d/m/Y') }}</td>
	</tr>
</table>

<div class="form lieuHour">
	
@if(Session::has('message'))
    <div>
    {{{ Session::get('message') }}}
    </div>
@endif

{!! Form::open(array(
	'action' => 'lieuHourController@update'
)) !!}
	
	<p>
    	{!! Form::label('approved', 'Approve') !!}
    	{!! Form::checkBox('approved', old('request_date_from')) !!}
    	{!! $errors->first('approved', '<div class="errorMessage">:message</div>') !!}
	</p>
	
	<p>
	    {!! Form::submit('Send') !!}
	</p>
	
	<a href="{{ action('lieuHourController@adminIndex') }}">cancel</a>

{{ Form::close() }}


</div>

{!! link_to('admin/lieuHour/index', 'Back to lieuHours overview') !!}

</div> <!-- detail lieuHour  -->

@stop