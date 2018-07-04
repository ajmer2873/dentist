@extends('layouts.admin.master')
@section('content')
    
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}">   -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script> -->
    <!-- <script src="{{URL::asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script> -->
     
   
     
    <div class="content-wrapper">
        <div class="container-fluid" style="margin-top: 4%">
            <!-- Example DataTables Card -->
            <div class="card mb-3">
                <div class="card-header">

                    <i class="fa fa-table"></i> <b> Orders List</b>
                
                </div>
            </div>   
       
            <div class="card-body"> 
                <div class="table-responsive"> 
                    @if(session()->has('flash_message'))
                                        <div class="alert alert-success">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        {{ session()->get('flash_message') }}
                                        </div>
                    @endif
                    <li class="nav-item">
                        <div class="form-inline my-2 my-lg-0 mr-lg-2">
                            <form method="get" action="{{url('/order_list')}}" >
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="Search for..." name="search" value="{{ request('search') }}">
                                    <span class="input-group-append">
                                        <button class="btn btn-primary" type="submit" name="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </li> 
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
                          <th>Assigned To Dentist</th>
                        </tr>
                    </thead>
                        <tbody>
                            @if($orders->count())
                                @foreach($orders as $value)
                                    <tr>
                                        <td>{{$value->customer_name}}</td>
                                        <td>{{$value->order_date}}</td>
                                        <td>{{$value->assigned_to}}</td>
                                        <td>{{$value->status}}</td>
                                        <td>{{$value->prescription }}</td>
                                        <td><a href="{{ url('/view_prescription',$value->id) }}" title="View Prescription"><i class="fa fa-eye"></i></a>
                                        </td>
                                        <td>
                                            <!-- <form method="post" action=" ">
                                                {{csrf_field()}}-->
                                            <select class="form-control"  title="Assigned Dentist" name="assigned_to" data="{{$value->id}}">
                                                <option value="" disable="true" >Select Dentist</option>
                                                @if(@$user)
                                                @foreach($user as $data)
                                                    <?php
                                                         $selectedUser='';
                                                    if($data->id==@$value->assigned_to){
                                                        $selectedUser='selected="selected"';
                                                    } ?>
                                                        <option <?php echo $selectedUser; ?>value="{{$data->id}}">  
                                                            {{ucfirst($data->first_name)}} {{$data->last_name}}
                                                        </option> 
                                                @endforeach 
                                                @endif      
                                            </select>
                                            <!-- </form>     -->
                                        </td>
                                    </tr>
                                @endforeach
                            @endif 
                        </tbody>  
                </table>
                {{ $orders->appends(\Request::except('page'))->render() }}
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> 

            <script>
                $(document).ready(function(){
                    
                    $('select[name="assigned_to"]').on('change',function () {
                        var assigned_to =$(this).val();

                        var row_id = $(this).attr('data');                   

                        var data = {
                            "assigned_to": assigned_to,
                            "id": row_id,
                        };

                        $.ajax({                             
                            url: '/assigned/'+row_id,
                            data: data,
                            type: 'get',
                            success: function (response){
                                console.log('test1');
                                window.location.reload();
                            }
                        });
                    });
                });
            </script>
        </div> 
    </div>      
@endsection

