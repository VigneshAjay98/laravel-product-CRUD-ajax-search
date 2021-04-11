<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\User;
use Auth;

class RegisterController extends Controller
{

    public function register(Request $request)
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {   
        // echo "<pre>"; print_r($request->all()); exit;
        
        $validator = Validator::make($request->all(),[                    
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed|min:8',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required'
        ]);
        
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else
        {   
            // echo "<pre>"; print_r($request->all()); exit;
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->address = $request->address;
            $user->city = $request->city;
            $user->state = $request->state;
            $user->country = $request->country;
              
            $user->role = "user";
            $user->save();    
            
            // echo "<pre>"; print_r($user); exit;
            return redirect('/login')->with('success','Account created successfully. Please login now');
        }
    	
    }

}