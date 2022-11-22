@extends('client.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/ThanhToan.css') }}">
@endsection
@section('content')
    <section class="main">
        <div class="container">
            <div class="row">
                <div class="col-md-7 ">
                    <h5>THÔNG TIN THANH TOÁN</h5>
                    <form action="">
                        <div class="input">
                            <label for="">Tên <sup>*</sup></label>
                            <input type="text" id="name"
                                value="{{ Auth::guard('nguoidung')->user() ? Auth::guard('nguoidung')->user()->HoTen : ' ' }}">
                        </div>
                        <div class="input">
                            <label for="">Địa chỉ <sup>*</sup></label>
                            <input type="text" id="address"
                                value="{{ Auth::guard('nguoidung')->user() ? Auth::guard('nguoidung')->user()->DiaChi : ' ' }}">
                        </div>
                        <div class="input">
                            <label for="">Số điện thoại <sup>*</sup></label>
                            <input type="text" id="phone"
                                value="{{ Auth::guard('nguoidung')->user() ? Auth::guard('nguoidung')->user()->SDT : ' ' }}">
                        </div>
                        <div class="input">
                            <label for="">Email <sup>*</sup></label>
                            <input type="email" id="email"
                                value="{{ Auth::guard('nguoidung')->user() ? Auth::guard('nguoidung')->user()->Email : ' ' }}">
                        </div>
                        <div class="input">
                            <label for="">Ghi chú đơn hàng (tuỳ chọn)</label>
                            <textarea name="" id="note" cols="30" rows="7" placeholder="Ghi chú về đơn hàng ..."></textarea>
                        </div>
                    </form>
                </div>
                <div class="col-md-5 info">
                    <h5>ĐƠN HÀNG CỦA BẠN</h5>
                    <div class="title">
                        <h6>SẢN PHẨM</h6>
                        <h6>TỔNG</h6>
                    </div>
                    <div class="payment_list_product">

                    </div>

                    <div class="title">
                        <p>Giao hàng </p>
                        <p>Giao hàng miễn phí</p>
                    </div>
                    <div class="title sum_price_payment">
                        <p>Tổng </p>
                        <span>320,000 <b>đ</b></span>
                    </div>
                    <div class="check">
                        <input type="radio" name="check" id="check1" checked>
                        <label for="check1">Trả tiền mặt khi nhận hàng</label>
                    </div>
                    <div class="check">
                        <input type="radio" name="check" id="check2">
                        <label for="check2">Chuyển khoản ngân hàng</label>
                    </div>
                    <button id="create-order"><a href="#">Đặt hàng</a></button>
                    {{-- {{route('DatHang')}} --}}
                </div>
            </div>
        </div>
    </section>
@endsection
