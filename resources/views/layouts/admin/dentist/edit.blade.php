@extends('layouts.admin.master')

@section('content')

	<div class="content-wrapper">
	    <div class="container-fluid" style="margin-top: 4%">

	  <div class="card mb-3">


        <div class="card-header">
        	 <i class="fa fa-table"></i> <b>Update Dentist</b>
        </div>	 
        <form method="patch" action=" {{ url('/update', ['id' => $alldata->id ]) }}">

        	{{csrf_field()}}
          
            <div class="form-group">
    	        <label><b>First Name</b></label>
    	        <input maxlength="30" class="form-control " value="{{ $alldata->first_name }}" name="firstname" type="text">
        	</div> 
        	<div class="form-group ">
    	        <label><b>Last Name</b></label>
    	        <input maxlength="30" class="form-control " value="{{ $alldata->last_name }}" name="lastname" " type="text">
    	       
        	</div> 
        	<div class="form-group ">
    	        <label><b>Email</b></label>
    	        <input maxlength="30" class="form-control " value="{{ $alldata->email }}" name="email"  type="Email">
    	        
        	</div> 
        	<div class="form-group ">
    	        <label><b>State</b></label>
    	        <input maxlength="30" class="form-control " value="{{ $alldata->state}}" name="state"  type="text">
        	</div> 
        	<div class="form-group ">
    	        <label><b>City</b></label>
    	        <input maxlength="30" class="form-control " value="{{ $alldata->city}}" name="city"  type="text">
        	</div> 
        	<div class="form-group ">
    	        <label><b>Zip</b></label>
    	        <input maxlength="30" class="form-control " value="{{ $alldata->zip }}" name="zip" type="text">
    	     
        	</div> 
        	<div class="form-group ">
    	        <label><b>Address</b></label>
    	        <input maxlength="30" class="form-control " value="{{ $alldata->address }}" name="address"  type="text">
        	</div> 
        	<div class="form-group ">
       	        <label><b>Status</b></label>
       	        <input type="checkbox" name="status" value="0">
        	</div> 

        	<div class="form-group ">
    	        <button type="submit" class="btn btn-primary  add-dentist-btn " name="submit">Save</button>
        	</div>

    	</form> 
      	</div>
      </div>

  </div>	


@endsection
