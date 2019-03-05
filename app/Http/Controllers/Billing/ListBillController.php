<?php

namespace URBANE\Http\Controllers\Billing;

use Illuminate\Http\Request;
use URBANE\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Response;
use URBANE\Http\Controllers\Billing\AddBillController;
use URBANE\Http\Controllers\Products\ListProductsController;

class ListBillController extends Controller
{
	public function index(){

    	return view('list-bill');

    }
    // public function index()
    // {
    //     return view('store', ['store' => Store::all()]); 
    // }
    public function listBillData(Request $request){
        
        $date = str_replace("'","",$request->input('date'));
        $bill_id = $request->input('bill_id');
        $result = DB::table('urb_bill')
                        ->select('*')
                        ->where('status' , 1);
        if (!empty($bill_id)) {
            $result = $result->where('bill_id' , $bill_id);
        }
        if(!empty($date)){
            $date_array = explode(",",$date);
            if(count($date_array) == 1){
                $the_date = Carbon::parse($date_array[0])->format('Y-m-d');
                $result = $result->where('date' , $the_date);
            }
            if(count($date_array) == 2){
                $from = Carbon::parse($date_array[0])->format('Y-m-d');
                $to = Carbon::parse($date_array[1])->format('Y-m-d');
                $result = $result ->whereBetween('date', array($from, $to));
            }
        }

    	$result = $result->orderBy('bill_id','DESC');
    	return DataTables::of($result)
		->addColumn('bill_date_time', function ($query) {
            $date = str_replace(":","'",Carbon::parse($query->add_timestamp)->format('D dS M :y'));
            $time = Carbon::parse($query->add_timestamp)->format('h:i:s a');

            return $date.'<br>'.$time;
        })
        ->addColumn('total_quantity', function ($query) {
            return $query->total_quantity;
        })
        ->addColumn('bill_id', function ($query) {
            return $query->bill_id;
        })
        ->addColumn('c_name', function ($query) {
            return $query->c_name;
        })
        ->addColumn('cost_price', function ($query) {
            return $query->cost_price;
        })
        ->addColumn('selling_price', function ($query) {
            return $query->selling_price;
        })
        ->addColumn('discount', function ($query) {
            return $query->discount;
        })
        ->addColumn('profit', function ($query) {
            return $query->profit;
        })
        ->addColumn('bill_id', function ($query) {
            return $query->bill_id;
        })
        ->addColumn('user', function ($query) {
            return ListProductsController::userName($query->user_id);
        })
        ->addColumn('bill_id_encoded', function ($query) {
            return base64_encode($query->bill_id);
        })
        ->addColumn('bill_product_data', function ($query) {
            $result = [];
            $result = DB::table('urb_bill_to_product')
                        ->select('*')
                        ->where('status' , 1)
                        ->where('bill_id',$query->bill_id)
                        ->get();
            $array = json_decode(json_encode($result), true);
            $new_array = [];
            foreach ($array as $key => $value) {
                $array2 = implode($value, ",");  
                array_push($new_array, $array2);    
            }
            $array3 = implode($new_array, "||");
            // dd($array);  
            return $array3;
            // return $array;
        })
        ->rawColumns(['bill_date_time','delete'])
        ->make(true);
    }
    public function deleteBillData(Request $request){
    	$bill_id = $request->input('bill_id');
    	if(!empty($bill_id)){
    		$delete = DB::table('urb_bill')->where('bill_id',$bill_id)->update(['status' =>0]);
            $delete_billed_product = DB::table('urb_bill_to_product')->where('bill_id',$bill_id);

            $delete_update = $delete_billed_product->update(['status' =>0]);

            $delete_prod = $delete_billed_product->get();
            // dd($delete_prod);
            foreach ($delete_prod as $key => $value) {
                $prod_id = DB::table('urb_product_to_price')->where('urbane_id',$value->urbane_id)->increment('update_quantity' , $value->quantity_sold);
            }

	        return ['success' => true, 'message' => 'Bill Deleted'];
    	}
        return ['success' => true, 'message' => 'Bill NOT Deleted'];
    }
    // public function listBillProductsData(Request $request){
    //     $bill_id = $request->input('bill_id');
    //     $result = DB::table('urb_bill_to_product')
    //                     ->select('*')
    //                     ->where('status' , 1)
    //                     ->where('bill_id',$bill_id)
    //                     ->orderBy('add_timestamp','ASC');
    //     return DataTables::of($result)
    //     ->addColumn('urbane_id', function ($query) {
    //         return $query->urbane_id;
    //     })
    //     ->addColumn('name', function ($query) {
    //         return $query->product_name;
    //     })
    //     ->addColumn('cost_price', function ($query) {
    //         return $query->cost;
    //     })
    //     ->addColumn('selling_price', function ($query) {
    //         return $query->price;
    //     })
    //     ->addColumn('rate', function ($query) {
    //         return $query->rate;
    //     })
    //     ->addColumn('quantity_sold', function ($query) {
    //         return $query->quantity_sold;
    //     })
    //     ->rawColumns(['bill_date_time','delete'])
    //     ->make(true);
    // }
    public function listPdfData(Request $request){

        $bill_id = base64_decode($_GET['SDfs']);
        $data = DB::table('urb_bill')
                            ->where('bill_id',$bill_id)
                            ->where('status',1)
                            ->first();
        // dd($bill_id);
        $timestamp = $data->add_timestamp;
        $customer = $data->c_name;
        $pdf_name = Carbon::parse($timestamp)->format('dMDy-g-i-sa').'-'.$customer.'-'.$bill_id;
        $pathToFile = public_path().'\savedpdf\\'.$pdf_name.'.pdf';
        if (! file_exists($pathToFile)) {
            return AddBillController::realMakePDF($bill_id);
        }
        return response()->file($pathToFile);
    }
}
