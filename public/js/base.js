$(document).ready(function () {
    //active ở menu
    $('header nav  ul li').click(function () {
        $('header ul li').removeClass('active');
        $(this).addClass('active')
    })
    $('.mb_menu  ul li').click(function () {
        $('.mb_menu ul li').removeClass('active');
        $(this).addClass('active')
    })
    //modal search
    $('.icon-search').click(function () {
        $('.modalShow').show();
        $('.modal__search').show();
        $('.modal__login').hide();
        $('.modal__register').hide();
    })
    $('.icon-login').click(function () {
        $('.modalShow').show();
        $('.modal__search').hide();
        $('.modal__login').show();
        $('.modal__register').hide();
    })
    $('.close-search').click(function () {
        $('.modalShow').hide();
    })
    $('.modalShow .overlay').click(function () {
        $('.modalShow').hide();
    })
    $('.btnregis').click(function () {
        $('.modal__search').hide();
        $('.modal__login').hide();
        $('.modal__register').show();
    })
    $('.btnlogin').click(function () {
        $('.modal__search').hide();
        $('.modal__login').show();
        $('.modal__register').hide();
    })
    $('.classify li').click(function () {
        $('.classify li').removeClass('active');
        $(this).addClass('active');
        console.log(1);
    })
    $('.mb_menu .overlay').click(function () {
        $('.mb_menu').hide();
    })
    $('.mb_menu i').click(function () {
        $('.mb_menu').hide();
    })
    $('.mb-menu .icon-menu').click(function () {
        $('.mb_menu').show();
    })
    $('.menu1').click(function () {
        $('.mb-menu2').toggle();
    })
    $('.product__promotion').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 4,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [
            {
                breakpoint: 1400,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 575.98,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }]
    });

    $('.product__promotions').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 4,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [
            {
                breakpoint: 1400,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 575.98,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }]
    });
    $('.brand').slick({
        infinite: true,
        slidesToShow: 6,
        slidesToScroll: 2,
        autoplay: true,
        autoplaySpeed: 1000,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }


            }]
    });
});

const toTop = document.querySelector("#ScrollTop");
window.addEventListener("scroll", () => {
    if (window.pageYOffset > 200) {
        toTop.classList.add("active");
    } else {
        toTop.classList.remove("active");
    }
})
$("#ScrollTop").click(function () {
    window.scrollTo({ top: 0, behavior: 'smooth' });
});

window.addEventListener("scroll", () => {
    if (window.pageYOffset > 200) {
        $('header').addClass('header_scroll')
    } else {
        $('header').removeClass('header_scroll')
    }
})

$('.close').click(function () {
    let parent = $(this).parent();
    parent.remove();
})
$('.tru').click(function () {
    let res = $(this).siblings('.input').val();
    console.log(res);
    if (res > 1) {
        res = parseInt(res) - 1;
    };
    $(this).siblings('.input').val(res);
});
$('.cong').click(function () {
    let res = $(this).siblings('.input').val();
    res = parseInt(res) + 1;
    $(this).siblings('.input').val(res);
});
$('.pagination ul .page ').click(function () {
    $('.pagination ul .page').removeClass('active');
    $(this).addClass('active')
})
//search
$('.price li ').click(function () {
    let val = $(this).attr('value');
    let minPrice = 0;
    let maxPrice = 0;
    if (val == 1) {
    }
    if (val == 1) {
        minPrice = 0;
        maxPrice = 100000;
    }
    if (val == 2) {
        minPrice = 100000;
        maxPrice = 500000;
    }
    if (val == 3) {
        minPrice = 500000;
        maxPrice = Infinity;
    }
    $('.prd').each(function () {
        var price = $(this).children().children().children('.tien').text()
        var lst = price.split(',')
        var src = lst.join('')
        if (src > minPrice && src <= maxPrice) {

        }
        console.log(src);
    })
}
)
$('.tien').click(function () {

})

$(document).ready(function () {
    var indexCurrent = $('.img__slide img.active').attr('index');

    $('.img__slide img').click(function () {
        $('.img__slide img').removeClass('active');
        $(this).addClass('active');
        const src = $(this).attr('src');
        $('.main__img img').attr('src', src);
        indexCurrent = $(this).attr('index');
    });
    function activeImages() {
        $('.img__slide img').each(function () {
            var index = $(this).attr('index');
            if (index == indexCurrent) {
                var src = $(this).attr('src');
                $('.main__img img').attr('src', src);
                $('.img__slide img').removeClass('active');
                $(this).addClass('active');
            }
        })
    }
    $('.left').click(function () {
        indexCurrent--;
        activeImages();
        if (indexCurrent < 1) {
            indexCurrent = 4;
            activeImages();
        }
    })
    $('.right').click(function () {
        indexCurrent++;
        activeImages();
        if (indexCurrent > 4) {
            indexCurrent = 1;
            activeImages();
        }
    });
    $('.prev').click(function (e) {
        //e.preventDefault();
        $('.product__promotions').slick('slickPrev');
    });

    $('.next').click(function (e) {
        //e.preventDefault();
        $('.product__promotions').slick('slickNext');
    });

})
$('.btn_client_lgin').click(function () {
    let email = $('.login__input #email').val();
    let password = $('.login__input #password').val();
    var data = {
        'email': email,
        'password': password
    }
    console.log(data);
    $.ajax({
        url: 'http://127.0.0.1:8000/client/responLogin',
        method: "POST",
        data: data,
        success: function (response) {
            alert('Đăng nhập thành công');
            console.log(response);

            window.location.href = 'http://127.0.0.1:8000';
        },
        error: function (response) {
            console.log(response);
            alert('Đăng nhập thất bại')
        }
    })
})
$('.btn_client_register').click(function () {
    let name = $('.register__input #name').val();
    let email = $('.register__input #email').val();
    let password = $('.register__input #pass').val();
    var phone = $('.register__input #phone').val();
    var address = $('.register__input #address').val();

    var data = {
        'username': name,
        'email': email,
        'password': password,
        'phone': phone,
        'address': address
    }
    console.log(data);
    $.ajax({
        url: 'http://127.0.0.1:8000/client/responRegister',
        method: "POST",
        data: data,
        success: function (response) {
            alert('Đăng ký thành công');
            console.log(response);
            window.location.href = 'http://127.0.0.1:8000';
        },
        error: function (response) {
            console.log(response);
            alert('Đăng ký thất bại')
        }
    })

})
$(document).on('click', '.icon-logout', function () {
    console.log(1);
    window.location.href = 'http://127.0.0.1:8000/client/logout';
})

