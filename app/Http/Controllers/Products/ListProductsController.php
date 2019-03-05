<?php

namespace URBANE\Http\Controllers\Products;

use Illuminate\Http\Request;
use URBANE\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ListProductsController extends Controller
{
	public function index(){

    	return view('list-products');

    }
    public function listProductsData(Request $request){
        $uid = $request->input('uid');
    	$result = DB::table('urb_product as a')
                                ->join('urb_product_to_price as b','b.urbane_id','a.urbane_id')
            					->select('a.urbane_id','a.product_name','a.product_desc','a.bought_from','a.user_id','b.user_id as user_b','b.cost_price','b.selling_price','b.profit','b.quantity','b.update_quantity')
            					->where('a.status' , 1)
                                ->where('b.status' , 1);
        if (!empty($uid)) {
            $result = $result->where('a.urbane_id',$uid);
        }

        $result = $result->orderBy('a.urbane_id','DESC');

    	return DataTables::of($result)	
		->addColumn('uid', function ($query) {
            return $query->urbane_id;
        })
        ->addColumn('name', function ($query) {
            $name = $query->product_name;
            // $desc = $query->product_desc;
            // if(!empty($desc)){
            //     return $name.' - '.$desc;
            // }
            return $name;
        })
        ->addColumn('bought', function ($query) {
            return $query->bought_from;
        })
        ->addColumn('cost_price', function ($query) {
            return $query->cost_price;
        })
        ->addColumn('selling_price', function ($query) {
            return $query->selling_price;
        })
        ->addColumn('profit', function ($query) {
            return $query->profit;
        })
        ->addColumn('original_quantity', function ($query) {
            return $query->quantity;
        })
        ->addColumn('products_sold', function ($query) {
            $orig_quantity = $query->quantity;
            $curr_quantity = $query->update_quantity;
            $products_sold = $orig_quantity - $curr_quantity;
            return $products_sold.'<br><meter value="'.$products_sold.'" min="0" max="'.$orig_quantity.'"></meter>';
        })
        ->addColumn('products_sold_quantity', function ($query) {
            $orig_quantity = $query->quantity;
            $curr_quantity = $query->update_quantity;
            $products_sold = $orig_quantity - $curr_quantity;

            return $products_sold;
        })
        ->addColumn('user_name', function ($query) {
            $user_id_a = $query->user_id;
            $user_id_b = $query->user_b;
            if($user_id_a == $user_id_b){
                return $this->userName($user_id_a);
            }
            return $this->userName($user_id_a).'<br>'.$this->userName($user_id_b);
        })
        ->rawColumns(['products_sold','delete','user_name'])
        ->make(true);
    }
    static function userName($user_id){
        $name = DB::table('users')
                                ->where('id',$user_id)
                                ->where('status' , 1)
                                ->select('name') 
                                ->first();
        return $name->name;  
    }
    public function deleteProductData(Request $request){
    	$urbane_id = $request->input('urbane_id');
    	if(!empty($urbane_id)){
    		$delete = DB::table('urb_product')->where('urbane_id',$urbane_id)->update(['status' =>0]);
            if($delete){
                $delete_price = DB::table('urb_product_to_price')->where('urbane_id',$urbane_id)->update(['status' =>0]);
            }
	        return ['success' => true, 'message' => 'Product Deleted'];
    	}
        return ['success' => true, 'message' => 'Product NOT Deleted'];
    }
    public function modifyProductData(Request $request){
        
        $urbane_id = $request->input('urbane_id');
        $name = $request->input('product_name');
        $product_desc = $request->input('product_desc');
        $bought_from = $request->input('bought');
        $cost_price = $request->input('cost_price');
        $selling_price = $request->input('selling_price');
        $product_name = ucwords($request->input('product_name'));
        $quantity = $request->input('quantity');
        $quantity_sold = $request->input('quantity_sold');
        // dd($quantity_sold);
        $user_id = $request->user()->id;
        $product_data = [

                                'product_name' => $name,
                                'product_desc' => $product_desc,
                                'bought_from' => $bought_from,
                                'user_id' => $user_id,

                        ];
        $urbane = DB::table('urb_product')->where('urbane_id',$urbane_id)->update($product_data);
        if($urbane_id){
            $delete_old = DB::table('urb_product_to_price')->where('urbane_id',$urbane_id)->update(['status' => 0]);
            if($delete_old){
                $product_price_data = [

                                'urbane_id' => $urbane_id,
                                'cost_price' => $cost_price,
                                'selling_price' => $selling_price,
                                'profit' => ($selling_price - $cost_price) * $quantity,
                                'quantity' => $quantity,
                                'update_quantity' => $quantity - $quantity_sold,
                                'user_id' => $user_id,

                            ];
                $product_to_price_id = DB::table('urb_product_to_price')->insertGetId($product_price_data);
                return ['success' => true, 'message' => 'Product modified'];
            }
        }
        return ['success' => true, 'message' => 'Product NOT modified'];
    }
}
