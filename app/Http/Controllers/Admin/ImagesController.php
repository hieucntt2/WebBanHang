<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImagesController extends Controller
{
    // public function index($pageId = 1)
    // {
    //     $sanpham = [];
    //     $sp = array_filter($this->data, function ($item) {
    //         return $item;
    //     });
    //     foreach ($sp as $item) {
    //         array_push($sanpham, $item);
    //     }
    //     $pagination = $this->pagination($sanpham, 100, $pageId);
    //     $numberPage = ceil($pagination['total'] / 100);
    //     return View('admin.image', [
    //         'sanpham' => $pagination['data'],
    //         'numberPage' => $numberPage,
    //         'page' => $pageId
    //     ]);
    // }
    public function index()
    {
        $anh = DB::table('sanpham')->join('chitietsp', 'sanpham.MaSP', '=', 'chitietsp.MaSP')->join('anhsp', 'sanpham.MaSP', '=', 'anhsp.MaSP')->get();
        return View('admin.image', [
                'sanpham' => $anh
            ]);
    }
    public function search(Request $request)
    {
        $anh = DB::table('sanpham')->join('chitietsp', 'sanpham.MaSP', '=', 'chitietsp.MaSP')->join('anhsp', 'sanpham.MaSP', '=', 'anhsp.MaSP')->where('TenSP', 'like', "%{$request->name}%")->get();
        return response()->json([
            'anh' => $anh
        ]);
    }
}
