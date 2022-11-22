<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>ADMIN</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="../../img/50.webp" alt="" style="width: 40px; height: 40px;">
                <div
                    class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                </div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{ Auth::guard('nguoidung')->user()->HoTen }}</h6>
                <span>Admin</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="index.html" class="nav-item nav-link"><i
                    class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fa fa-laptop me-2"></i>Quản lý</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('ProductsType') }}" class="dropdown-item">Loại Sản phẩm</a>
                    <a href="{{ route('Products',1) }}" class="dropdown-item">Sản phẩm</a>
                    <a href="{{ route('ImageProducts',1) }}" class="dropdown-item">Ảnh Sản phẩm</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                    class="far fa-file-alt me-2"></i>Thống kê</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('OrderProductsDate') }}" class="dropdown-item">Doanh thu theo ngày</a>
                    <a href="{{ route('OrderProductsMonth') }}" class="dropdown-item">Doanh thu theo tháng</a>
                </div>
            </div>
        </div>
    </nav>
</div>
