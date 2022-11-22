$(document).ready(function () {
    //        GIỎ HÀNG
    // var giohang = new Array();
    // var str = sessionStorage.getItem('mycart');
    // if (str) {
    //     giohang = JSON.parse(str);
    // }
    countProduct();

    $('#add_product').click(function () {
        addProduct($(this));
        countProduct();
    })
    function addProduct(x) {
        var productItem = x.parents('.row');
        var image = productItem.find('.main__img img').attr('src');
        var price = productItem.find('.price span').text();
        var name = productItem.find('div.product__info  h2').text();
        var idProduct = productItem.find('div.product__info  input').val();
        var soluong = productItem.find('div.quantity  input').val();
        var arrProduct = [];
        var arrPrice = price.split(',');
        price = arrPrice.join('');
        const data = {
            id: idProduct,
            name: name,
            image: image,
            price: price,
            soluong: soluong
        }
        if (!JSON.parse(sessionStorage.getItem('mycart'))) {
            arrProduct.push(data);
        } else {
            arrProduct = JSON.parse(sessionStorage.getItem('mycart'));
            let product = arrProduct.find((item) => {
                return item.id == data.id;
            });
            if (product) {
                product.soluong = parseInt(product.soluong) + parseInt(data.soluong);
            } else {
                arrProduct.push(data);
            }
        }
        sessionStorage.setItem('mycart', JSON.stringify(arrProduct));
        alert('Thêm ' + name + ' thành công !');
        countProduct();
    };
    // show giỏ hàng trang giỏ hàng
    showgiohang()
    function showgiohang() {
        var gh = sessionStorage.getItem('mycart');
        var giohang = JSON.parse(gh);
        var tongtien = 0;
        if (giohang) {
            for (let i = 0; i < giohang.length; i++) {
                var thanhtien = parseFloat(giohang[i].price) * parseFloat(giohang[i].soluong);
                tongtien += thanhtien;
                let item = `<tr class="item-content">
                                <td class="d-flex justify-content-start align-items-center product">
                                    <i class="fa-solid fa-circle-xmark icon-close icon-close-cart" "></i>
                                    <div class="image">
                                        <img src="${giohang[i].image}" alt="">
                                    </div>
                                    <p id="item-name">${giohang[i].name}</p>
                                </td>
                                <td><span>${Intl.NumberFormat('en-US').format(giohang[i].price)}<b>đ</b></span></td>
                                <td>
                                    <div class="quantity d-flex align-items-center">
                                        <span class="tru">-</span>
                                        <input class="input" type="number" value="${giohang[i].soluong}" min="0" data-id="${i}">
                                        <span class="cong">+</span>
                                    </div>
                                </td>
                                <td><span id="moneyCart" data-id="${i}">${Intl.NumberFormat('en-US').format(thanhtien)} <b>đ</b></span></td>
                            </tr>`
                $('#myProduct_item').append(item)

                $('#tongtien').text(Intl.NumberFormat('en-US').format(tongtien) + ' đ');
            }
        }
    }

    $('.icon-close-cart').click(function () {
        xoaSP_giohang($(this));
        countProduct();
    })
    // show cart gio hang
    $('.icon-cart').mouseover(function () {
        var gh = sessionStorage.getItem('mycart');
        var giohang = JSON.parse(gh);
        console.log(giohang.length);
        showCartProduct();
        countProduct();
        if (giohang.length == 0) {
            $('.total span').text(0 + ' đ');
        }
    })
    $(document).on('click', '.icon-cart-model', function () {
        var gh = sessionStorage.getItem('mycart');
        var giohang = JSON.parse(gh);
        xoaSP_giohang($(this));
        if (giohang == null) {
            $('.total span').text(0 + ' đ');
        }
    })
    function countProduct() {
        var gh = sessionStorage.getItem('mycart');
        var giohang = JSON.parse(gh);
        if (giohang) {
            $('#quantity-cart').text(giohang.length);
        }
    }
    // $('.icon-cart-model').click(function () {
    //     console.log(1);
    //     xoaSP_giohang($(this));
    // })
    function showCartProduct() {
        var gh = sessionStorage.getItem('mycart');
        var giohang = JSON.parse(gh);
        var tongtien = 0;
        if (giohang.length != 0) {
            $('.cart-list').html('');
        }
        for (let i = 0; i < giohang.length; i++) {
            var thanhtien = parseFloat(giohang[i].price) * parseFloat(giohang[i].soluong);
            tongtien += thanhtien;
            let item = `  <div class="cart__item d-flex item-content">
                            <div class="cart__item__img">
                                <a href="#">
                                    <img src="${giohang[i].image}" alt="">
                                </a>
                            </div>
                            <div class="cart__info">
                                <a href="#" id="item-name">${giohang[i].name}</a>
                                <div class="cart__quantity d-flex align-items-center">
                                    <p>${giohang[i].soluong}</p>
                                    <p>x</p>
                                    <span>${Intl.NumberFormat('en-US').format(giohang[i].price)}</span>
                                </div>
                            </div>
                            <i class="fa-solid fa-xmark close icon-cart-model"></i>
                        </div>`
            $('.cart-list').append(item)
            $('.total span').text(Intl.NumberFormat('en-US').format(tongtien) + ' đ');
        }
    }
    function xoaSP_giohang(x) {
        var gh = sessionStorage.getItem('mycart');
        var giohang = JSON.parse(gh);
        var parent = x.parents('.item-content');
        parent.remove();
        var tensp = parent.find('#item-name').text();
        for (let i = 0; i < giohang.length; i++) {
            if (giohang[i].name == tensp) {
                giohang.splice(i, 1); // xóa 1 phần tử ở vị trí i
            }
        }
        sessionStorage.setItem('mycart', JSON.stringify(giohang));
        //cập nhật lại giỏ hàng và số lượng
        showCartProduct();
        countProduct();
    }
    //Cập nhật số lượng
    $('.item-content  .tru').click(function () {
        var sl = parseInt($(this).siblings('input').val());
        if (sl == 1) {
            sl = 1;
            return;
        }
        else {
            sl--;
        }
        $(this).siblings('input').val(sl);
    })
    $(' .item-content  .cong').click(function () {
        var sl = parseInt($(this).siblings('input').val());
        sl++;
        $(this).siblings('input').val(sl);
    })
    // CẬP NHẬT GIỎ HÀNG
    $('.update').click(function () {
        updateCart();
    })
    function updateCart() {
        var gh = sessionStorage.getItem('mycart');
        var giohang = JSON.parse(gh);
        var tongtien = 0;
        for (let i = 0; i < giohang.length; i++) {
            var x = parseInt($('.quantity input[data-id="' + i + '"]').val());
            giohang[i].soluong = x;
            var tt = giohang[i].price * giohang[i].soluong;
            tongtien += tt;
            $('#moneyCart[data-id="' + i + '"]').text(Intl.NumberFormat('en-US').format(tt) + " đ");
        }
        $('#tongtien').text(Intl.NumberFormat('en-US').format(tongtien) + " đ");
        sessionStorage.setItem('mycart', JSON.stringify(giohang));
        showcartgiohang();
    }

    // add vào trang thanh toán
    payment();
    function payment() {
        var gh = sessionStorage.getItem('mycart');
        var giohang = JSON.parse(gh);
        var tongtien = 0;
        if (giohang) {
            for (let i = 0; i < giohang.length; i++) {
                var thanhtien = parseFloat(giohang[i].price) * parseFloat(giohang[i].soluong);
                tongtien += thanhtien;
                let item = `
                        <div class="title">
                            <p>${giohang[i].name}<span>x <b>${giohang[i].soluong}</b></span></p>
                            <span>${Intl.NumberFormat('en-US').format(thanhtien)}<b>đ</b></span>
                         </div>`
                $('.payment_list_product').append(item)
            }
        }

        $('.sum_price_payment span').text(Intl.NumberFormat('en-US').format(tongtien) + " đ")
    }


    //update DB : gio hang
    $(document).on('click', '#create-order', function () {
        var gh = sessionStorage.getItem('mycart');
        var giohang = JSON.parse(gh);
        if (giohang) {
            let email = $('input#email').val();
            let name = $('#name').val();
            let phone = $('#phone').val();
            let address = $('#address').val();
            // setup header ajax
            var check = $('#check1').is(':checked');
            const data = {
                'cart': giohang,
                "email": email,
                "phone": phone,
                "name": name,
                "address": address,
                "note": $('#note').val(),
                "method": check ? 'Trả tiền mặt khi nhận hàng' : 'Chuyển khoản ngân hàng'
            }
            // giohang.push(data);
            $.ajax({
                url: 'http://127.0.0.1:8000/create-order',
                method: "POST",
                data: data,
                success: function (response) {
                    window.location.href = 'http://127.0.0.1:8000/order';
                    // sessionStorage.removeItem('mycart');
                },
                error: function (response) {
                    console.log(response);
                }
            })
        }
        else {
            alert('Bạn phải tạo giỏ hàng trước khi thanh toán');
        }

    })
    $('#homepage').click(function () {
        sessionStorage.removeItem('mycart');
    })
    var gh = sessionStorage.getItem('mycart');
    var giohang = JSON.parse(gh);
    if (giohang) {
        $('#quantity-cart').text(giohang.length);
    }
})

