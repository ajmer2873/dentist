        <li class="nav-item dropdown"> 
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           
       
           @if(Auth::user()->unreadnotifications->count())
                 <span class="badge badge-pill badge-danger" >

                        {{Auth::user()->unreadnotifications->count()}} 
                 
                 </span>
            
            @endif  

            <i class="fa fa-fw fa-bell"></i>
       
          </a>
       
          <div  class="dropdown-menu" aria-labelledby="alertsDropdown" id="server">
       
            @foreach(Auth::user()->unreadnotifications()->limit(7)->get() as $notification)
             
              <a href="#"> 
                  
                         
                {{$notification->data['user'] ['title']}}

              </a>
           
            @endforeach
           
            @if(Auth::user()->unreadnotifications->count())
            
              <a href="{{url('/markasread')}}" class="btn btn-link">View All Notification</a>

            @endif
          
          </div>
           
        </li>


  <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>  -->
   <!-- <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script> -->
<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> -->
  <!-- <script type="text/javascript">
    
      if(typeof EventSource != 'undefined'){
        var notify = new EventSource('{!!url("/add_notify")!!}');
        notify.addEventListener("message", function(event){
          var count = event.data;
          if(count > !null){
            $('span').html(count);
          }
        });
      }

        // setInterval(function(){
        //   polling();
        // },5000);
        // function polling(){ 
        //   // var id = 123;
          
        //   $.ajax({
        //   url: '{!!url("/add_notify")!!}',
        //   type:'get',
        //     success: function(response) {
        //       // console.log(response)
        //       // if(response){
              
        //       //   $('#server').html(response);
        //       // }                                                  
        //     } 
          
        //   }); 
        // }     
 	</script>
    
   -->
 

