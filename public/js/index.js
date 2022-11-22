$(document).ready(function () {
    $('.create').click(function () {
        $('.model_content').show();
        $('.model_create').show();
        $('.model_detail').hide();
        $('.model_edit').hide();
    })
    $('.close_model').click(function (e) {
        e.preventDefault();
        $('.model_content').hide();
        $('input').val('');
    })
    $(document).on('click', '.btn_detail', function () {
        $('.model_content').show();
        $('.model_detail').show();
        $('.model_edit').hide();
    })
    $('.btn_edit').click(function () {
        $('.model_content').show();
        $('.model_edit').show();
        $('.model_detail').hide();
    })
    //Loại sản phẩm
    $('.btn_create_productType').click(function (e) {
        e.preventDefault();
        const data = {
            "tenloai": $('#name').val(),
        }
        console.log(data);

        $.ajax({
            url: 'http://127.0.0.1:8000/admin/create-productTypes',
            method: "POST",
            data: data,
            success: function (response) {
                window.location.href = 'http://127.0.0.1:8000/admin/productTypes';
            },
            error: function (response) {
                console.log(response);
            }
        })
    })
    $('.btn_edit_productType').click(function (e) {
        e.preventDefault();
        const data = {
            "tenloai": $('.model_edit #name_productType').val(),
            "id": $('.model_edit #maloai').val(),
        }
        console.log(data);
        $.ajax({
            url: 'http://127.0.0.1:8000/admin/edit-productTypes',
            method: "PUT",
            data: data,
            success: function (response) {
                console.log(response);
                window.location.href = 'http://127.0.0.1:8000/admin/productTypes';
            },
            error: function (response) {
                console.log(response);
            }
        })
    })
    $('.btn_productType_delete').click(function (e) {
        e.preventDefault();
        const data = {
            'id': $(this).parents('td').siblings('td.maloai').text()
        }
        console.log(data);
        if (confirm("Bạn có chắc muốn xóa ?") == true) {
            $.ajax({
                url: 'http://127.0.0.1:8000/admin/delete-productTypes',
                method: "PUT",
                data: data,
                success: function (response) {
                    console.log(response);
                    window.location.href = 'http://127.0.0.1:8000/admin/productTypes';
                },
                error: function (response) {
                    console.log(response);
                }
            })
        }

    })
    $(document).on('click', '.btn_detail', function () {
        $('.model_detail input').addClass('unactive');
        let name = $(this).parents('td').siblings('td#tenloai').text();
        $('.model_detail #name_productType').val(name);
    })
    $('.btn_edit').click(function () {
        let name = $(this).parents('td').siblings('td#tenloai').text();
        let id = $(this).parents('td').siblings('td.maloai').text();
        $('.model_edit #name_productType').val(name);
        $('.model_edit #maloai').val(id);
    })
    //sản phẩm
    $('.btn_create_product').click(function (e) {
        e.preventDefault();
        var formData = new FormData();
        formData.append("tensp",  $('#name-product').val());
        formData.append("maloai",  $('#select-loaisp').val());
        formData.append("giasp",  $('#price-product').val());
        formData.append("soluong",  $('#quantity-product').val());
        formData.append("anhsp",  $('#formFileProduct').prop('files')[0]);

        console.log(formData);
        $.ajax({
            url: 'http://127.0.0.1:8000/admin/create-product',
            method: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                alert('Tạo thành công');
                console.log(response);
                window.location.href = window.location.href;
            },
            error: function (response) {
                alert('Tạo thất bại');
                console.log(response);
            }
        })
    })
    $('.model_btn_edit').click(function (e) {
        e.preventDefault();
        var formData = new FormData();
        formData.append("tensp",  $('.model_edit #name-prod').val());
        formData.append("maloai",  $('.model_edit #type_prod').val());
        formData.append("giasp",  $('.model_edit #price-prod').val());
        formData.append("soluong",  $('.model_edit #quantity-prod').val());
        formData.append("anhsp",  $('.model_edit #formFileProduct').prop('files')[0]);
        console.log(formData);
        $.ajax({
            url: 'http://127.0.0.1:8000/admin/edit-product',
            method: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                alert('Sửa thành công');
                console.log(response);
                window.location.href = window.location.href;
            },
            error: function (response) {
                alert('Sửa thất bại');
                console.log(response);
            }
        })
    })
    $('.btn_product_detail').click(function () {
        var tensp = $(this).parents('td').siblings('td.tensp').text();
        var loaisp = $(this).parents('td').siblings('td.loaisp').text();
        var giasp = $(this).parents('td').siblings('td.giasp').text();
        var soluong = $(this).parents('td').siblings('td.soluong').text();
        $('.model_detail #tensp').val(tensp);
        $('.model_detail #loaisp option:selected').text(loaisp);
        $('.model_detail #giasp').val(giasp);
        $('.model_detail #soluong').val(soluong);
    })
    $('.btn_product_delete').click(function (e) {
        e.preventDefault();
        const data = {
            'id': $(this).parents('td').siblings('td.masp').text()
        }
        if (confirm("Bạn có chắc muốn xóa ?") == true) {
            $.ajax({
                url: 'http://127.0.0.1:8000/admin/delete-product',
                method: "PUT",
                data: data,
                success: function (response) {
                    console.log(response);
                    window.location.href = 'http://127.0.0.1:8000/admin/product';
                },
                error: function (response) {
                    console.log(response);
                }
            })
        }
    })
    //login-register
    $('.btn-login').click(function () {
        let email = $('#floatingInput').val();
        let password = $('#floatingPassword').val();
        var data = {
            'email': email,
            'password': password
        }
        console.log(data);
        $.ajax({
            url: 'http://127.0.0.1:8000/admin/responLogin',
            method: "POST",
            data: data,
            success: function (response) {
                console.log(response);
                window.location.href = 'http://127.0.0.1:8000/admin/product/1';
            },
            error: function (response) {
                console.log(response);
                alert('Đăng nhập thất bại')
            }
        })
    })

    $('.btn-register').click(function () {
        let password = $('#floatingPassword').val();
        let email = $('#floatingInput').val();
        var username = $('#floatingText').val();
        var data = {
            'username': username,
            'email': email,
            'password': password,
        }
        console.log(data);
        $.ajax({
            url: 'http://127.0.0.1:8000/admin/responRegister',
            method: "POST",
            data: data,
            success: function (response) {
                alert('Đăng ký thành công');
                console.log(response);
                window.location.href = 'http://127.0.0.1:8000/admin/login';
            },
            error: function (response) {
                console.log(response);
            }
        })
    })
    //logout
    $('.logout').click(function () {
        window.location.href = 'http://127.0.0.1:8000/admin/logout';
    })
    //orderDetail
    $(document).on('click', '.btn_order_detail', function () {
        let id = $(this).parents('td').siblings('td.madh').text();
        $.ajax({
            url: 'http://127.0.0.1:8000/admin/orderDetail/' + id,
            method: "GET",
            success: function (response) {
                console.log(response);
                $('#orderDetail-body').html('');
                var data = response.detail;
                for (var i = 0; i < data.length; i++) {
                    var elem = `
                                <tr>
                                    <td>${data[i].MaCTDH}</td>
                                    <td>${data[i].TenSP}</td>
                                    <td>${data[i].SoLuong}</td>
                                    <td>${Intl.NumberFormat('en-US').format(data[i].Gia)}</td>
                                </tr>
                            `
                    $('#orderDetail-body').append(elem)
                }
            },
            error: function (response) {
                console.log(response);
            }
        })
    })
    //
    $('.btn-search-product').click(function (e) {
        e.preventDefault();
        var name = $('.search').val();
        var data = {
            'name': name
        }
        console.log(data);
        $.ajax({
            url: 'http://127.0.0.1:8000/admin/product/search',
            method: "POST",
            data: data,
            success: function (response) {
                var data = response.sanpham;
                console.log(data);
                $('#get-item').html('');
                for (var i = 0; i < data.length; i++) {
                    var elem = `
                                <tr>
                                    <td class="masp">${data[i].MaSP}</td>
                                    <td class="tensp">${data[i].TenSP}</td>
                                    <td class="loaisp">${data[i].tenloai}</td>
                                    <td class="giasp">${Intl.NumberFormat('en-US').format(data[i].Gia)}</td>
                                    <td class="soluong">${data[i].SL}</td>
                                    <td class="anhsp"><img src="../../img/${data[i].URL}" alt=""></td>
                                    <td>
                                        <a class="btn btn-sm btn-primary btn_detail btn_product_detail"
                                            href="javascript:void(0)">Detail</a>
                                        <a class="btn btn-sm btn-success btn_edit btn_product_edit"
                                            href="javascript:void(0)">Edit</a>
                                        <a class="btn btn-sm btn-danger btn_delete btn_product_delete"
                                            href="javascript:void(0)">Delete</a>
                                    </td>
                                </tr>`
                    $('#get-item').append(elem);
                }
            },
            error: function (response) {
                console.log(response);
            }
        })
    })
    $('.btn-search-productType').click(function (e) {
        e.preventDefault();
        var name = $('.search').val();
        var data = {
            'name': name
        }
        console.log(data);
        $.ajax({
            url: 'http://127.0.0.1:8000/admin/productTypes/search',
            method: "POST",
            data: data,
            success: function (response) {
                var data = response.loaisp;
                console.log(data);
                $('#get-item').html('');
                for (var i = 0; i < data.length; i++) {
                    var elem = `
                                <tr>
                                    <td class="maloai">${data[i].maloai}</td>
                                    <td id="tenloai">${data[i].tenloai}</td>
                                    <td>${data[i].Time_Create}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary btn_detail" href="javascript:void(0)">Detail</a>
                                        <a class="btn btn-sm btn-success btn_edit" href="javascript:void(0)">Edit</a>
                                        <a class="btn btn-sm btn-danger btn_delete btn_productType_delete" href="javascript:void(0)">Delete</a>
                                    </td>
                                </tr>
                             `
                    $('#get-item').append(elem);
                }
            },
            error: function (response) {
                console.log(response);
            }
        })
    })
    $('.btn-search-image').click(function (e) {
        e.preventDefault();
        var name = $('.search').val();
        var data = {
            'name': name
        }
        console.log(data);
        $.ajax({
            url: 'http://127.0.0.1:8000/admin/image-product/search',
            method: "POST",
            data: data,
            success: function (response) {
                var data = response.anh;
                console.log(data);
                $('#get-item').html('');
                for (var i = 0; i < data.length; i++) {
                    var elem = `
                    <tr>
                    <td>${data[i].MaAnh}</td>
                    <td>${data[i].TenSP}</td>
                    <td><img src="../../img/${data[i].URL}" alt="${data[i].TenSP}"></td>
                    <td>
                        <a class="btn btn-sm btn-primary btn_detail" href="javascript:void(0)">Detail</a>
                        <a class="btn btn-sm btn-success btn_edit" href="javascript:void(0)">Edit</a>
                        <a class="btn btn-sm btn-danger btn_delete" href="javascript:void(0)">Delete</a>
                    </td>
                </tr>
                             `
                    $('#get-item').append(elem);
                }
            },
            error: function (response) {
                console.log(response);
            }
        })
    })
    $('.btn-search-month').click(function (e) {
        e.preventDefault();
        var month = $('#month').val();
        $.ajax({
            url: 'http://127.0.0.1:8000/admin/orderMonth/' + month,
            method: "POST",
            success: function (response) {
                console.log(response);
                var data = response.detail;
                var sum = 0;
                $('#get-element').html('');
                for (var i = 0; i < data.length; i++) {
                    sum += data[i].Money;
                    var elem = `
                                <tr>
                                    <td class="madh">${data[i].MaDH}</td>
                                    <td>${data[i].Time_Create}</td>
                                    <td>${Intl.NumberFormat('en-US').format(data[i].Money)}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary btn_order_detail btn_detail"
                                            href="javascript:void(0)">Detail</a>
                                    </td>
                                </tr>
                                `
                    $('#get-element').append(elem);
                }
                $('#sumMoney').text(Intl.NumberFormat('en-US').format(sum));
            },
            error: function (response) {
                console.log(response);
            }
        })
    })
    $('.btn-search-date').click(function (e) {
        e.preventDefault();
        var date = $('#date').val();
        console.log(date);
        $.ajax({
            url: 'http://127.0.0.1:8000/admin/orderDate/' + date,
            method: "POST",
            success: function (response) {
                console.log(response);
                var data = response.detail;
                var sum = 0;
                $('#get-element').html('');
                for (var i = 0; i < data.length; i++) {
                    sum += data[i].Money;
                    var elem = `
                                <tr>
                                    <td class="madh">${data[i].MaDH}</td>
                                    <td>${data[i].Time_Create}</td>
                                    <td>${Intl.NumberFormat('en-US').format(data[i].Money)}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary btn_order_detail btn_detail"
                                            href="javascript:void(0)">Detail</a>
                                    </td>
                                </tr>
                                `
                    $('#get-element').append(elem);
                }
                $('#sumMoney').text(Intl.NumberFormat('en-US').format(sum));
            },
            error: function (response) {
                console.log(response);
            }
        })
    })
})
