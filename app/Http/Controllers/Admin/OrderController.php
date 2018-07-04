<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\User;
use App\DataNotification;
use Auth;
use DB;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    // public function create (Request $request){

    // 	Order::create([
    //  'order_id'=> '1',    
    //  'customer_name' =>'Atul Sharm',
    // 	'order_date' => '2018-05-15',	
    // 	// 'assigned_to'=>'2',
    // 	'status' => '0',                   
    // 	'prescription' => ' '

    //     ]);
    // }
  
    public function index(Request $request)
    {   
        $notification = DataNotification::all()->where('is_read','=',1);
        // echo "<pre>";
        // print_r($notification->toArray());
        // die('ok');
        $uid=Auth::user()->id;
        $user=User::Where('id','!=',$uid)->get();
        $keyword = $request->get('search');
        $perPage = 5;
        if (!empty($keyword)){
            $orders = Order::Where('assigned_to', 'LIKE', "%$keyword%")
            ->sortable() 
            ->paginate($perPage);
        }else {

            $orders = Order::sortable()->paginate($perPage);
        
        }
            return view('layouts.admin.order.add_order', compact('orders','user','notification'));
    }


    public function view(Request $request,$id){

        $notification = DataNotification::all()->where('is_read','=',1);

        $view = Order::find($id);
        
            return view('layouts.admin.order.view_prescription',compact('view','notification'));

    }    

    public function view_prescription(Request $request,$id){

        $data=User::find($id);
        $data->prescription =$request->get("prescription");
        $data->signature =$request->get("signature");
        
        return redirect('/order_list');
    }

    public function update(Request $request,$id){

        $Order = Order::find($id);

        $Order->assigned_to = $request->input('assigned_to');

        $Order->save();   

    }


    // public function notification_list()
    // {

    //   $notifications= DB::table('notifications')->get();

    //   echo"<pre>";

    //   print_r($notifications);
    //   die('ok');
    // return view('layouts.admin.order.view_notification' , compact("notifications"));

    // }



}



