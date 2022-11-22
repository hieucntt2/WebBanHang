@extends('client.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/ChiTietSanPham.css') }}">
@endsection
@section('content')
    <section class="main mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="product__slide-img">
                        <div class="row">
                            <div class="main__img">
                                <i class="fa-solid fa-chevron-left left"></i>
                                @foreach ($sanpham as $item)
                                    <img src="../img/{{ $item->URL }}" alt="">
                                @endforeach
                                <i class="fa-solid fa-chevron-right right"></i>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <?php $d = 1; ?>
                            @foreach ($anh as $item)
                                <div class="col-3 img__slide"><img src="../img/{{ $item->URL }}"
                                        alt="{{ $item->TenAnh }}" index="{{ $d }}"
                                        class="{{ $d == 1 ? 'active' : '' }} "></div>
                                <?php $d++; ?>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="product__info">
                        <ul class="d-flex align-items-center">
                            <li><a href="{{ route('Trangchu') }}"> Trang chủ</a></li>
                            <li>/</li>
                            <li><a href="{{ route('CuaHang',['all',1]) }}"> cửa hàng</a></li>
                        </ul>
                        <input type="text" value="{{$id}}" hidden>
                        @foreach ($sanpham as $item)
                            <h2>{{ $item->TenSP }}</h2>
                            <p class="price"><span>{{ number_format($item->Gia, 0) }}</span> <b>đ</b></p>
                        @endforeach
                        <span><b>Lorem Ipsum</b> chỉ đơn giản là một đoạn văn bản giả, được dùng vào việc trình bày và
                            dàn trang phục vụ cho in ấn. Lorem Ipsum đã được sử dụng như một văn bản chuẩn cho ngành
                            công nghiệp in ấn</span>
                        <div class="add__product d-flex align-items-center">
                            <div class="quantity d-flex align-items-center">
                                <span class="tru">-</span>
                                <input class="input" type="number" value="1" min="1">
                                <span class="cong">+</span>
                            </div>
                            <button id="add_product">thêm vào giỏ </button>
                        </div>
                        <div class="row">
                            <div class="col-md-6 ship">
                                <p>Tính phí ship tự động</p>
                                <div class="row">
                                    <div class="ship__img col-4">
                                        <img src="../img/logo-ghn.jpg" alt="">
                                    </div>
                                    <div class="ship__img col-4">
                                        <img src="../img/logo-ghtk.jpg" alt="">
                                    </div>
                                    <div class="ship__img col-4">
                                        <img src="../img/logo-ninja-van.jpg" alt="">
                                    </div>
                                    <div class="ship__img col-4">
                                        <img src="../img/logo-shipchung.jpg" alt="">
                                    </div>
                                    <div class="ship__img col-4">
                                        <img src="../img/logo-vib.jpg" alt="">
                                    </div>
                                    <div class="ship__img col-4">
                                        <img src="../img/logo-viettle-post.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 ship">
                                <p>Thanh toán</p>
                                <div class="row">
                                    <div class="ship__img col-4">
                                        <img src="../img/logo-acb.jpg" alt="">
                                    </div>
                                    <div class="ship__img col-4">
                                        <img src="../img/logo-techcombank.jpg" alt="">
                                    </div>
                                    <div class="ship__img col-4">
                                        <img src="../img/logo-vib.jpg" alt="">
                                    </div>
                                    <div class="ship__img col-4">
                                        <img src="../img/logo-vcb.jpg" alt="">
                                    </div>
                                    <div class="ship__img col-4">
                                        <img src="../img/logo-paypal.jpg" alt="">
                                    </div>
                                    <div class="ship__img col-4">
                                        <img src="../img/logo-mastercard.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h2>Sản phẩm tương tự</h2>
            <div class="slide">
                <div class="product__promotions ">
                    @foreach ($sanphamtuongtu as $item)
                        <div class="col-md-3">
                            <div class="product__promotion__item">
                                <div class="product__promotion__img">
                                    <a href="{{ route('ChiTiet', $item->MaSP) }}">
                                        <img src="../img/{{ $item->URL }}" alt="">
                                    </a>
                                </div>
                                <a href="{{ route('ChiTiet', $item->MaSP) }}">{{ $item->TenSP }}</a>
                                <span>{{ number_format($item->Gia, 0) }} đ</span>
                            </div>
                        </div>
                    @endforeach
                </div>
                <i class="fa-solid fa-chevron-left prev"></i>
                <i class="fa-solid fa-chevron-right next"></i>
            </div>
        </div>
    </section>
@endsection
