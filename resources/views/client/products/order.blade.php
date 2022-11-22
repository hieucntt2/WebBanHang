@extends('client.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{asset('css/success.css')}}">
@endsection
@section('content')
    <section class="main mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h4>Chi tiết đơn hàng</h4>
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
                    <div class="title">
                        <p>Phương thức thanh toán: </p>
                        <p>Chuyển khoản ngân hàng</p>
                    </div>
                    <div class="title sum_price_payment">
                        <p>Tổng </p>
                        <span>0 <b>đ</b></span>
                    </div>
                </div>
                <div class="col-md-5 right">
                    <span>Cảm ơn bạn. Đơn hàng của bạn đã được nhận.</span>
                    <button class="green">
                        <a href="{{ route('Trangchu') }}" id="homepage">Trang chủ</a>
                    </button>
                </div>
            </div>
        </div>
    </section>
@endsection
