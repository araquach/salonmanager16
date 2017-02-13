@extends('layouts.main')

@section('content')


<div class="form freeTime">

<form action="{{ action('freeTimeController@handleUpdate') }}" method="post" role="form">

<input type="hidden" name="id" value="{{ $freeTime->id }}" />

<div>
<label for="staff_id">Staff Id</label>
<input type="text" name="staff_id" value="{{ $freeTime->staff_id }}" />
</div>

<div>
<label for="hours_requested">Hours Requested</label>
<input type="text" name="hours_requested" value="{{ $freeTime->hours_requested }}"/>
</div>

<div>
<label for="prebooked">
	<input type="checkbox" name="prebooked" {{ $freeTime->prebooked ? checked : '' }}" />Prebooked?
</label>
</div>

<div>
<label for="request_date_from">Request Date From</label>
<input type="text" name="request_date_from" value="{{ $freeTime->request_date_from }}" />
</div>

<div>
<label for="request_date_to">Request Date to</label>
<input type="text" name="request_date_to" value="{{ $freeTime->request_date_to }}" />
</div>

<div>
<label for="approved">
	<input type="checkbox" name="approved" {{ $freeTime->approved ? checked : '' }}/>Approved? 
</label>
</div>

<div>
<label for="requested_on_date">Requested on date</label>
<input type="text" name="requested_on_date" value="{{ $freeTime->requested_on_date }}" />
</div>


<input type="submit"  value="Save" />
<a href="{{ action('freeTimeController@showIndex') }}">Cancel</a>
</form>


</div> <!--.form freeTime-->

@stop