<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Email_template;
use App\Mail_queue;
use Validator;
use Auth;
use App\User;

class Logincontroller extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'   => 'required|email',
            'password' => 'required'
        ]);
        if($validator->fails())
        {
            return redirect('/login')->withErrors($validator)->withInput();
        }
        else{
        $user = User::where('email',$request->email)->first();

            if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password ]))
            {
            	if(Auth::guard('web')->check())
            	{
                    if($user->status == 'Active')
                    {
                        return redirect('/products');
                    }
                    else
                    {
                        Auth::guard('web')->logout();           
                        return redirect()->back()->with('error', 'Sorry! Your account has deactivated.');       
                    }
            	}
            }
            else
            {
                return redirect()->back()->with('error','Invalid username or password.');
            }
        }
        return redirect()->back()->withErrors($validator)->withInput($request->only('email'));
    }

    public function logout()
    {
        Auth::guard('web')->logout();           
        return redirect('/login');
    }
}
