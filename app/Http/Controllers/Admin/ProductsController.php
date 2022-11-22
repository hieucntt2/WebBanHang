<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AnhSP;
use App\Models\ChiTietSP;
use App\Models\GiaSP;
use App\Models\LoaiSP;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Exception;

class ProductsController extends Controller
{
    //
    public function index($pageId = 1)
    {
        $loaisp = LoaiSP::all();
        $sanpham = [];
        $sp = array_filter($this->data, function ($item) {
            return $item;
        });
        foreach ($sp as $item) {
            array_push($sanpham, $item);
        }
        $pagination = $this->pagination($sanpham, 9, $pageId);
        $numberPage = ceil($pagination['total'] / 9);
        return View('admin.products', [
            'loaisp' => $loaisp,
            'sanpham' => $pagination['data'],
            'numberPage' => $numberPage,
            'page' => $pageId
        ]);
    }
    public function create(Request $request)
    {
        DB::beginTransaction();
        try {
            $prod = new SanPham();
            $prod->MaLoai = $request->maloai;
            $prod->Time_Create = Carbon::now();
            $prod->Time_Update = Carbon::now();
            $prod->isActive = 1;
            $prod->isDelete = 0;
            $prod->save();

            $price = new GiaSP();
            $price->MaSP = $prod->MaSP;
            $price->Gia = $request->giasp;
            $price->Time_Begin = Carbon::now();
            $price->Time_End = null;
            $price->save();

            $prodDetail = new ChiTietSP();
            $prodDetail->MaSP = $prod->MaSP;
            $prodDetail->TenSP = $request->tensp;
            $prodDetail->SL = $request->soluong;
            $prodDetail->save();

            $image = new AnhSP();
            $image->MaSP = $prod->MaSP;
            $image->TenAnh = $request->tensp;
            $image->URL = $this->getFileImage($request);
            $image->save();

            DB::commit();

            return response()->json([
                'product' => $prod,
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
        $sanpham = SanPham::find($request->id);
        $sanpham->MaLoai = $request->maloai;
        $sanpham->Time_Update = Carbon::now();
        if( $sanpham->save()){
            return response()->json([
                'product' => $sanpham
            ]);
        }
       return 'fail';
    }
    public function delete(Request $request)
    {
        $prod = SanPham::find($request->id);
        $prod->isDelete = 1;
        $prod->isActive = 0;
        if ($prod->save()) {
            return response()->json([
                'product' => $prod
            ]);
        }
        return 'fail';
    }
    public function search(Request $request)
    {
        $sanpham = [];
        $name = $request->name;
        $sp = collect($this->data)->filter(function ($item) use ($name) {
            return str_contains($item->TenSP, $name);
        });
        foreach ($sp as $item) {
            array_push($sanpham, $item);
        }
        return response()->json([
            'sanpham' => $sanpham
        ]);
    }
}
