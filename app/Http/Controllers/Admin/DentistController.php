<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\DataNotification;
use Validator;
use Hash;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DentistController extends Controller
{

    // public function create (Request $request){

    // 	User::create([
    //     	'first_name'=>'ajmer',
    //     	'last_name' => 'singh',	
    //     	'email'=>'ajmer@gmail.com',
    //      'password'=>bcrypt('123456789'),
    //     	'role' => '1',
    //     	'state' =>'punjab',
    //     	'city' => 'mohali',
    //     	'zip' => 145885,
    //     	'address'=>'mohali'
    //     ]);
    // }

    public function dashboard()
    {
   
    	return view('layouts.admin.master');
   
    }


    public function login()
    {
   
    	return view('layouts.login');
   
    }

    public function add()
    {
        $notification = DataNotification::all()->where('is_read','=',1);   
    	
    	return view ('layouts.admin.dentist.form',compact('notification'));
    
    }
     
    public function show()
    {
   
    	return view('layouts.admin.dentist.add_dentist');
   
    }

	public function postlogin(Request $request)
	{

	    $message = ['required' => ':Attribute Field Is Empty*'];
		
		$validator = Validator::make($request->input(), [
			'email'=>'required|email',
			'password'=>'required|min:6|Regex:/\A(?!.*[:;]-\))[ -~]{3,20}\z/',
			],$message);
	  /* $validator->setAttributeNames($attributeNames);*/
		if ($validator->fails()) {
			return redirect('/login')
					->withErrors($validator)
					->withInput($request->input());
       	}
    	   
    	else{

		    $email = $request->input('email');
    		$password = $request->input('password');
    			if(Auth::attempt(['email' => $email, 'password' => $password ,  'role' => "1"]))
    			{
    				return redirect('/dashboard')->with($email);
    			}else{
        				if(Auth::attempt(['email' => $email, 'password' => $password , 'role' => "0"]))
        				{
        					return redirect('/dentist_dashboard')->with('flash_message', 'Dentist Login successfully!');
        				}
        			
        			else{
        				
                        $errors = ['password' => ['Email or password not match.']];
        				return redirect('/login')->withErrors($errors);
        			}
        				$errors = ['password' => ['Email or password not match.']];
        				return redirect('/login')->withErrors($errors);
                }
   		}
   	}	

   	public function store(Request $request)
	{
		$message = ['required' => ':Attribute field is empty*',
		'unique' => 'This Email address is alredy used',

		];
		
		$validator = Validator::make($request->input(), [
			'firstname'=>'required|string|regex:/^[a-zA-Z]/',
			'lastname'=>'required|string|regex:/^[a-zA-Z]/',
			'email'=>'required|email|unique:users,email',
			'password'=>'required|min:9|Regex:/\A(?!.*[:;]-\))[ -~]{3,20}\z/',
			'state'=>'required',
			'city'=>'required',
			'zip'=>'required',
			'address'=>'required',
		],$message);
	  /* $validator->setAttributeNames($attributeNames);*/
		if ($validator->fails()) {
			return redirect('/add')
						->withErrors($validator)
						->withInput($request->input());
		}else{
			
			$user = new User;
			$user->first_name = Input::get("firstname");
			$user->last_name = Input::get("lastname");
			$user->email = Input::get("email");
			$user->password = Hash::make (Input::get("password"));
			$user->state = Input::get("state");
			$user->city = Input::get("city");
			$user->zip = Input::get("zip");
			$user->address = Input::get("address");			
			$user->save();	
			  
			return redirect('/add_dentist')->with('flash_message', 'Dentist Add successfully!'); 
		}

    }


    public function search(Request $request)
    {    
        $notification = DataNotification::all()->where('is_read','=',1);   
        $uid=Auth::user()->id;
        $keyword = $request->get('search');
        $perPage = 4;
        if (!empty($keyword)) {
            $users = User::Where('first_name', 'LIKE', "%$keyword%")
            ->orWhere('last_name', 'LIKE', "%$keyword%")
            ->orWhere('email', 'LIKE', "%$keyword%")
            ->orWhere('state', 'LIKE', "%$keyword%")        
            ->orWhere('city', 'LIKE', "%$keyword%")
            ->orWhere('zip', 'LIKE', "%$keyword%")
            ->orWhere('address', 'LIKE', "%$keyword%")
            ->orWhere('status', 'LIKE', "%$keyword%")
            ->sortable() 
            ->paginate($perPage);
        } else {
            $users = User::where('id','!=', $uid)->sortable()->paginate($perPage);

            // $post = Post::orderBy('id', 'DESC')->get();
        return view('layouts.admin.dentist.add_dentist', compact('users','notification'));
        }
    }    


   
    public function edit($id)
    {
    	$alldata = User::find($id);

        $notification = DataNotification::all()->where('is_read','=',1);
    	
	    	return view('layouts.admin.dentist.edit', compact('alldata','notification'));

    }

    public function update(Request $request,$id)
    {
        $data=User::find($id);
        $data->first_name =input::get("firstname");
        $data->last_name =input::get("lastname");
        $data->email =input::get("email");
        $data->state =input::get("state");
        $data->city =input::get("city");
        $data->zip =input::get("zip");
        $data->address =input::get("address");
        $data->save();
        return redirect('/add_dentist')->with('flash_message', 'Dentist Update successfully!');
    }

    
    public function destroy($id)
    {
		$del = User::find($id);
		$del->delete($id);
		return redirect('/add_dentist')->with('flash_message', 'Dentist Deleted!');
    }

    public function admin_logout(){

        return view('layouts.admin.admin_logout');
    }

    public function logout_admin_to_login(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }

  
}
