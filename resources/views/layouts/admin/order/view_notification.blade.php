@extends('layouts.admin.master')
@section('content')
	<div class="content-wrapper">
        <div class="container-fluid" style="margin-top: 4%">
            <!-- Example DataTables Card -->
            <div class="card mb-3">
                <div class="card-header">

                    <i class="fa fa-table"></i> <b> Orders List</b>
                
                </div>
            </div>
        </div>
    </div>               
    <div class="card-body"> 
        <div class="table-responsive"> 
            <!-- @if(session()->has('flash_message'))
                                <div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ session()->get('flash_message') }}
                                </div>
            @endif -->
        </div>
        </div><br>        
        <table class="table table-bordered"  width="100%" cellspacing="0">                  
            <thead>
                <tr> 
                  <th>@sortablelink('customer_name','Customer Name')</th>
                  <th>@sortablelink('order_date','Order Date')</th>
                  <th>@sortablelink('assigned_to','Assigned To')</th>
                  <th>@sortablelink('status','Status')</th>
                  <th>@sortablelink('prescription','Prescription')</th>
                  <th>Action</th>
                </tr>
            </thead>
            <tbody>
                    @foreach($notifications as $value)
                        <tr>
                            <td>{{$value->customer_name}}</td>
                            <td>{{$value->order_date}}</td>
                            <td>{{$value->assigned_to}}</td>
                            <td>{{$value->status}}</td>
                            <td>{{$value->prescription }}</td>
                            <td><a href="{{ url('/view_prescription',$value->id) }}" title="View Prescription"><i class="fa fa-eye"></i></a>
                            </td>
                        </tr>
                     @endforeach
          	</tbody>
        </table>
	</div>
</div>



@endsection