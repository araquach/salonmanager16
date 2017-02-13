@extends('layouts.main')

@section('content')

<script>
  $(function() {
    $( ".datepicker" ).each(function(){
    	$(this).datepicker();
    })
  });
</script>

<div class="form sickDay">

<form action="{{ action('sickDayController@handleUpdate') }}" method="post" role="form">

<input type="hidden" name="id" value="{{ $sickDay->id }}" />

<div>
<label for="staff_id">Staff Id</label>
<input type="text" name="staff_id" value="{{ $sickDay->staff_id }}" />
</div>

<div>
<label for="hours_requested">Hours Requested</label>
<input type="text" name="hours_requested" value="{{ $sickDay->hours_requested }}"/>
</div>

<div>
<label for="request_date_from">Request Date From</label>
<input type="text" name="request_date_from" class="datepicker" value="{{ $sickDay->request_date_from }}" />
</div>

<div>
<label for="request_date_to">Request Date to</label>
<input type="text" name="request_date_to" class="datepicker" value="{{ $sickDay->request_date_to }}" />
</div>


<input type="submit"  value="Save" />
<a href="{{ action('sickDayController@showIndex') }}">Cancel</a>
</form>


</div> <!--.form sickDay-->

@stop