<header class="Header_tab">
    <div class="container-fluid d-flex justify-content-between align-items-center container-lg">
        <div class="logo d-flex w-100 align-item-center" style="width: 56% !important;">
            <div>
                <a href="/"><img src="https://grandetest.com/theme/findhouse-html/images/header-logo2.png" /></a>
                <span class="ml-2"> EasyAccomod </span>
            </div>
            <div class="box-search d-none ml-5 d-lg-flex align-item-center">
                <input type="text" name="search" placeholder="Tìm kiếm?">
                <button> <i class="fas fa-search"></i> </button>
            </div>

            <button class="d-block showMenu d-lg-none float-right" style="margin: -40px -140px;"> Menu </button>

        </div>
        <nav class="Nav-tar">

            <ul class="menu d-lg-flex m-0">
                <li>
                    <a href="/" > Trang chủ</a>
                </li>
                <li>
                    <a href="{{route('room')}}"> Thuê trọ </a>
                </li>
                <li>
                    <a type="button" class="btn-contact"> Liên hệ </a>
                </li>
                @if(session('customer'))
                    <li>
                        <a href="{{ route('logout') }}">Đăng Xuất</a>
                    </li>
                    <li>
                        <a href="/myaccount"> [{{substr(session('customer'), 0 , 5) }}]</a>
                    </li>
                @elseif(session('owner'))
                    <li>
                        <a href="{{ route('logout') }}">Đăng Xuất</a>
                    </li>
                    <li>
                        <a href="{{ route('owner.room.index') }}"> QL Nhà Trọ </a>
                    </li>
                @else
                    <li id="drop">
                        <button type="button" style="border: none; background-color: white" data-toggle="modal" data-target="#myModal">Đăng Nhập</button>
                    </li>
                    <li id="drop">
                        <button type="button" style="border: none; background-color: white" data-toggle="modal" data-target="#myModalRegister">Đăng ký</button>
                    </li>
                @endif

                <button class="btn-close d-block d-lg-none">
                    Đóng
                </button>
            </ul>
        </nav>
    </div>
</header>
<!-- Modal login-->
<div id="myModalLogin" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 500px;">
        <div class="modal-content" style="padding:20px">
            <form action="{{route('login')}}" method="POST">
                @csrf
                <div class="dialog-login" title="Đăng nhập"  >
                    <div class="login-content">
                        <div class="login-form" style="width: 100%;text-align: left">
                            <div class="login-form-header" style="text-align:left;justify-content: left;">
                                <img src="https://grandetest.com/theme/findhouse-html/images/header-logo2.png">
                                <div class="logo-name"> Booking Room </div>
                            </div>
                            <div class="login-UserName">
                                <input name="username" class="login-input" id="iplgUserName" type="text" placeholder="Tên đăng nhập"  style="width: 100%;"></input>
                            </div>
                            <div class="login-Password">
                                <input name="password" class="login-input" id="iplgPassword" type="password" placeholder="Mật khẩu" style="width: 100%;"></input>
                            </div>
                            <div class="login-button">
                                <button class="login" type="submit">Đăng nhập</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 500px;">
        <div class="modal-content" style="padding: 40px 40px;">
            <div class="dialog-login" title="Đăng nhập"  >
                <div class="login-content">
                    <div class="login-form" style="width: 100%;text-align: left">
                        <div class="login-button">
                            <button class="login" data-toggle="modal" data-target="#myModalLogin" data-dismiss="modal" style="float: left">Tư Cách Khách Hàng</button>
                        </div>
                        <div class="login-button">
                            <a href="/owner"><button class="login" style="float: right">Tư Cách Chủ Trọ</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="myModalRegister" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 500px;">
        <div class="modal-content" style="padding: 40px 40px;">
            <div class="dialog-login" title="Đăng Kí"  >
                <div class="login-content">
                    <div class="login-form" style="width: 100%;text-align: left">
                        <div class="login-button">
                            <a href="/register"><button class="login" style="float: left">Tư Cách Khách Hàng</button></a>
                        </div>
                        <div class="login-button">
                            <a href="/owner/register"><button class="login" style="float: right">Tư Cách Chủ Trọ</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if (session('msg'))
    <div class="pad margin no-print">
        <div class="alert alert-success alert-dismissible" style="" id="thongbao">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Thông báo !</h4>
            {{ session('msg') }}
        </div>
    </div>
@endif
