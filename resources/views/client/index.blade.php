@extends('client.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{asset('css/TrangChu.css')}}">
@endsection
@section('content')
    <!-- main -->
    <section>
        <!-- Slide Banner -->
        <div class="slideBanner">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="item__info">
                            <div class="slide__info">
                                <p>Walnuts</p>
                                <h1>100% tự nhiên</h1>
                                <span>Giảm giá khi mua hàng hôm nay</span>
                                <a href="{{ route('CuaHang',['all', 1]) }}">mua ngay</a>
                            </div>
                            <div class="slide__img">
                                <img src="../img/imgslide22.png" alt="imgslide13">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item ">
                        <div class="item__info">
                            <div class="slide__info">
                                <p>Apple Juice</p>
                                <h1>100% tự nhiên</h1>
                                <span>Giảm giá khi mua hàng hôm nay</span>
                                <a href="{{ route('CuaHang',['all', 1]) }}">mua ngay</a>
                            </div>
                            <div class="slide__img">
                                <img src="../img/imgslide13.png" alt="imgslide22">
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="container banner">
            <div class="row banner__info">
                <div class="col-md-6 banner__item">
                    <a href="#" class="banner__img">
                        <img src="../img/banner28.jpg" alt="">
                    </a>
                </div>
                <div class="col-md-6 banner__item">
                    <a href="#" class="banner__img">
                        <img src="../img/banner34.jpg" alt="">
                    </a>
                </div>
                <div class="col-md-6 banner__item">
                    <a href="#" class="banner__img">
                        <img src="../img/banner35.jpg" alt="">
                    </a>
                </div>
                <div class="col-md-6 banner__item">
                    <a href="#" class="banner__img">
                        <img src="../img/banner36.jpg" alt="">
                    </a>
                </div>
            </div>
        </div>
        <!-- featured products -->
        <div class="container">
            <div class="product__fearured">
                <h2>Sản phẩm nổi bật</h2>
                <ul class="classify d-flex justify-content-center">
                    <li class="active">Mới nhất</li>
                    <li>Giảm gía</li>
                    <li>Bán chạy</li>
                </ul>
                <div class="row">
                    @foreach ($sanpham_new as $item)
                        <div class="col-md-4 col-xl-3 ">
                            <div class="product__item">
                                <div class="product__img">
                                    <a href="{{ route('ChiTiet', $item->MaSP) }}">
                                        <img src="../img/{{ $item->URL }}" alt="">
                                    </a>
                                </div>
                                <a href="{{ route('ChiTiet', $item->MaSP) }}">{{ $item->TenSP }}</a>
                                <span>{{ number_format($item->Gia, 0) }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="desc">
            <h2>Khuyến Mãi Trong Tuần</h2>
            <p>______________</p>
            <p>Cơ hội để gia đình bạn sở hữu những sản phẩm ưu đãi</p>
        </div>
        <div class="container">
            <div class="product__promotion ">
                @foreach ($sanpham_sale as $item)
                    <div class="col-md-3">
                        <div class="product__promotion__item">
                            <div class="product__promotion__img">
                                <a href="{{ route('ChiTiet', $item->MaSP) }}">
                                    <img src="../img/{{ $item->URL }}" alt="">
                                </a>
                            </div>
                            <a href="{{ route('ChiTiet', $item->MaSP) }}">{{ $item->TenSP }}</a>
                            <span>{{ number_format($item->Gia, 0) }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row product__class">
                <div class="col-md-3 product__class__img">
                    <a href="#">
                        <img src="../img/banner29.jpg" alt="">
                    </a>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-4 product__class__img"><img src="../img/banner30.jpg" alt="">
                        </div>
                        <div class="col-md-4 product__class__img"><img src="../img/banner31.jpg" alt="">
                        </div>
                        <div class="col-md-4 product__class__img"><img src="../img/banner32.jpg" alt="">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-4 text-center d-flex flex-column justify-content-center align-items-center">
                            <h2>100%</h2>
                            <p>natural</p>
                        </div>
                        <div class="col-md-8 product__class__img">
                            <img src="../img/banner33.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="brand">
                <div class="brand__img">
                    <img src="../img/brand1-1.png" alt="">
                </div>
                <div class="brand__img">
                    <img src="../img/brand2-1.png" alt="">
                </div>
                <div class="brand__img">
                    <img src="../img/brand1-1.png" alt="">
                </div>
                <div class="brand__img">
                    <img src="../img/brand2-1.png" alt="">
                </div>
                <div class="brand__img">
                    <img src="../img/brand1-1.png" alt="">
                </div>
                <div class="brand__img">
                    <img src="../img/brand2-1.png" alt="">
                </div>
                <div class="brand__img">
                    <img src="../img/brand1-1.png" alt="">
                </div>
                <div class="brand__img">
                    <img src="../img/brand2-1.png" alt="">
                </div>
                <div class="brand__img">
                    <img src="../img/brand1-1.png" alt="">
                </div>
                <div class="brand__img">
                    <img src="../img/brand2-1.png" alt="">
                </div>
            </div>
        </div>

    </section>
@endsection
