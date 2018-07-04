<?php

namespace App\Http\Controllers\Dentist;

use App\Order;
use App\User;
use App\DataNotification;
use Auth;
use Session;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;

class DentistController extends Controller
{
    
    public function dentist_dash()
    {
    	return view('layouts.dentist.master');
    }
    
    public function list (Request $request){    
        $uid = Auth::user()->id;    
        $keyword = $request->get('search');
        $perPage = 4;
        if (!empty($keyword)){
            $orders = Order::Wherein('status',array('0','1'))
            ->orWhere('assigned_to', 'LIKE', "%$keyword%")
            ->sortable() 
            ->paginate($perPage);
        }else{
            $orders = Order::Wherein('status',array('0','1'))->where('assigned_to','=', $uid)->sortable()->paginate($perPage);
        }  
        return view('layouts.dentist.order_list', compact('orders'));
    }

    
    public function add_prescription(){

    	return view('layouts.dentist.add_prescription');
   
    }

    
    
    public function prescription(Request $request,$id){
                      
        $result = array();
        $imagedata = base64_decode($request->input('signature'));
        $filename = md5(date("dmYhisA"));
        //Location to where you want to created sign image
        $path = public_path().'/dentist/image/'.$filename.'.png';
        file_put_contents($path,$imagedata); 
        $order=Order::find($id);
        $order->prescription = $request->input("prescription");        
        $order->status='1';
        $order->signature=$filename.'.png';
        $order->save();
        
        $uid =Auth::user()->first_name.' '.Auth::user()->last_name;
        $Notification = new DataNotification;
        $Notification->name = $uid;
        $Notification->message ='Add Prescription'; 
        $Notification->order_id = $order->id;
        $Notification->save();
        return redirect('/list');      
   
    }

    public function add_pre($id)
    {
        $all = Order::find($id);
        
        return view('layouts.dentist.add_prescription')->with(['data'=>$all]);
    }

    public function count(Request $request)
    {
        header('Content-Type: text/event-stream');
        header('Cache-Control: no-cache');

        $count = DataNotification::all()->where('is_read','=','1')->count();        
        
        $notification =DataNotification::all()->where('is_read','=','1');

        // $notification =DB::table('data_notifications')->pluck('id');

        // echo "<pre>";
        
        // print_r($notification);
        
        // die('ok');
        
        echo "data:".$count."\n\n";

        echo "id:".$notification."\n\n";
        
        flush();
    }


    public function view_notification(Request $request,$id){
        
        $notify =$id;

        $data = Order::find($notify)->DataNotification()->where($id,'=','order_id')->get();

        echo "<pre>";

        print_r($data);
        
        die('hello');
    }


    public function AddNotifications()
    {
        $notification = DataNotification::all()->where('is_read','=',1);
        // echo "<pre>";
        // print_r($notification->toArray());
        // die('ok');

        return view('layouts.admin.master', compact('notification'));

    }

    public function logout(){

        return view('layouts.dentist.logout');

    }

    public function logout_user_to_login(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }

}
