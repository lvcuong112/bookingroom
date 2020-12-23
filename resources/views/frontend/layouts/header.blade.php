<header>
    <div class="container-fluid d-flex justify-content-between align-items-center container-lg">
        <div class="logo d-flex align-item-center">
            <a href="/Home"><img src="https://grandetest.com/theme/findhouse-html/images/header-logo2.png" /></a>
            <span class="ml-2"> Thuê Trọ </span>
            <div class="box-search ml-5 d-flex align-item-center">
                <input type="text" name="search" placeholder="Tìm kiếm?">
                <button> <i class="fas fa-search"></i> </button>
            </div>
        </div>
        <ul class="menu d-none d-lg-flex m-0">
            <li>
                <a href="/"> Trang chủ</a>
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
                    <a href="/myaccount"> [{{session('customer')}}]</a>
                </li>
            @elseif(session('owner'))
                <li>
                    <a href="{{ route('logout') }}">Đăng Xuất</a>
                </li>
                <li>
                    <a href="{{ route('owner.room.index') }}"> QL Nhà Trọ </a>
                </li>
            @else
                <li>
                    <a href="" data-toggle="modal" data-target="#myModalLogin">Đăng Nhập</a>
                </li>
                <li>
                    <a href="/register"> Đăng ký </a>
                </li>
            @endif
        </ul>

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
    </div>
</header>
@if (session('msg'))
    <div class="pad margin no-print">
        <div class="alert alert-success alert-dismissible" style="" id="thongbao">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Thông báo !</h4>
            {{ session('msg') }}
        </div>
    </div>
@endif
