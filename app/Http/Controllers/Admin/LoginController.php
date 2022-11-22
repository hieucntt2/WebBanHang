<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NguoiDung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        return View('admin.login');
    }
    public function responLogin(Request $request)
    {
        logger()->info('Passwordas ' . json_encode($request->all()));
        if (Auth::guard('nguoidung')->attempt([
            'Email' => $request->email,
            'password' => $request->password
        ])) {
            return redirect()->route('ProductsType');
        }

        return response()->json([
            'message' => 'fail login'
        ], 400);
    }
    public function register()
    {
        return View('admin.register');
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
            $user->isAdmin = 1;
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
        return redirect()->route('login');
    }
}
