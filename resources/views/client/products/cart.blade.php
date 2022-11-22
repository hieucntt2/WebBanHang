@extends('client.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{asset('css/GioHang.css')}}">
@endsection
@section('content')
    <section class="main">
        <div class="container">

            <!-- Nếu chưa có sản phẩm nào thì sẽ hiện như sau -->
            {{-- <div class="no-product">
                <p>Chưa có sản phẩm nào trong giỏ hàng.</p>
                <a href="{{ route('CuaHang',['all',1]) }}">quay trở lại cửa hàng</a>
            </div> --}}
            <div class="row justify-content-between mt-5">
                <div class="col-md-7 list-product ">
                    <table class="w-100  ">
                        <thead>
                            <tr>
                                <th>sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng</th>
                            </tr>
                        </thead>
                        <tbody id="myProduct_item">

                        </tbody>
                    </table>
                    <div class="button">
                        <a class="back" href="{{ route('CuaHang',['all',1]) }}">Tiếp tục xem sản phẩm</a>
                        <a class="update" href="#">Cập nhật giỏ hàng</a>
                    </div>
                </div>
                <div class="col-md-4 payment">
                    <h5>Chi tiết đơn hàng</h5>
                    <div class="total d-flex justify-content-between">
                        <p>Tổng tiền phải thanh toán : </p>
                        <span id="tongtien">0 </span>
                    </div>
                    <div class="giaohang">
                        <p>Giao hàng miễn phí</p>
                        <span>Đây chỉ là ước tính. Giá sẽ cập nhật trong quá trình thanh toán</span>
                    </div>
                    <a href="{{ route('ThanhToan') }}">Tiến hành thanh toán</a>
                </div>
            </div>
        </div>
    </section>
@endsection
