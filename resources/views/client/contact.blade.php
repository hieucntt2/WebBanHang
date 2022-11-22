@extends('client.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{asset('css/LienHe.css')}}">
@endsection
@section('content')
    <section>
        <div class="banner">
            <h2>LIÊN HỆ</h2>
            <ul class="d-flex justify-content-center p-0">
                <li><a href="TrangChu.html">TRANG CHỦ</a></li>
                <li>/</li>
                <li><a href="javascript:void(0)">LIÊN HỆ</a></li>
            </ul>
        </div>
        <div class="container">
            <div class="main ">
                <div class="row">
                    <div class="col-md-6">
                        <div class="map"></div>
                    </div>
                    <div class="col-md-6">
                        <h2>LIÊN HỆ VỚI CHÚNG TÔI</h2>
                        <div class="info d-flex align-items-center justify-content-start">
                            <div class="info__img">
                                <img src="../img/logo.png" alt="">
                            </div>
                            <div class="info__desc">
                                <a href="#">Nhóm 44 - Chuyên đề Công Nghệ Phần Mềm</a>
                                <a href="#">0974989174</a>
                                <a href="#">nchieu2909@gmail.com</a>
                                <a href="#">Trân trọng cảm ơn quý khách.</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
