<footer>
    <div class="desc">
        <h2>Đăng ký để nhận cập nhật</h2>
        <p>______________</p>
        <p>Để lại email để không bỏ lỡ bất kì ưu đãi nào</p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 footer__item">
                <div class="footer__logo">
                    <img src="../img/logo-new.png" alt="">
                </div>
                <p>Nhóm 6 - Thiết kế Web</p>
                <p>123456789</p>
                <p>nchieu2909@gmail.com</p>
            </div>
            <div class="col-md-3 footer__item">
                <h4>menu</h4>
                <ul>
                    <li><a href="{{ route('Trangchu') }}">Trang chủ</a></li>
                    <li><a href="{{ route('GioiThieu') }}">Giới thiệu</a></li>
                    <li><a href="{{ route('CuaHang',['all',1]) }}">Cửa hàng</a></li>
                    <li><a href="{{ route('KienThuc') }}">Kiến thức</a></li>
                    <li><a href="{{ route('LienHe') }}">Liên hệ</a></li>
                </ul>
            </div>
            <div class="col-md-3 footer__item">
                <h4>SẢN PHẨM</h4>
                <ul>
                    @foreach ($loaisp as $item)
                        <li><a href="{{ route('CuaHang',[$item->maloai,1]) }}">{{ $item->tenloai }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-3 footer__item">
                <h4>INSTAGRAM</h4>
                <p>Instagram did not return a 200.</p>
            </div>
        </div>
    </div>
    <div class="info ">
        <p> © Bản quyền thuộc về . Thiết kế website : Nguyễn Chí Hiếu</p>
    </div>
</footer>
