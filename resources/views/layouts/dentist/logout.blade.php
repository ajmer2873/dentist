@extends('layouts.dentist.master')

@section('content')

<div class="form">
	<form method="post" action="{{ URL::asset('/logout') }}">
	{{ csrf_field() }}
	<div class="overlay2 class1">
	  <div class="modal-dialog modal-sm">
	    <div class="modal-content">
	      <div class="modal-header"><h4>Logout <i class="fa fa-lock"></i></h4></div>
	      <div class="modal-body"><i class="fa fa-question-circle"></i> Are you sure you want to log-off?</div>
	      <div class="modal-footer"><button class="btn btn-primary btn-block">Logout</button></div>
	    </div>
	  </div>
	</div>
	</form>	
</div>
@endsection