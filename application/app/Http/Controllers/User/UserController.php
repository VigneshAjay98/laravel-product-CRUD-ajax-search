<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\User;
use App\User_product;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_id = Auth()->user()->id;
        $users = User::where('id', '!=', $user_id)->get();

        // echo"<pre>"; print_r($users); exit;
        return view('users_list', compact('users'));
        
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $user_product = new User_product;

        $user_product->product_id = $request->product_id;
        $user_product->user_id = $request->customer_id;

        $user_product->save();

        return redirect()->back()->with('success', 'Course Assigned Successfully');

    }

    public function show($id)
    {
        $products = User_product::join('products', 'user_products.product_id', '=', 'products.id')->where('user_products.user_id', $id)->get();

        $user = User::find($id);

        // echo"<pre>"; print_r($user_products); exit;

        return view('assigned_products', compact('products', 'user'));
        // return view('product_details');
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
