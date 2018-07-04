@extends('layouts.dentist.master')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid" style="margin-top: 4%">
     
          <!-- Example DataTables Card-->
          <div class="card mb-3">

            <div class="card-header">
            
              <i class="fa fa-table"></i> <b> Orders List</b>
              
            </div>
            
            <div class="card-body"> 
                <div class="table-responsive"> 
                
                    <table class="table table-bordered"  width="100%" cellspacing="0">                  
                        <thead>
                            <tr> 
                              <th>@sortablelink('customer_name','Customer Name')</th>
                              <th>@sortablelink('order_date','Order Date')</th>
                              <th>@sortablelink('status','Status')</th>
                              <th>@sortablelink('prescription','Prescription')</th>
                              <th>Add Prescription</th>
                            </tr>
                        </thead>
                    <tbody>
                        @foreach($orders as $value)
                            <tr>
                                <td>{{$value->customer_name}}</td>
                                <td>{{$value->order_date}}</td>
                                <td>{{$value->status}}</td>
                                <td>{{$value->prescription }}</td>
                                <td><a href="{{ url('/add_prescription',$value->id) }}" title="             AddPrescription"><i class="fa fa-plus"></i>
                                    </a>
                                    <a href=" " style="color:red">
                                        <?php  
                                            if($value->status =='1' && !empty($value->prescription) && !empty($value->signature)){
                                                echo ' <i class="fa fa-check" title="Complete"> </i>';
                                            }else{
                                                echo '<i class="fa fa-remove" title="Not Complete"></i>'
                                                ;
                                            }
                                        ?>
                                    </a> 
                                </td>                              
                            </tr>
                        @endforeach 
                    </tbody>
                  
                </table>
                {{$orders->appends(\Request::except('page'))->render() }}
                  
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>

        </div> 
    </div> 
    
@endsection    