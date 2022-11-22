<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LoaiSP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Exception;

class ProductTypesController extends Controller
{
    public function index()
    {
        $loaisp =  DB::table('loaisp')->where('loaisp.isDelete', '=', 0)->get();
        return View('admin.productTypes', [
            'loaisp' => $loaisp
        ]);
    }
    public function create(Request $request)
    {
        DB::beginTransaction();
        try {
            $type = new LoaiSP();
            $type->tenloai = $request->tenloai;
            $type->Time_Create = Carbon::now();
            $type->Time_Update = Carbon::now();
            $type->isActive = 1;
            $type->isDelete = 0;
            $type->save();
            DB::commit();

            return response()->json([
                'productType' => $type
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'error' => $e->getMessage(),
            ], 400);
        }
    }
    public function edit(Request $request)
    {
        $type = LoaiSP::find($request->id);
        logger()->info('ádsadd0' . json_encode($type));

        $type->tenloai = $request->tenloai;
        $type->Time_Update = Carbon::now();
        if ($type->save()) {
            return response()->json([
                'productType' => $type
            ]);
        }
        return 'fail';
    }
    public function delete(Request $request)
    {
        $type = LoaiSP::find($request->id);
        $type->isDelete = 1;
        $type->isActive = 0;
        if ($type->save()) {
            return response()->json([
                'productType' => $type
            ]);
        }
        return 'fail';
    }
    public function search(Request $request)
    {
        $loaisp = DB::table('loaisp')->where('loaisp.tenloai', 'like', "%{$request->name}%")->get();
        return response()->json([
            'loaisp' => $loaisp
        ]);
    }
}
