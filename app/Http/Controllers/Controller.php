<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\LoaiSP;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $data = [];

    public function __construct()
    {
        $loaisp = LoaiSP::all();
        $sanpham_new = DB::table('sanpham')->join('chitietsp', 'sanpham.MaSP', '=', 'chitietsp.MaSP')->join('anhsp', 'sanpham.MaSP', '=', 'anhsp.MaSP')->join('giasp', 'sanpham.MaSP', '=', 'giasp.MaSP')->join('loaisp', 'sanpham.MaLoai', '=', 'loaisp.maloai')->where('sanpham.isDelete', '=', 0)->get();
        foreach ($sanpham_new as $item) {
            if (empty($this->data)) {
                array_push($this->data, $item);
            } else {
                $check = 1;
                foreach ($this->data as $item2) {
                    if ($item->MaSP == $item2->MaSP) {
                        $check = 0;
                        break;
                    }
                }
                if ($check) {
                    array_push($this->data, $item);
                }
            }
        }
        return View::share([
            'loaisp' => $loaisp,
        ]);
    }

    protected function pagination($array, $limit, $page)
    {
        $data = [];
        for ($i = ($page - 1) * $limit; $i < ($page - 1) * $limit + $limit; $i++) {
            if ($i > count($array)) break;
            if (isset($array[$i])) {
                array_push($data, $array[$i]);
            }
        }
        return [
            "data" => $data,
            "total" => count($array)
        ];
    }

    public function getFileImage(Request $request)
    {
        // upload ảnh
        if ($request->hasFile('anhsp')) { // kiểm tra người dùng có nhập file lên ko
            // get file image
            $file = $request->file('anhsp');
            // đặt lại tên cho file
            $filename = time() . '_' . $file->getClientOriginalName(); //lấy tên gốc của file

            // đường dẫn upload
            $path = 'img/';
            // upload file

            $file->move($path, $filename);

            return $path . $filename;
        }

        return null;
    }
}
