<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
</head>
<body>

@include('frontend.layouts.header')
<section class="banner-page">
    <div class="container">
        <div class="box-title mb-4">
            <h2 class="text-center">  Thuê trọ trên cả nước   </h2>
            <div class="d-flex justify-content-center">
                <p class="m-0 " > Tìm kiếm nhà trọ theo giá cả, khu vực, loại phòng ở mọi nơi </p>
            </div>
        </div>
    </div>
</section>
<section class="rent">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="box-title mb-4">
                    <h2 class="mb-4">  Tìm kiếm phòng trọ   </h2>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="rent-filter">
                    <div class="form-group">
                        <select name="city" id="" class="select2">
                            <option value="0"> Chọn địa điểm </option>
                            <option value="0"> Hà Nội </option>
                            <option value="1"> Hải Phòng</option>
                            <option value="2"> Đà Nẵng </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="typedata" id="" class="select2">
                            <option value="0"> Category </option>
                            <option value="0"> Home stay  </option>
                            <option value="1"> Nhà nghỉ </option>
                            <option value="2"> Khách sạn  </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="typedata" id="" class="select2">
                            <option value="0"> Chỗ để xe </option>
                            <option value="0"> 1   </option>
                            <option value="1"> 2 </option>
                            <option value="2"> Không giới hạn   </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="typedata" id="" class="select2">
                            <option value="0"> Phòng ngủ </option>
                            <option value="0"> 2 </option>
                            <option value="1"> 3 </option>
                            <option value="2"> 4  </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="typedata" id="" class="select2">
                            <option value="0"> Giá thuê / đêm  </option>
                            <option value="0"> Dưới 2 triệu </option>
                            <option value="1"> Từ 2 đến 3 triệu </option>
                            <option value="2"> Trên 3 triệu </option>
                        </select>
                    </div>
                    <div class="form-group mb-0">
                        <button class="search"> Tìm kiếm </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="result-alert d-flex align-items-center justify-content-between">
                    <p class="m-0"> 9 kết quả </p>
                    <div class="sortSelect d-flex align-items-center">
                        <p class="m-0 mr-2"> <strong> Sắp xếp theo:  </strong></p>
                        <div class="form-group m-0">
                            <select name="typedata" id="" class="select2">
                                <option value="0"> Mới nhất   </option>
                                <option value="1"> Nhiều người thuê </option>
                                <option value="2"> Gần nhất   </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row result">
                    <div class="col-md-6">
                        <div class="house-item">
                            <div class="box-img d-flex align-items-center justify-content-center">
                                <img src="https://images.pexels.com/photos/2079249/pexels-photo-2079249.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="Ảnh ngôi nhà">
                                <p class="tab">
                                    <span> Discount</span>
                                </p>
                                <p class="price m-0"> <span> $1000</span></p>
                            </div>
                            <div class="info">
                                <p class="cate"> Homstay </p>
                                <p class="name"> <a href="#"> Ngôi nhà mất lộc</a>  </p>
                                <p class="address"> <i class="fas fa-map-marker-alt mr-2"></i> 42, Yên Hòa, Cầu Giấy</p>
                                <p class="desc">
                                    2 phòng ngủ, 1 phòng khách, có chỗ để ô tô
                                </p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="house-item">
                            <div class="box-img d-flex align-items-center justify-content-center">
                                <img src="https://images.pexels.com/photos/1054974/pexels-photo-1054974.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="Ảnh ngôi nhà">
                                <p class="tab">
                                    <span> Discount</span>
                                </p>
                                <p class="price m-0"> <span> $2000</span> </p>
                            </div>
                            <div class="info">
                                <p class="cate"> Resort </p>
                                <p class="name"> <a href="#"> Luxury Family </a>  </p>
                                <p class="address"> <i class="fas fa-map-marker-alt mr-2"></i> 44, Trần Thái Tông, Cầu Giấy</p>
                                <p class="desc">
                                    3 phòng ngủ, 1 phòng khách
                                </p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="house-item">
                            <div class="box-img d-flex align-items-center justify-content-center">
                                <img src="https://images.pexels.com/photos/584399/living-room-couch-interior-room-584399.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="Ảnh ngôi nhà">
                                <p class="tab">
                                    <span> Discount</span>
                                </p>
                                <p class="price m-0"> <span> $1000</span></p>
                            </div>
                            <div class="info">
                                <p class="cate"> Resort  </p>
                                <p class="name"> <a href="#"> Đẳng cấp 5 sao </a>  </p>
                                <p class="address"> <i class="fas fa-map-marker-alt mr-2"></i> IPH , Xuân Thủy, Cầu Giấy</p>
                                <p class="desc">
                                    Có sân goft
                                </p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="house-item">
                            <div class="box-img d-flex align-items-center justify-content-center">
                                <img src="https://images.pexels.com/photos/2079249/pexels-photo-2079249.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="Ảnh ngôi nhà">
                                <p class="tab">
                                    <span> Discount</span>
                                </p>
                                <p class="price m-0"> <span> $1000</span></p>
                            </div>
                            <div class="info">
                                <p class="cate"> Hotel  </p>
                                <p class="name"> <a href="#"> Khách sạn 6 sao </a>  </p>
                                <p class="address"> <i class="fas fa-map-marker-alt mr-2"></i> 42, Yên Hòa, Cầu Giấy</p>
                                <p class="desc">
                                    2 phòng ngủ, 1 phòng khách, có chỗ để ô tô
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
                <ul class="pagination mt-2 d-flex justify-content-center">
                    <li> 1</li>
                    <li class="active"> 2</li>
                    <li> 3</li>
                    <li> 4</li>
                    <li> 5</li>
                </ul>
            </div>
        </div>
    </div>
</section>
@include('frontend.layouts.footer')

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="slick-1.8.1/slick/slick.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    fixedHeader();
    customSelect2();
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
    $(document).on('click', '.btn-contact', function(){
        $(window).scrollTop($('body').height());
    });
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="../frontend/slick-1.8.1/slick/slick.js"></script>

</body>
</html>

