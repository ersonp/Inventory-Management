<?php

namespace URBANE\Http\Controllers\Products;

use Illuminate\Http\Request;
use URBANE\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator; 

class AddProductsController extends Controller
{
	public function index(){
        $last_uid = DB::table('urb_product')
                    ->where('status',1)
                    ->orderBy('urbane_id','DESC')
                    ->select('urbane_id')
                    ->first();
    	return view('add-products',array(
            'last_uid'=>$last_uid->urbane_id,
            ));

    }
    public function addProductsData(Request $request){
        $data = $request->input('formData');
    	$all_data = array();
        foreach ($data as $key => $value) {
        	array_push($all_data, $value['value']);
        }
        // $uid = strtoupper($all_data[0]);
        // $existing_uid = array();
        // $existing_uid = DB::table('urb_product')
    				// 	->where('urbane_id' , $uid)
    				// 	->where('status' , 1)
    				// 	->pluck('urbane_id');
        // if(count($existing_uid)>0){
        // 	return ['sucesss' => true, 'message' => 'Unique id Already Present'];
        // }
        $name = str_replace(" ", "-", ucwords($all_data[0]));
        $product_desc = $all_data[1];
        $bought_from = $all_data[2];
        $cost_price = $all_data[3];
        $selling_price = $all_data[4];
        $quantity = $all_data[5];
        $user_id = $request->user()->id;
        // dd($all_data);
        $product_data = [

        					// 'urbane_id' => $uid,
        					'product_name' => $name,
        					'product_desc' => $product_desc,
        					'bought_from' => $bought_from,
                            'user_id' => $user_id,

				        ];
        $urbane_id = DB::table('urb_product')->insertGetId($product_data);
        if(! empty($urbane_id)){
            $product_price_data = [

                            'urbane_id' => $urbane_id,
                            'cost_price' => $cost_price,
                            'selling_price' => $selling_price,
                            'profit' => ($selling_price - $cost_price) * $quantity,
                            'quantity' => $quantity,
                            'update_quantity' => $quantity,
                            'user_id' => $user_id,

                        ];
            $product_to_price_id = DB::table('urb_product_to_price')->insertGetId($product_price_data);
        }
        return ['success' => true, 'message' => 'Product added'];
    }
}
