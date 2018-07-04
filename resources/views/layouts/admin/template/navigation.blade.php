<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Admin</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="{{ url('/add_dentist') }}">
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">Manage Dentists</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="{{ url('/order_list') }}">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Manage Orders</span>
          </a>
        </li>       
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="d-lg-none">Messages
              <span class="badge badge-pill badge-primary">12 New</span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">New Messages:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>David Miller</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>Jane Smith</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!   
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>John Doe</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all messages</a>
          </div>

        </li>
        <li class="nav-item dropdown"> 
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">             
              <span class="badge badge-pill badge-danger" id="server">
             
                
              </span>
        
                <i class="fa fa-fw fa-bell"></i>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <span id="server"></span>

            <!-- <a href="#"> <span id="data">Null</span> </a> -->
            @foreach($notification as $value)
    
              <table class="table table-bordered"  width="100%" cellspacing="0">
                <tr>
                  <th>
                      
                      {{$value->name}}
               
                  </th>               
                </tr>
               
                <tr>                  
                  <td>

                    <a href="#">{{$value->message}}</a>
                 
                  </td>
                </tr>
                  
              </table>

            @endforeach
                          
          </div>
           
        </li>

 
        <li class="nav-item">
       
          <a class="nav-link" href="{{url('/admin_logout')}}"><i class="fa fa-fw fa-sign-out"></i>Logout</a>       
        
        </li>
      </ul>
  </div>
</nav>
        <!--  <li class="nav-item">
          <a class="nav-link" data-toggle="modal" href="{{url('/admin_logout')}}">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li> -->
 
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>  
  
  <script type="text/javascript">
    
      if(typeof EventSource != 'undefined'){

        var notify = new EventSource('{!!url("/notify")!!}');
        notify.addEventListener("message", function(event){
          // var notification=event.id
          // $('#server').html(count);
          
          var count = event.data;
        
          if(count > 0) {
        
            $('#server').html(count);
            
          }
      });
     
      }
       
    

    //   setInterval(function(){

    //     polling();
      
    //   },5000);
    //   function polling(){ 
    //     $.ajax({
        
    //     url: '{!!url("/notify")!!}',
        
    //     type:'get',
    //       success: function(event) {
    //         // console.log(response)
    //       //   if(event){
            
    //       //   $('#data').html(event);
    //       //   }                                                  
    //        } 
        
    //     }); 
    // }      
  </script>
    
