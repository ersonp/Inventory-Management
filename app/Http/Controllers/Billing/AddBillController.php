<?php

namespace URBANE\Http\Controllers\Billing;

use Illuminate\Http\Request;
use URBANE\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use PDF;
use App;
use Illuminate\Validation\Validator; 
use Carbon\Carbon;

class AddBillController extends Controller
{
	public function index(){
    	return view('add-bill');

    }
    public function getDataProductSearch(Request $request)
    {
        $data = [];
        if($request->has('q')){
            if($request->input('q') != null){
                $search = $request->q;
                $data = DB::table("urb_product as a")
                        ->join('urb_product_to_price as b','b.urbane_id','a.urbane_id')
                        ->select('a.urbane_id','a.product_name','b.cost_price','b.selling_price')
                        ->where('a.urbane_id','LIKE',"%$search%")
                        ->where('a.status',1)
                        ->where('b.status',1)
                        ->get();
            }
        }
        // dd(response()->json($data));
        return response()->json($data);
    }
    public function makePDF(Request $request){//a5 19 a4 32
        $bill_id = base64_decode($_GET['xxSDd']);
        return $this->realMakePDF($bill_id);
    }
    static function realMakePDF($bill_id){
        $main_data = DB::table('urb_bill')
                        ->where('bill_id',$bill_id)
                        ->where('status',1)
                        ->first();
        $bill_id = $main_data->bill_id;
        $customer = $main_data->c_name;
        $timestamp = $main_data->add_timestamp;
        $data_array = DB::table('urb_bill_to_product')
                        ->where('bill_id',$bill_id)
                        ->get()->toArray();
        if (!empty($main_data->phone_number) && $main_data->selling_price > 3000) {
            $giveaway = 1;
        }else{
            $giveaway = 0;
        }
        $data_a = [];
        $data = array(
            // 'rupee'=>public_path().'\img\rupee.png',
            'rupee_white'=>public_path().'\img\rupee-white.png',
            // 'heart'=>public_path().'\img\white-heart.png',
            'heart_black'=>public_path().'\img\black-heart.png',
            // 'instagram'=>public_path().'\img\instagram-logo.png',
            'instagram_black'=>public_path().'\img\instagram-logo-black.png',
            'bill_id'=>$bill_id,
            'customer'=>strtoupper($customer),
            'subtotal'=>$main_data->selling_price,
            'total_quantity'=>$main_data->total_quantity,
            'discount'=>$main_data->discount,
            'grand_total'=>$main_data->selling_price - $main_data->discount,
            'date'=>str_replace(":","'",Carbon::parse($timestamp)->format('D dS M :y')),
            'time'=>Carbon::parse($timestamp)->format('h:i:s a'),
            'table_content'=>$data_array,
            'giveaway'=>$giveaway,
            );
        
        $pdf = PDF::loadView('pdf.bill', $data);
        $pdf_name = Carbon::parse($timestamp)->format('dMDy-g-i-sa').'-'.$customer.'-'.$bill_id;
        $pdf->setPaper('A4', 'portrait');
        $pdf->save(public_path().'\savedpdf\\'.$pdf_name.'.pdf');
        return $pdf->stream($pdf_name.'.pdf');
    }
    public function addBillData(Request $request){
        $datatable = $request->input('datatable');
        $discount = $request->input('discount');
        $selling_price = $request->input('selling');
        $quantity = $request->input('quantity');
        $cost_price = $request->input('cost');
        $profit = $selling_price - $cost_price - $discount;
        $current_time = Carbon::now()->format('Y-m-d H:i:s');
        $name = $request->input('name');
        $phone_number = $request->input('number');
        $print = $request->input('print');
        $user_id = $request->user()->id;
        if(empty($name)){
            $name = 'customer';
        }
        if(empty($discount)){
            $discount = 0;
        }
        // dd($phone_number);
        $bill_data = [

                            'c_name' => ucwords($name),
                            'date' => Carbon::now()->format('Y-m-d'),
                            'cost_price' => $cost_price,
                            'selling_price' => $selling_price,
                            'discount' => $discount,
                            'profit' => $profit,
                            'total_quantity' => $quantity,
                            'phone_number' => $phone_number,
                            'user_id' => $user_id,
                            'add_timestamp' => $current_time,
                            'status' => 1,

                        ];
        

        $bill_id = DB::table('urb_bill')->insertGetId($bill_data);

        if(! empty($bill_id)){
            foreach ($datatable as $key => $value) {
                $bill_prod_data = [

                            'bill_id' => $bill_id,
                            'urbane_id' => $value['uid'],
                            'product_name' => $value['name'],
                            'quantity_sold' => $value['quantity'],
                            'cost' => $value['cost'],
                            'price' => $value['price'],
                            'rate' => $value['rate'],
                            'add_timestamp' => $current_time,
                            'status' => 1,

                        ];
                $bill_prod_id = DB::table('urb_bill_to_product')->insert($bill_prod_data);
                $prod_id = DB::table('urb_product_to_price')->where('urbane_id',$value['uid'])->decrement('update_quantity' , $value['quantity']);
            }
            if($print == 1){
                return ['success' => true, 'message' => base64_encode($bill_id)];
            }
            return ['success' => true, 'message' => 'Bill added'];
        }
    }
}
