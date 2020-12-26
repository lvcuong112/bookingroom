<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>BookingRoom</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../frontend/slick-1.8.1/slick/slick.css">
    <link rel="stylesheet" href="../frontend/slick-1.8.1/slick/slick-theme.css">
    <link rel="stylesheet" href="../frontend/css/font.css">
    <link rel="stylesheet" href="../frontend/css/layout.css">
    <link rel="stylesheet" href="../frontend/css/index.css">
    <link rel="stylesheet" href="../frontend/css/page.css">

    <link rel="stylesheet" href="../frontend/css/register.css">
    <link rel="stylesheet" href="../frontend/css/report.css">
    <link rel="stylesheet" href="../frontend/lib/jquery-ui-1.12.1.custom/jquery-ui.css">
    <link rel="stylesheet" href="../frontend/lib/jquery-ui-1.12.1.custom/jquery-ui.min.css">
</head>
<body>
@include('frontend.layouts.header')
@yield('content')
@include('frontend.layouts.footer')

<script src="/js/app.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="../frontend/slick-1.8.1/slick/slick.js"></script>


<script type="text/javascript" src="../frontend/lib/jquery-ui-1.12.1.custom/jquery-ui.js" ></script>
<script type="text/javascript" src="../frontend/lib/jquery-ui-1.12.1.custom/jquery-ui.min.js" ></script>
<script type="text/javascript" src="../frontend/js/js.js" ></script>



<script>
    $(document).on('click', '.btn-contact', function(){
        $(window).scrollTop($('body').height());
    });
    fixedHeader();
    customSelect2();
    setSlickImages();
    setSlickFeature();
    function fixedHeader(){
        $(window).scroll(function () {
            if ($(this).scrollTop() > 0) {
                $('header').addClass('fixed');
            } else {
                $('header').removeClass('fixed');
            }
        });
    }
    function customSelect2(){
        $(".select2").select2({
            width: 'resolve'
        });
    }
    function setSlickImages() {
        $(".slick-images").slick({
            dots: false,
            infinite: true,
            autoplay: true,
            speed: 400,
            autoplaySpeed: 5000,
            slidesToShow: 2,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    }
    function setSlickFeature() {
        $(".product-slick").slick({
            dots: false,
            infinite: true,
            autoplay: true,
            speed: 400,
            autoplaySpeed: 5000,
            slidesToShow: 4,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
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
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    }
    function checkPass() {
        let pass = document.getElementById('password').value;
        let rePass = document.getElementById('rePassword').value;
        if (pass != rePass) {
            document.getElementById('checkPass').innerHTML = 'Mật khẩu không trùng khớp';
        }else {
            document.getElementById('checkPass').innerHTML = '';
        }

    }
</script>
</body>
</html>
