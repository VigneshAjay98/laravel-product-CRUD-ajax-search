<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class AjaxController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

    public function product()
    {

        // echo"inside ajax"; exit;
        $key = $_REQUEST['term'];
        $user_id = Auth()->user()->id;
        // echo  $key; exit;

        $data = Product::select('name')->get()->toArray()
        if($data==null)
        {
            $data[0]['id'] ='';
            $data[0]['value'] ='';
            $data[0]['balance_credit'] ='';
        }

        echo  $data; exit;
        echo collect($data); exit();
    }

    public function activate($id)
    {
        echo "activate"; exit;
        $product = Product::where('id', $id)->update(['status' => 'Active']);

        echo $product;
    }
    public function deactivate($id)
    {
        echo  "deactivate"; exit;
        $product = Product::where('id', $id)->update(['status' => 'InActive']);

        echo $product;
    }
}
