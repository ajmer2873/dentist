@extends('layouts.admin.master')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid" style="margin-top: 4%">
     
          <!-- Example DataTables Card-->
          <div class="card mb-3">

            <div class="card-header">
            
              <i class="fa fa-table"></i> <b> Dentist List</b>
              <a href="{{ url('/add') }}" class="btn btn-primary add-client-btn add-topic-btn">+ Add Dentists </a>
               @if(session()->has('flash_message'))
                          <div class="alert alert-success">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          {{ session()->get('flash_message') }}
                          </div>
                @endif
            </div>
                <!-- <div class="form-group">
                    <label> <a href=" {{ url('/login') }}" data-toggle="modal" data-target="#add-dentist" class="btn btn-primary add-client-btn add-topic-btn">+ Add Dentists </a></label>
               </div> -->
            </div>   
            
            <div class="card-body"> 
               <div class="table-responsive">      
                  <li class="nav-item">
                      <div class="form-inline my-2 my-lg-0 mr-lg-2">
                          <form method="get" action="{{url('/add_dentist')}}">
                            {{csrf_field()}}
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
                  </li></br>
                     
                <table class="table table-bordered"  width="100%" cellspacing="0">
                  
                  <thead>
                    <tr>
                      <th>@sortablelink('id','User ID')</th>
                      <th>@sortablelink('first_name','First Name')</th>
                      <th>@sortablelink('last_name','Last Name')</th>
                      <th>@sortablelink('email','Email')</th>
                      <th>@sortablelink('state','State')</th>
                      <th>@sortablelink('city','City')</th>
                      <th>@sortablelink('zip','Zip')</th>
                      <th>@sortablelink('address','Address')</th>
                      <th>@sortablelink('status','Status')</th>
                      <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    @if($users->count())
                      @foreach($users as $value)
                        <tr>
                          <td>{{$value->id}}</td>
                          <td>{{$value->first_name}}</td>
                          <td>{{$value->last_name}}</td>
                          <td>{{$value->email}}</td>
                          <td>{{$value->state}}</td>
                          <td>{{$value->city}}</td>
                          <td>{{$value->zip}}</td>
                          <td>{{$value->address}}</td>
                          <td>{{$value->status}}</td>
                          <td><a href="{{ url('/edit',$value->id) }}" title="Edit Dentist"><i class="fa fa-edit"></i></a>
                              <a href="{{url('/destroy',$value->id) }}" title="Delete Dentist"><i class="fa fa-trash-o"></i></a>
                          </td>
                        </tr>
                      @endforeach
                    @endif 
                  </tbody>                 
                </table>
                {{ $users->appends(\Request::except('page'))->render() }}
                  
              </div>
            </div>
              <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>
        </div> 
      </div> 



@endsection    