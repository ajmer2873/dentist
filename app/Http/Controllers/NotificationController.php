<?php

namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Http\Requests;
    use App\Http\Controllers\Controller;
    use App\Order;
    use App\User;
    // use Symfony\Component\HttpFoundation\StreamedResponse;

    class NotificationController extends Controller{ 
    	
        // public function notification(){
    	    
        //     $response = new StreamedResponse(); 
        //     $response->headers->set('Content-Type', 'text/event-stream');
        //     $response->headers->set('Cache-Control', 'no-cache');
        //     $response->setCallback(                    
        //         function(){
        //             echo "retry: 100\n\n";// no retry would default to 3 seconds.
        //             echo "data: Hello There\n\n";
        //             ob_flush();
        //             flush();
        //         });
        //     $response->send();
        // }
    }
