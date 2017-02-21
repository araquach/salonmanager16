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
			<td><strong>Date requested:</strong></td>
			<td>{{ $lieuHour->date_regarding->format('D d/m/Y') }}</td>
		</tr>
		<tr>
			<td><strong>Hours Requested:</strong></td>
			<td>{!! $lieuHour->lieu_hours !!}</td>
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
	
	<a href="{{ action('AdminLieuHourController@edit', $lieuHour) }}">Edit the information</a>
	
	<div class="form lieuHour">
		
		@if(Session::has('message'))
		    <div>
		    	{{{ Session::get('message') }}}
		    </div>
		@endif
		
		{!! Form::model($lieuHour, [
			'method' => 'PATCH', 
			'action' => ['AdminLieuHourController@authorise', $lieuHour->id]
		]) !!}
			
			<div class="row question">
				<p>
					{!! Form::label('approved', 'Approval:') !!}
			    	<p class="scale_label">Approved</p>
			    	{!! Form::radio('approved', '2') !!}
			    	<p class="scale_label">Denied</p>
			    	{!! Form::radio('approved', '1') !!}
			        <p class="scale_label">Pending</p>
			        {!! Form::radio('approved', '0') !!}
			        
			    	{!! $errors->first('approved', '<div class="errorMessage">:message</div>') !!}
				</p>
			</div>
			
			<p>
			    {!! Form::submit('Send') !!}
			</p>
			
			<a href="{{ action('AdminLieuHourController@index') }}">cancel</a>
		
		{{ Form::close() }}
	
	</div>

</div> <!-- detail lieuHour  -->

@stop