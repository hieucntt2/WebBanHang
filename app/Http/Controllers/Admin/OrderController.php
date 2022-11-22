<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DonHang;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class OrderController extends Controller
{
    public function orderDate()
    {
        $donhang = DonHang::all();
        return View('admin.orderDate',[
            'donhang' => $donhang,
        ]);
    }
    public function orderMonth()
    {
        $donhang = DonHang::all();
        return View('admin.orderMonth',[
            'donhang' => $donhang,
        ]);
    }
    public function orderDetail($id)
    {
        // logger()->info('fvvvvv'.json_encode($request->all()));
        $detail= DB::table('ctdh')->where('ctdh.MaDH', '=', $id)->join('chitietsp', 'ctdh.MaSP','=','chitietsp.MaSP')->join('giasp', 'ctdh.MaSP','=','giasp.MaSP')->get();
        return response()->json([
            'detail' => $detail,
        ]);
    }


    public function orderByMonth($month)
    {
        $val = explode("-",$month);
        $detail =  DB::table('donhang')->whereMonth('Time_Create', '=', $val[1])->whereYear('Time_Create', '=', $val[0])->get();
        return response()->json([
            'detail' => $detail,
        ]);
    }
    public function orderByDate($date)
    {
        $detail =  DB::table('donhang')->where('Time_Create', '=', $date)->get();
        return response()->json([
            'detail' => $detail,
        ]);
    }
}
