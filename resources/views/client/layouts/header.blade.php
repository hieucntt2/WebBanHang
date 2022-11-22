<header>
    <div class="container d-flex align-items-center justify-content-between h-100">
        <div class="menu_main d-flex align-items-center justify-content-between">
            <div class="logo">
                <a href="{{ route('Trangchu') }}">cleverfood</a>
            </div>
            <nav class="menu">
                <ul class="d-flex align-items-center ">
                    <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ route('Trangchu') }}">Trang chủ</a>
                    </li>
                    <li class="{{ request()->is('introduce') ? 'active' : '' }}"><a href="{{ route('GioiThieu') }}">Giới
                            thiệu</a></li>
                    <li class="menu1">
                        <a href="{{ route('CuaHang', ['all', 1]) }}">cửa hàng</a>
                        <i class="fa-solid fa-angle-down"></i>
                        <ul class="menu2">
                            @foreach ($loaisp as $item)
                                <li><a href="{{ route('CuaHang', [$item->maloai, 1]) }}">{{ $item->tenloai }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="{{ request()->is('knowledge') ? 'active' : '' }}"><a href="{{ route('KienThuc') }}">kiến
                            thức</a></li>
                    <li class="{{ request()->is('contact') ? 'active' : '' }}"><a href="{{ route('LienHe') }}">Liên
                            hệ</a></li>
                </ul>
            </nav>
            <ul class="header__icon d-flex align-items-center ">
                <li><i class="fa-solid fa-magnifying-glass icon-search"></i></li>
                <li>
                    <i
                        class=" {{ Auth::guard('nguoidung')->user() ? 'fa-solid fa-right-from-bracket icon-logout' : 'fa-solid fa-user icon-login ' }}"></i>
                </li>
                <li id="icon-cart"> <a href="{{ route('GioHang') }}">
                        <i class="fa-solid fa-cart-shopping icon-cart"></i>
                        <span id="quantity-cart">0</span>
                    </a>
                    <div class="cart">
                        {{-- <p>Chưa có sản phẩm nào</p> --}}
                        <div class="cart-list">
                        </div>
                        <div class="total d-flex justify-content-center">
                            <p>Tổng : </p>
                            <span>0 <b>đ</b></span>
                        </div>
                        <button class="green"><a href="{{ route('GioHang') }}">Xem giỏ hàng</a></button>
                        <button class="red"><a href="{{ route('ThanhToan') }}">Thanh toán</a></button>
                    </div>
                </li>
            </ul>
        </div>
        <div class="mb-menu d-flex align-items-center justify-content-between w-100">
            <div class="icon-menu">
                <i class="fa-solid fa-bars"></i>
            </div>
            <div class="logo">
                <a href="{{ route('Trangchu') }}">cleverfood</a>
            </div>
            <ul class="header__icon d-flex align-items-center ">
                <li><i class="fa-solid fa-magnifying-glass icon-search"></i></li>
                <li>
                    {{ Auth::guard('nguoidung')->user() ? '<p>Logout</p>' : '<i class="fa-solid fa-user icon-login"></i>' }}
                </li>
                <li> <a href="{{ route('GioHang') }}">
                        <i class="fa-solid fa-cart-shopping icon-cart"></i>
                    </a>
                    <div class="cart">
                        <p>Chưa có sản phẩm nào</p>
                    </div>
                </li>
            </ul>

        </div>
    </div>
</header>
<div class="modalShow">
    <div class="overlay"></div>
    <div class="modal__search">
        <div class="overlay"></div>
        <input type="text" placeholder="Tìm kiếm...">
        <i class="fa-solid fa-magnifying-glass"></i>
    </div>
    <div class="modal__login">
        <h3>Đăng nhập</h3>
        <div class="login__input">
            <p>Tên tài khoản hoặc địa chỉ email <sup>*</sup></p>
            <input type="text" name="" id="email">
        </div>
        <div class="login__input">
            <p>Mật khẩu <sup>*</sup> </p>
            <input type="password" name="" id="password">
        </div>
        <div class="button d-flex justify-content-start">
            <button class="btnlogin colormain btn_client_lgin">đăng nhập</button>
            <button class="btnregis colorgray">đăng ký</button>
        </div>
        <div class="login__info__desc d-flex ">
            <div class="savePassword ">
                <input type="checkbox" name="" id="">
                <label for="">Ghi nhớ mật khẩu</label>
            </div>
            <a href="#">Quên mật khẩu?</a>
        </div>
    </div>
    <div class="modal__register">
        <h3>Đăng ký</h3>
        <div class="register__input">
            <p>Họ và tên <sup>*</sup></p>
            <input type="text" name="" id="name">
        </div>
        <div class="register__input">
            <p>Tên tài khoản hoặc địa chỉ email <sup>*</sup></p>
            <input type="text" name="" id="email">
        </div>
        <div class="register__input">
            <p>Mật khẩu <sup>*</sup> </p>
            <input type="text" name="" id="pass">
        </div>
        <div class="register__input">
            <p>Nhập lại mật khẩu <sup>*</sup> </p>
            <input type="text" name="" id="enterpass">
        </div>
        <div class="register__input">
            <p>Số điện thoại <sup>*</sup> </p>
            <input type="text" name="" id="phone">
        </div>
        <div class="register__input">
            <p>Địa chỉ <sup>*</sup> </p>
            <input type="text" name="" id="address">
        </div>
        <div class="button d-flex">
            <button class="btnregis colormain btn_client_register">đăng ký</button>
            <button class="btnlogin colorgray">đăng nhập</button>
        </div>
    </div>
    <i class="fa-solid fa-xmark close-search"></i>
</div>
