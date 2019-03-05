<?php

namespace URBANE\Http\Controllers;

use Illuminate\Http\Request;
use URBANE\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class InfoController extends Controller
{
    public function index()
    {   
        $data = DB::table('urb_product_to_price')
                            ->where('status',1)
                            ->select('cost_price','selling_price','quantity','update_quantity')
                            ->get();
        $r_cp = 0 ;
        $r_sp = 0 ;
        $r_t_quantity = 0 ;
        if(!empty($data)){
            foreach ($data as $key => $value) {
                $r_quantity = $value->quantity - $value->update_quantity;
                $r_cp = $r_cp + ($value->cost_price) * $r_quantity;
                $r_sp = $r_sp + ($value->selling_price) * $r_quantity;
                $r_t_quantity = $r_quantity + $r_t_quantity;
            }
        }

        $s_cp = 0 ;
        $s_sp = 0 ;
        $s_t_quantity = 0 ;
        if(!empty($data)){
            foreach ($data as $key => $value) {
                $s_quantity = $value->update_quantity;
                $s_cp = $s_cp + ($value->cost_price) * $s_quantity;
                $s_sp = $s_sp + ($value->selling_price) * $s_quantity;
                $s_t_quantity = $s_quantity + $s_t_quantity;
            }
        }
        $cp = 0 ;
        $sp = 0 ;
        $t_quantity = 0 ;
        if(!empty($data)){
            foreach ($data as $key => $value) {
                $quantity = $value->quantity;
                $cp = $cp + ($value->cost_price) * $quantity;
                $sp = $sp + ($value->selling_price) * $quantity;
                $t_quantity = $quantity + $t_quantity;
            }
        }
        return view('info',array(
                            'r_cost_price'=>$r_cp,
                            'r_selling_price'=>$r_sp,
                            'r_total_quantity'=>$r_t_quantity,
                            'cost_price'=>$cp,
                            'selling_price'=>$sp,
                            'total_quantity'=>$t_quantity,
                            's_cost_price'=>$s_cp,
                            's_selling_price'=>$s_sp,
                            's_total_quantity'=>$s_t_quantity,
                            ));;
    }
}
