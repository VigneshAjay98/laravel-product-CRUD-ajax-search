<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\User_product;

class AjaxController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

    public function product(Request $request)
    {

       $search = $request->search;

      if($search == ''){
         $autocomplate = Product::orderby('name','asc')->select('id','name')->where('status', 'Active')->limit(10)->get();
      }else{
         $autocomplate = Product::orderby('name','asc')->select('id','name')->where('name', 'like', '%' .$search . '%')->where('status', 'Active')->limit(10)->get();
      }

      $response = array();
      foreach($autocomplate as $autocomplate){
         $response[] = array("value"=>$autocomplate->id,"label"=>$autocomplate->name);
      }

      echo json_encode($response);
      exit;
    }

    public function customer(Request $request)
    {

       $search = $request->search;

      if($search == ''){
         $autocomplate = User::orderby('name','asc')->select('id','name')->limit(10)->get();
      }else{
         $autocomplate = User::orderby('name','asc')->select('id','name')->where('name', 'like', '%' .$search . '%')->where('role', '!=', 'admin')->limit(10)->get();
      }

      $response = array();
      foreach($autocomplate as $autocomplate){
         $response[] = array("value"=>$autocomplate->id,"label"=>$autocomplate->name);
      }

      echo json_encode($response);
      exit;
    }

    public function category(Request $request)
    {

       $search = $request->search;

      if($search == ''){
         $autocomplate = Product::orderby('category','asc')->select('category')->limit(10)->get();
      }else{
         $autocomplate = Product::orderby('category','asc')->select('category')->where('category', 'like', '%' .$search . '%')->limit(10)->get();
      }

      $response = array();
      foreach($autocomplate as $autocomplate){
         $response[] = array("label"=>$autocomplate->category);
      }

      echo json_encode($response);
      exit;
    }

    public function live_search(Request $request)
    {
        $user_id = Auth()->user()->id;

        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
          if($query != '')
          {

            if(Auth()->user()->role == 'admin') {

                $data = Product::where('name', 'like', '%'.$query.'%')->orWhere('short_description', 'like', '%'.$query.'%')->orWhere('description', 'like', '%'.$query.'%')->orWhere('category', 'like', '%'.$query.'%')->orderBy('id', 'desc')->get();

            }else {

                $data = User_product::join('products', 'user_products.product_id', '=', 'products.id')->where('user_products.user_id', $user_id)->where('user_products.status', 'Active')->where('products.status', 'Active')->where('products.name', 'like', '%'.$query.'%')->orWhere('products.short_description', 'like', '%'.$query.'%')->orWhere('products.description', 'like', '%'.$query.'%')->orWhere('products.category', 'like', '%'.$query.'%')->orderBy('products.id', 'desc')->get();

            }

          }
          else
          {

            if(Auth()->user()->role=='admin'){
                $data = Product::orderBy('id', 'desc')->get();
            }else {
                $data = User_product::join('products', 'user_products.product_id', '=', 'products.id')->where('user_products.user_id', $user_id)->where('user_products.status', 'Active')->where('products.status', 'Active')->orderBy('products.id', 'desc')->get();
            }
          }
          $total_row = $data->count();
          if($total_row > 0)
          {

            $i=1;

               foreach($data as $row)
               {
                // print $row->name; exit
                $output .= '
                <tr>
                 <th scope="row">'.$i++.'</th>
                 <td>'.$row->name.'</td>
                 <td>'.$row->category.'</td>
                 <td>'.$row->short_description.'</td>';
                 if($row->status == "Active") {
                    $output .= '<td><a data="'.$row->status.'" data-id="'.$row->id.'" class="btn-primary active" style="padding: 3px 10px;">Active</a><td>';
                 }else {
                    $output .= '<td><a data="'.$row->status.'" data-id="'.$row->id.'" class="btn-danger inactive" style="padding: 3px 10px;">InActive</a><td>';
                 }
                 $output .= '<td><a href="'.$_SERVER["REQUEST_SCHEME"].'://'.$_SERVER["SERVER_NAME"].'/'.'product/products'.'/'.$row->id.'"><i class="la la-eye mr-1 font-size-16"></i></a></td>
                </tr>
                ';
                 
               }
          }
          else
          {
               $output = '
               <tr>
                <td align="center" colspan="5">No Records Found!</td>
               </tr>
               ';
          }

          // print $output; exit;
              $data = array(
               'table_data'  => $output,
               'total_data'  => $total_row
              );

            echo json_encode($data); exit;
         }
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
