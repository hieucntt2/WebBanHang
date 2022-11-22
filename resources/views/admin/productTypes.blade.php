@extends('admin.layouts.app')
@section('content')
    <div class="content">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
            <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
            </a>
            <a href="#" class="sidebar-toggler flex-shrink-0">
                <i class="fa fa-bars"></i>
            </a>
            <form class="d-none d-md-flex ms-4">
                <input class="form-control border-0 search" type="search" placeholder="Search">
                <button class="btn btn-primary btn-search-productType" style="margin-left: 2rem;">Search</button>
            </form>
            <div class="navbar-nav align-items-center ms-auto">
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fa fa-envelope me-lg-2"></i>
                        <span class="d-none d-lg-inline-flex">Message</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                        <a href="#" class="dropdown-item">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle" src="img/user.jpg" alt=""
                                    style="width: 40px; height: 40px;">
                                <div class="ms-2">
                                    <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                    <small>15 minutes ago</small>
                                </div>
                            </div>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle" src="img/user.jpg" alt=""
                                    style="width: 40px; height: 40px;">
                                <div class="ms-2">
                                    <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                    <small>15 minutes ago</small>
                                </div>
                            </div>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle" src="img/user.jpg" alt=""
                                    style="width: 40px; height: 40px;">
                                <div class="ms-2">
                                    <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                    <small>15 minutes ago</small>
                                </div>
                            </div>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item text-center">See all message</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fa fa-bell me-lg-2"></i>
                        <span class="d-none d-lg-inline-flex">Notificatin</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                        <a href="#" class="dropdown-item">
                            <h6 class="fw-normal mb-0">Profile updated</h6>
                            <small>15 minutes ago</small>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item">
                            <h6 class="fw-normal mb-0">New user added</h6>
                            <small>15 minutes ago</small>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item">
                            <h6 class="fw-normal mb-0">Password changed</h6>
                            <small>15 minutes ago</small>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item text-center">See all notifications</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <img class="rounded-circle me-lg-2" src="../img/50.webp" alt=""
                        style="width: 40px; height: 40px;">
                        <span class="d-none d-lg-inline-flex">{{ Auth::guard('nguoidung')->user()->HoTen }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                        <a href="#" class="dropdown-item">My Profile</a>
                        <a href="#" class="dropdown-item">Settings</a>
                        <a href="#" class="dropdown-item logout">Log Out</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->


        <!-- Table Start -->
        <!-- Recent Sales Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="bg-light text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Danh sách loại sản phẩm</h6>
                    <button class="btn btn-sm btn-primary create">Thêm mới</button>
                </div>
                <div class="table-responsive">
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                            <tr class="text-dark">
                                <th scope="col">Mã loại</th>
                                <th scope="col">Tên loại</th>
                                <th scope="col">Ngày tạo</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="get-item">
                            @foreach ($loaisp as $item)
                            <tr>
                                <td class="maloai">{{$item->maloai}}</td>
                                <td id="tenloai">{{$item->tenloai}}</td>
                                <td>{{$item->Time_Create}}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary btn_detail" href="javascript:void(0)">Detail</a>
                                    <a class="btn btn-sm btn-success btn_edit" href="javascript:void(0)">Edit</a>
                                    <a class="btn btn-sm btn-danger btn_delete btn_productType_delete" href="javascript:void(0)">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- <div class="pagination">
            <ul class="d-flex align-items-center justify-content-center w-100">
                @for ($i = 1; $i <= $numberPage; $i++)
                    <li class=" {{ $i == $page ? 'page active' : 'page' }}">
                        <a href="{{ route('Products', $i) }}">{{ $i }}</a>
                    </li>
                @endfor
            </ul>
        </div> --}}
        <!-- Recent Sales End -->
        <!-- Table End -->
        <!-- Footer Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="bg-light rounded-top p-4">
                <div class="row">
                    <div class="col-12 col-sm-6 text-center text-sm-start">
                        &copy; <a href="#">Nguyễn Chí Hiếu-CNTT2-K60</a>, All Right Reserved.
                    </div>
                    <div class="col-12 col-sm-6 text-center text-sm-end">
                        Designed By <a href="">Nguyễn Chí Hiếu</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
    </div>
    <div class="model_content">
        <div class="overlay"></div>
        <div class="model_create">
            <div class="row">
                <div class="col-sm-12 col-xl-12">
                    <div class="bg-light rounded h-100 p-4">
                        <h4 class="mb-4">Thêm mới</h4>
                        <form>
                            <div class="mb-3">
                                <label for="name" class="form-label">Tên loại sản phẩm </label>
                                <input type="" class="form-control" id="name"
                                    aria-describedby="emailHelp">
                            </div>
                            <button type="submit" class="btn btn-primary btn_create_productType">Thêm</button>
                            <button class="btn btn-danger close_model">Hủy</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="model_detail">
            <div class="row">
                <div class="col-sm-12 col-xl-12">
                    <div class="bg-light rounded h-100 p-4">
                        <h4 class="mb-4">Thông tin loại sản phẩm</h4>
                        <form>
                            <div class="mb-3">
                                <label for="name_productType" class="form-label">Tên loại sản phẩm </label>
                                <input type="" class="form-control" id="name_productType"
                                    aria-describedby="emailHelp" >
                            </div>
                            <button class="btn btn-danger close_model">Hủy</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="model_edit">
            <div class="row">
                <div class="col-sm-12 col-xl-12">
                    <div class="bg-light rounded h-100 p-4">
                        <h4 class="mb-4">Sửa thông tin</h4>
                        <form>
                            <div class="mb-3">
                                <label for="name_productType" class="form-label">Tên loại sản phẩm </label>
                                <input type="" class="form-control" id="name_productType"
                                    aria-describedby="emailHelp">
                                    <input type="text" id="maloai" hidden>
                            </div>
                            <button type="submit" class="btn btn-primary model_btn_edit btn_edit_productType">Sửa</button>
                            <button class="btn btn-danger close_model">Hủy</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
