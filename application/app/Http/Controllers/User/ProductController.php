<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
use App\Product;
use App\User_product;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_id = Auth()->user()->id;

        if(Auth()->user()->role == 'admin') {
            $products = Product::all();

            return view('products', compact('products'));
        }
        else {
            $products = User_product::join('products', 'user_products.product_id', '=', 'products.id')->where('user_products.user_id', $user_id)->where('user_products.status', 'Active')->where('products.status', 'Active')->get();
            // echo "<pre>"; print_r($products); exit;
            return view('products', compact('products'));   
        }
        
        // return view('product_details');
    }

     
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // echo"<pre>"; print_r($request->all()); exit;

        $product = new Product;

        $product->name = $request->product_name;
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->price = $request->price;
        $product->status = $request->status;

        $files_arr = [];
        if($request->hasfile('files'))
        {
            foreach($request->file('files') as $file) {
                $path = public_path() .'/uploads/products';
                File::makeDirectory($path, $mode = 0777, true, true);
                $file->move($path, time().$file->getClientOriginalName());
                array_push($files_arr, time().$file->getClientOriginalName());
            }
            $product->images = json_encode($files_arr);
        }

        $product->save();

        // echo"<pre>"; print_r($product); exit;

        return redirect()->back()->with('success', 'New Product added Successfully');

    }

    public function show($id)
    {
        $product = Product::find($id);

        return view('product_details', compact('product'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
        //
    }
}
