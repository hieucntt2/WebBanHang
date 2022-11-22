@extends('client.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/CuaHang.css') }}">
@endsection
@section('content')
    <section class="main">
        <div class="container">
            <div class="title d-flex justify-content-between">
                <ul class=" d-flex ">
                    <li><a href="TrangChu.html">Trang chủ</a></li>
                    <li>/</li>
                    <li><a href="#">Cửa hàng</a></li>
                </ul>
                <div class="selected">
                    <select name="" id="">
                        <option value="1">Thứ tự mặc định</option>
                        <option value="2">Mới nhất</option>
                        <option value="3">Giá từ thấp đến cao</option>
                        <option value="4">Giá từ cao đến thấp</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="store__left">
                        <p>Danh mục Sản phẩm</p>
                        <ul>
                            @foreach ($loaisp as $item)
                                <li><a href="{{ route('CuaHang', [$item->maloai, 1]) }}">{{ $item->tenloai }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="store__left">
                        <p>LỌC THEO GIÁ</p>
                        <ul class="price">
                            <li>
                                <input type="radio" id="check" name="check" value="0">
                                <label for="check">Tất cả</label>
                            </li>
                            <li>
                                <input type="radio" id="check1" name="check" value="1">
                                <label for="check1">Dưới 100,000 đ</label>
                            </li>
                            <li>
                                <input type="radio" id="check2" name="check" value="2">
                                <label for="check2">Từ 100,000 - 500,000 đ</label>
                            </li>
                            <li>
                                <input type="radio" id="check3" name="check" value="3">
                                <label for="check3">Trên 500,000 đ</label>
                            </li>
                        </ul>
                    </div>
                    <div class="store__left">
                        <p>SẢN PHẨM</p>
                        <ul class="product_bottom">
                            @foreach ($sanpham as $item)
                                <li class="d-flex prod">
                                    <div class="image">
                                        <img src="../../img/{{ $item->URL }}" alt="">
                                    </div>
                                    <div class="info">
                                        <p>{{ $item->TenSP }}</p>
                                        <span>{{ number_format($item->Gia, 0) }}<b>đ</b></span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-9 d-flex flex-column justify-content-between">
                    <div class="row">
                        @foreach ($sanpham as $item)
                            <div class="col-md-4 prd">
                                <div class="product_item">
                                    <div class="item__img">
                                        <a href="{{ route('ChiTiet', $item->MaSP) }}">
                                            <img src="../../img/{{ $item->URL }}" alt="">
                                        </a>
                                    </div>
                                    <a href="{{ route('ChiTiet', $item->MaSP) }}">{{ $item->TenSP }}</a>
                                    <span><b class="tien">{{ number_format($item->Gia, 0) }}</b> <b>đ</b></span>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="pagination">
                        <ul class="d-flex align-items-center justify-content-center w-100">
                            @for ($i = 1; $i <= $numberPage; $i++)
                                <li class=" {{ $i == $page ? 'page active' : 'page' }}">
                                    <a href="{{ route('CuaHang', [$maloai, $i]) }}">{{ $i }}</a>
                                </li>
                            @endfor
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
