<!DOCTYPE html>
<html>
<head>
    <title>Booking room - Login</title>
    <link rel="stylesheet" href="../frontend/login.css">
    <link rel="stylesheet" href="../frontend/register.css">
    <link rel="stylesheet" href="../frontend/report.css">
    <link rel="stylesheet" href="../frontend/lib/jquery-ui-1.12.1.custom/jquery-ui.css">
    <link rel="stylesheet" href="../frontend/jquery-ui-1.12.1.custom/jquery-ui.min.css">
</head>
<body>
<h2>Booking room</h2>

<!-- dialog Đăng ký -->
<div class="dialog-register" title="Đăng ký tài khoản" style="display: none">
    <div class="register-content">
        <div class="register-body">
            <div class="register-header">
                <img src="https://grandetest.com/theme/findhouse-html/images/header-logo2.png">
                <div class="logo-name"> Booking Room </div>
            </div>
            <div class="register-form">
                <div class="form1">
                    <div class="form1-left" style="flex: 1;">
                        <div class="input-register-content" id="avatar" >
                            <div class="dialog-avt-img" ></div>
                            <div class="dialog-avt-text" style="text-align: center; font-size: 14px;">Vui lòng chọn ảnh có định dạng<br><b>.jpg .jpeg .png .gif</b></div>
                        </div>
                    </div>
                    <div class="form1-right" style="flex: 1;">
                        <div class="input-register-content" id="FullName">
                            <label>Họ và tên (<span id="label-required">*</span>)</label><br>
                            <input class="register-input required" id="inputFullName" name="required" type="text" />
                        </div>
                        <div class="input-register-content" id="DateOfBirth">
                            <label>Ngày sinh (<span id="label-required">*</span>)</label><br>
                            <input class="register-input required" id="inputDateOfBirth" name="required" type="date" />
                        </div>
                        <div class="input-register-content" id="CMND">
                            <label>Số CMND/CCCD (<span id="label-required">*</span>)</label><br>
                            <input class="register-input required" id="inputCMND" type="number"/>
                        </div>
                    </div>
                </div>
                <div class="form2">
                    <div class="input-register-content" id="PhoneNumber" style="flex: 1;" >
                        <label>Số điện thoại (<span id="label-required">*</span>)</label><br>
                        <input class="register-input required" id="inputPhoneNumber" name="required" type="number" />
                    </div>
                    <div class="input-register-content" id="Password" style="flex: 1;" >
                        <label>Mật khẩu (<span id="label-required">*</span>)</label><br>
                        <input class="register-input required" id="inputPassword" name="required" type="password" />
                    </div>
                </div>
                <div class="form3" >
                    <div class="input-register-content" id ="Email" style="flex: 1;">
                        <label>Email</label><br>
                        <input class="register-input" id="inputEmail" type="email" />
                    </div>
                    <div class="input-register-content" id="Address" style="flex: 1;">
                        <label>Địa chỉ</label><br>
                        <input class="register-input" id="inputAddress" type="text" />
                    </div>
                </div>
            </div>
        </div>
        <div class="register-footer">
            <button class="register-button" id="cancel-register"><span class="Cancel-text">Hủy</span></button>
            <button class="register-button" id="register"><span class="Save-text">Đăng ký</span></button>
        </div>
    </div>
</div>

<!-- kiểm tra trường bắt buộc -->
<script>
    function OKRegisterClick() {
        var okie = true; //chua co loi
        $('#register').click(function () {
            if($('#inputFullName').val() == ""){
                $('#inputFullName').addClass('importain');
                okie = false;
            }
            else if ($('#inputCMND').val() == ""){
                $('#inputCMND').addClass('importain');
                okie = false;
            }
            if (okie) alert('Đăng ký thành công')

        });
    }
</script>

<script type="text/javascript" src="../frontend/jquery-3.5.1.min.js" ></script>
<script type="text/javascript" src="../frontend/jquery-ui-1.12.1.custom/jquery-ui.js" ></script>
<script type="text/javascript" src="../frontend/jquery-ui-1.12.1.custom/jquery-ui.min.js" ></script>
<script type="text/javascript" src="../frontend/js/js.js" ></script>
</body>
</html>
