<?php

namespace App\Http\Controllers;

use App\Models\TinTuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\NguoiDung;

class HomeController extends Controller
{

    public function index()
    {
        $dataNew = [];
        foreach ($this->data as $item) {
            array_push($dataNew, $item);
            if (count($dataNew) >= 4) break;
        }
        return View('client.index', [
            'sanpham_new' => $dataNew,
            'sanpham_sale' => $this->data,
        ]);
    }
    public function introduce()
    {
        return View('client.introduce');
    }
    public function contact()
    {
        return View('client.contact');
    }
    public function knowledge()
    {
        $tintuc = TinTuc::all();
        return View('client.knowledge', [
            'tintuc' => $tintuc
        ]);
    }
    public function responLogin(Request $request)
    {
        logger()->info('Passwordas ' . json_encode($request->all()));
        if (Auth::guard('nguoidung')->attempt([
            'Email' => $request->email,
            'password' => $request->password
        ])) {
            return redirect()->route('Trangchu');
        }
        return response()->json([
            'message' => 'fail login'
        ], 400);
    }
    public function responRegister(Request $request)
    {
        DB::beginTransaction();
        try {
            $user = new NguoiDung();
            $user->HoTen = $request->username;
            $user->Email = $request->email;
            $user->Time_Create = Carbon::now();
            $user->Time_Update = Carbon::now();
            $user->isActive = 1;
            $user->isDelete = 0;
            $user->MatKhau = Hash::make($request->password);
            $user->isAdmin = 0;
            $user->SDT = $request->phone;
            $user->DiaChi = $request->address;
            $user->save();
            DB::commit();

            return response()->json([
                'User' => $user
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'error' => $e->getMessage(),
            ], 400);
        }
    }
    public function logOut()
    {
        Auth::guard('nguoidung')->logout();
        return redirect()->route('Trangchu');
    }
}
