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
		<td><strong>Staff:</strong></td>
		<td>{{ $sickDay->staff->first_name }} {{ $sickDay->staff->second_name }}</td>
	</tr>
	<tr>
		<td><strong>Days Requested:</strong></td>
		<td>{{ calculateDays($sickDay->hours_requested) }}</td>
	</tr>
	<tr>
		<td><strong>Prebooked:</strong></td>
		<td>{{ $sickDay->prebooked ? 'Yes' : 'No'}}</td>
	</tr>
	<tr>
		<td><strong>From:</strong></td>
		<td>{{ $sickDay->request_date_from->format('D d/m/Y') }}</td>
	</tr>
	<tr>
		<td><strong>To:</strong></td>
		<td>{{ $sickDay->request_date_to->format('D d/m/Y') }}</td>
	</tr>
	<tr>
		<td><strong>Approved:</strong></td>
		<td>{{ $sickDay->approved ? 'Yes' : 'No'}}</td>
	</tr>
	<tr>
		<td><strong>Saturday:</strong></td>
		<td>{{ $sickDay->saturday}}</td>
	</tr>
	<tr>
		<td><strong>Request Date:</strong></td>
		<td>{{ $sickDay->created_at->format('d/m/Y') }}</td>
	</tr>
</table>

<div class="form sickDay">
	
@if(Session::has('message'))
    <div>
    {{{ Session::get('message') }}}
    </div>
@endif

{!! Form::open(array(
	'action' => 'sickDayController@update'
)) !!}
	
	<p>
    	{!! Form::label('approved', 'Approve') !!}
    	{!! Form::checkBox('approved', old('request_date_from')) !!}
    	{!! $errors->first('approved', '<div class="errorMessage">:message</div>') !!}
	</p>
	
	<p>
	    {!! Form::submit('Send') !!}
	</p>
	
	<a href="{{ action('sickDayController@adminIndex') }}">cancel</a>

{{ Form::close() }}


</div>

{!! link_to('admin/sickDay/index', 'Back to sickDays overview') !!}

</div> <!-- detail sickDay  -->

@stop