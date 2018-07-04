@extends('layouts.admin.master')

@section('content')

<div class="content-wrapper">
	
	<div class="container-fluid" style="margin-top: 12%">
		
		
		<form method="post" action="{{ url('/prescription', ['id' => $view->id ]) }}">

			{{ csrf_field() }}


			<div><h1>Prescription List</h1></div>
			
			<div class="form-group">
			<label>Prescription</label>
			<input type="text" name="prescription" value="{{$view->prescription}}" disabled>
			</div>
			
			<div class="form-group">
			<label>Signature</label>

			<img src="/dentist/image/{{$view->signature}}" name="signature" class="profile"/>
			</div>
      		
      		<a href="" onclick="myFunction()"><i class="fa fa-print">Print</i></a>

        </form>
        
		</div>
	</div>

		<script>
				function myFunction() {
				    window.print();
				}
		</script>
				

@endsection