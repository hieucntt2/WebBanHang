<?php

namespace App\Http\Controllers;

use App\Models\ChiTietDonHang;
use App\Models\DonHang;
use Illuminate\Http\Request;
use App\Models\ThanhToan;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class ProductsController extends Controller
{
    public function getAll()
    {
        $sanpham = DB::table('sanpham')->join('chitietsp', 'sanpham.MaSP', '=', 'chitietsp.MaSP')->get();
        return View('client.products.index', [
            'sanpham' => $sanpham
        ]);
    }

    //Chi tiet loai SP
    public function store($id, $pageId = 1)
    {
        $sanpham = [];
        if ($id == 'all') {
            $sanpham = $this->data;
        } else {
            $push = array_filter($this->data, function ($item) use ($id) {
                return $item->MaLoai == $id;
            });
            foreach ($push as $item) {
                array_push($sanpham, $item);
            }
        }
        $pagination = $this->pagination($sanpham, 12, $pageId);
        $numberPage = ceil($pagination['total'] / 12);
        return View('client.products.store', [
            'sanpham' => $pagination['data'],
            'numberPage' => $numberPage,
            'maloai' => $id,
            'page' => $pageId
        ]);
    }
    //Chi tiet SP
    public function getProductById($id)
    {
        $sanpham =[];
        $sp = array_filter($this->data, function ($item) use ($id) {
            return $item->MaSP == $id;
        });
        foreach($sp as $item){
            array_push($sanpham, $item);
        }
        $maloai = $sanpham[0]->MaLoai;
        $sanphamtuongtu = array_filter($this->data, function ($item) use ($maloai) {
            return $item->MaLoai == $maloai;
        });
        $anh = DB::table('sanpham')->join('chitietsp', 'sanpham.MaSP', '=', 'chitietsp.MaSP')->join('anhsp', 'sanpham.MaSP', '=', 'anhsp.MaSP')->where('sanpham.MaSP', '=', $id)->get();
        // dd($anh);
        return View('client.products.index', [
            'sanpham' => $sanpham,
            'anh' => $anh,
            'sanphamtuongtu' => $sanphamtuongtu,
            'id' => $id
        ]);
    }
    // giỏ hàng
    public function cart()
    {
        return View('client.products.cart');
    }
    // thanh toán
    public function payment()
    {
        return View('client.products.payment');
    }
    // thanh toán thành công
    public function order()
    {
        return View('client.products.order');
    }

    public function createOrder(Request $request){
        DB::beginTransaction();
        try{
            $cart = $request->cart;
            // create order
            $order = new DonHang();
            $order->Email = $request->email;
            $order->SĐT = $request->phone;
            $order->DiaChi = $request->address;
            $order->HoTen = $request->name;
            $order->Time_Create = Carbon::now();
            $order->Money = 0;
            $order->save();

            logger()->info('ádfasdfd '.json_encode($order));
            $totalPrice = 0;
            // save order detail
            foreach($cart as $item){
                $orderDetail = new ChiTietDonHang();
                $orderDetail->MaDH = $order->MaDH;
                $orderDetail->MaSP = $item["id"];
                $orderDetail->SoLuong = $item["soluong"];

                $orderDetail->save();

                $sanpham = DB::table('sanpham')->join('giasp', 'sanpham.MaSP', '=', 'giasp.MaSP')->where([['Time_End','>', Carbon::now()], ['sanpham.MaSP', $orderDetail->MaSP]])->first();
                if(!$sanpham){
                    throw new BadRequestException('not price', 400);
                }
                $totalPrice += $orderDetail->SoLuong * $sanpham->Gia;
            }
            $order->Money = $totalPrice;

            // save order
            $order->save();

            // create payment
            $payment = new ThanhToan();
            $payment->MaDH = $order->MaDH;
            $payment->Tong = $order->Money;
            $payment->PTTT = $request->method;
            $payment->GhiChu = $request->note;

            $payment->save();

            DB::commit();

            return response()->json([
                'order' => $order,
                'payment' => $payment
            ]);
        }catch(Exception $e){
            DB::rollBack();
            return response()->json([
                'error' => $e->getMessage(),
            ], 400);
        }
    }
}
