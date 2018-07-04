@extends('layouts.admin.master')

@section('content')

	<div class="content-wrapper">
	    <div class="container-fluid" style="margin-top: 4%">

	  <div class="card mb-3">


        <div class="card-header">
        	 <i class="fa fa-table"></i> <b>Add Dentist</b>
        </div>	 
        <form method="post" action="{{url ('/add_dentist')}}">
        	{{csrf_field()}}
        <div class="form-group">
	        <label><b>First Name</b></label>
	        <input maxlength="30" class="form-control " value="{{old('firstname')}}" name="firstname" placeholder=" Enter First Name" type="text">
	         <span class="text-danger">
	              {{$errors->first('firstname')}}
	         </span>
    	</div> 
    	<div class="form-group ">
	        <label><b>Last Name</b></label>
	        <input maxlength="30" class="form-control " value="{{old('lastname')}}" name="lastname" placeholder="Enter Last Name" type="text">
	        <span class="text-danger">
                  {{$errors->first('lastname')}}
            </span>
	       <!--  {!! $errors->first('firstname', '<p class="help-block">:message</p>') !!} -->
    	</div> 
    	<div class="form-group ">
	        <label><b>Email</b></label>
	        <input maxlength="30" class="form-control " value="{{old('email')}}" name="email" placeholder="Email" type="Email">
	        <span class="text-danger">
                  {{$errors->first('email')}}
            </span>
	       <!--  {!! $errors->first('firstname', '<p class="help-block">:message</p>') !!} -->
    	</div> 
    	<div class="form-group ">
	        <label><b>Password</b></label>
	        <input maxlength="30" class="form-control " value="{{old('password')}}" name="password" placeholder="Password" type="password">
	        <span class="text-danger">
                  {{$errors->first('password')}}
            </span>
	       <!--  {!! $errors->first('firstname', '<p class="help-block">:message</p>') !!} -->
    	</div> 
    	<div class="form-group ">
	        <label><b>State</b></label>
	        <input maxlength="30" class="form-control " value="{{old('state')}}" name="state" placeholder="Enter State" type="text">
	        <span class="text-danger">
                  {{$errors->first('state')}}
            </span>
	       <!--  {!! $errors->first('firstname', '<p class="help-block">:message</p>') !!} -->
    	</div> 
    	<div class="form-group ">
	        <label><b>City</b></label>
	        <input maxlength="30" class="form-control " value="{{old('city')}}" name="city" placeholder="Enter City" type="text">
	        <span class="text-danger">
                  {{$errors->first('city')}}
            </span>
	       <!--  {!! $errors->first('firstname', '<p class="help-block">:message</p>') !!} -->
    	</div> 
    	<div class="form-group ">
	        <label><b>Zip</b></label>
	        <input maxlength="30" class="form-control " value="{{old('zip')}}" name="zip" placeholder="Enter Zip" type="text">
	        <span class="text-danger">
                  {{$errors->first('zip')}}
            </span>
	       <!--  {!! $errors->first('firstname', '<p class="help-block">:message</p>') !!} -->
    	</div> 
    	<div class="form-group ">
	        <label><b>Address</b></label>
	        <input maxlength="30" class="form-control " value="{{old('address')}}" name="address" placeholder="Enter Address" type="text">
	        <span class="text-danger">
                  {{$errors->first('address')}}
            </span>
	       <!--  {!! $errors->first('firstname', '<p class="help-block">:message</p>') !!} -->
    	</div> 
    	<div class="form-group ">
   	        <label><b>Status</b></label>
   	        <input type="checkbox" name="status" value="1">
    	</div> 

    	<div class="form-group ">
	        <button type="submit" class="btn btn-primary  add-dentist-btn " name="submit">Submit</button>
          
    	</div>

    	</form> 
	</div>
</div>

	    </div>
    </div>	


@endsection
