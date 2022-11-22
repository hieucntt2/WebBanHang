<?php

use App\Http\Controllers\Admin\ImagesController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductsController as AdminProductsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ProductTypesController;
use App\Http\Controllers\ProductsController;

Route::get('/', [
    HomeController::class,
    'index'
])->name('Trangchu');

Route::get('/introduce', [
    HomeController::class,
    'introduce'
])->name('GioiThieu');

Route::get('/contact', [
    HomeController::class,
    'contact'
])->name('LienHe');

Route::get('/knowledge', [
    HomeController::class,
    'knowledge'
])->name('KienThuc');

Route::get('/store/{id}/{pageId}', [
    ProductsController::class,
    'store'
])->name('CuaHang');

Route::get('/cart', [
    ProductsController::class,
    'cart'
])->name('GioHang');

Route::get('/payment', [
    ProductsController::class,
    'payment'
])->name('ThanhToan');

Route::get('/order', [
    ProductsController::class,
    'order'
])->name('DatHang');
Route::get('/product/{id}', [
    ProductsController::class,
    'getProductById'
])->name('ChiTiet');

Route::post('/create-order', [
    ProductsController::class,
    'createOrder'
])->name('TaoDonHang');

Route::get('/admin/login', [
    LoginController::class,
    'login'
])->name('login');

Route::post('/admin/responLogin', [
    LoginController::class,
    'responLogin'
])->name('responLogin');

Route::get('/admin/logout', [
    LoginController::class,
    'logOut'
])->name('logout');
Route::get('/admin/register', [
    LoginController::class,
    'register'
])->name('register');

Route::post('/admin/responRegister', [
    LoginController::class,
    'responRegister'
])->name('responRegister');

Route::post('/client/responLogin', [
    HomeController::class,
    'responLogin'
])->name('responLogin');

Route::post('/client/responRegister', [
    HomeController::class,
    'responRegister'
])->name('responRegister');

Route::get('/client/logout', [
    HomeController::class,
    'logOut'
])->name('logout');
Route::group(['middleware' => 'checkAdmin'], function () {
    //sản phẩm
    Route::get('/admin/product/{pageId}', [
        AdminProductsController::class,
        'index'
    ])->name('Products');

    Route::post('/admin/create-product', [
        AdminProductsController::class,
        'create'
    ]);
    Route::post('/admin/edit-product', [
        AdminProductsController::class,
        'edit'
    ]);
    Route::put('/admin/delete-product', [
        AdminProductsController::class,
        'delete'
    ]);
    Route::post('/admin/product/search', [
        AdminProductsController::class,
        'search'
    ])->name('searchProduct');
    //loại sản phẩm
    Route::get('/admin/productTypes', [
        ProductTypesController::class,
        'index'
    ])->name('ProductsType');

    Route::post('/admin/create-productTypes', [
        ProductTypesController::class,
        'create'
    ]);

    Route::put('/admin/edit-productTypes', [
        ProductTypesController::class,
        'edit'
    ]);

    Route::put('/admin/delete-productTypes', [
        ProductTypesController::class,
        'delete'
    ]);
    Route::post('/admin/productTypes/search', [
        ProductTypesController::class,
        'search'
    ])->name('searchProductTypes');
    //ảnh sản phẩm
    Route::get('/admin/image-product', [
        ImagesController::class,
        'index'
    ])->name('ImageProducts');
    Route::post('/admin/image-product/search', [
        ImagesController::class,
        'search'
    ])->name('image-product');
    //đơn hàng
    Route::get('/admin/orderDate', [
        OrderController::class,
        'orderDate'
    ])->name('OrderProductsDate');

    Route::post('/admin/orderDate/{date}', [
        OrderController::class,
        'orderByDate'
    ])->name('OrderProductsByDate');

    Route::get('/admin/orderMonth', [
        OrderController::class,
        'orderMonth'
    ])->name('OrderProductsMonth');

    Route::post('/admin/orderMonth/{month}', [
        OrderController::class,
        'orderByMonth'
    ])->name('OrderProductsByMonth');

    Route::get('/admin/orderDetail/{id}', [
        OrderController::class,
        'orderDetail'
    ]);
});
