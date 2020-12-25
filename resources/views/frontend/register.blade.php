@extends('frontend.layouts.mainNoBanner')
@section('content')
    <div class="dialog-register" title="Đăng ký tài khoản" >
        <div class="register-content" style="width: 65%;padding: 60px;margin-left: 15%;border: 1px solid #00000026;margin-bottom: 50px;">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="register-body">
                    <div class="register-form">
                        <div class="form1">
                            <div class="form1-left" style="flex: 1;">
                                <div class="input-register-content" id="avatar" >
                                    <div class="dialog-avt-img">
                                        <input type="file" style="width: 65%; margin: 65px 30px;" name="image">
                                    </div>
                                </div>
                            </div>
                            <div class="form1-right" style="flex: 1;">
                                <div class="input-register-content" id ="Email" style="flex: 1;">
                                    <label>Email</label><br>
                                    <input class="register-input" id="inputEmail" type="email" name="email" pattern=".+@.+(\.[a-z]{2,3})" title="Kiểm tra lại định dạng email" required>
                                </div>
                                <div class="input-register-content" id="Password" style="flex: 1;" >
                                    <label>Mật khẩu (<span id="label-required">*</span>)</label><br>
                                    <input class="register-input required" id="password" name="password" type="password" required>
                                </div>
                                <div class="input-register-content" id="Password" style="flex: 1;" >
                                    <label>Nhập lại mật khẩu (<span id="label-required">*</span>)</label><br>
                                    <input class="register-input required" id="rePassword" name="rePassword" type="password" oninput="checkPass()" required>
                                    <span class="" id="checkPass" style="color: red" ></span>
                                </div>
                                <div class="input-register-content" id="Password" style="flex: 1;" >
                                    <label>Đăng kí dưới tư cách là (<span id="label-required">*</span>)</label><br>
                                    <select name="roleId" id="" style="height: 40px; box-sizing: border-box;border: 1px solid #D2D2D2;border-radius: 5px;width: 100%;padding: 0 20px;">
                                        <option value="3"> Khách Hàng </option>
                                        <option value="2"> Chủ Trọ </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form3" >
                            <div class="input-register-content" id="FullName">
                                <label>Họ và tên (<span id="label-required">*</span>)</label><br>
                                <input class="register-input required" id="inputFullName" name="name" type="text" required>
                            </div>
                            <div class="input-register-content" id="DateOfBirth">
                                <label>Ngày sinh (<span id="label-required">*</span>)</label><br>
                                <input class="register-input required" id="inputDateOfBirth" name="birthday" type="date" required>
                            </div>
                            <div class="input-register-content" id="CMND">
                                <label>Số CMND/CCCD (<span id="label-required">*</span>)</label><br>
                                <input class="register-input required" id="inputCMND" type="tel" name="cmnd" pattern="\d{11,12}" title="Vui lòng kiểm tra lại số chứng minh nhân dân" required>
                            </div>
                            <div class="input-register-content" id="PhoneNumber" style="flex: 1;" >
                                <label>Số điện thoại (<span id="label-required">*</span>)</label><br>
                                <input class="register-input required" id="inputPhoneNumber" name="phone" type="tel" pattern="\d{10,11}" title="Vui lòng kiểm tra lại số điện thoại" required>
                            </div>
                            <div class="input-register-content" id="Address" style="flex: 1;">
                                <label>Địa chỉ</label><br>
                                <input class="register-input" id="inputAddress" type="text" name="address" required >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="register-footer">
                    <button type="submit" class="register-button" id="register"><span class="Save-text">Đăng ký</span></button>
                </div>
            </form>
        </div>
    </div>
@endsection
