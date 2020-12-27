<template>
    <div class="container">
        <div class="dialog-register" title="Thông Tin Tài Khoản" >
            <div class="register-content" style="width: 65%;padding: 60px;margin-left: 15%;border: 1px solid #00000026;margin-bottom: 50px;">
                <div class="register-body">
                    <div class="register-form" :key="data.id" v-for="(data,index) in accountData">
                        <div class="form1">
                            <div class="form1-left" style="flex: 1;">
                                <div class="input-register-content" id="avatar" >
                                    <div class="dialog-avt-img">
                                        <input type="file" style="width: 65%; margin: 65px 30px;" name="image" :value="data.image">
                                    </div>
                                </div>
                            </div>
                            <div class="form1-right">
<!--                                đổi mk-->
                                <div id="myModalChangePass" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content" style="padding:20px">
                                            <form action="/repassword" method="get">
                                                <div class="dialog-login" title="Đăng nhập"  >
                                                    <div class="login-content">
                                                        <div class="login-form" style="width: 100%;text-align: left">
                                                            <div class="login-form-header" style="text-align:left;justify-content: left;">
                                                                <img src="https://grandetest.com/theme/findhouse-html/images/header-logo2.png">
                                                                <div class="logo-name"> Booking Room </div>
                                                            </div>
                                                            <div class="login-UserName">
                                                                <input name="password" class="login-input" id="iplgUserName" type="password" placeholder="Nhập mật khẩu cũ của bạn"  style="width: 100%;" require></input>
                                                            </div>
                                                            <div class="login-Password">
                                                                <input v-model="rePassword.newPassword" name="newPassword" class="login-input" id="iplgPassword" type="password" placeholder="Nhập mật khẩu mới" style="width: 100%;" require></input>
                                                            </div>
                                                            <div class="login-Password">
                                                                <input v-model="rePassword.reNewPassword" name="reNewPassword" class="login-input" id="iplgPassword" type="password" placeholder="Nhập lại mật khẩu mới" style="width: 100%;" @change="checkPass" require></input>
                                                                <span style="color: red"> {{ rePassword.notice }} </span>
                                                            </div>
                                                            <div class="login-button">
                                                                <button class="login" type="submit">Đổi MK</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="register-footer" style="height: 100%;">
                                    <button type="submit" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalChangePass">Đổi Mật Khẩu</button>
                                    <a href="/likeRoom" class="btn btn-info btn-lg" id="register" style="margin-left: 10px; width: 60%;">
                                        <span class="Save-text"> Những Phòng Đã Thích</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="form3" >
                            <div class="input-register-content" id ="Email" style="flex: 1;">
                                <label>Email</label><br>
                                <input class="register-input" id="inputEmail" type="email" name="email" :value="data.email" readonly>
                            </div>
                            <div class="input-register-content" id="FullName">
                                <label>Họ và tên (<span id="label-required">*</span>)</label><br>
                                <input class="register-input required" id="inputFullName" name="name" type="text" :value="data.name" readonly>
                            </div>
                            <div class="input-register-content" id="DateOfBirth">
                                <label>Ngày sinh (<span id="label-required">*</span>)</label><br>
                                <input class="register-input required" id="inputDateOfBirth" name="birthday" type="date" :value="data.birthday" readonly>
                            </div>
                            <div class="input-register-content" id="CMND">
                                <label>Số CMND/CCCD (<span id="label-required">*</span>)</label><br>
                                <input class="register-input required" id="inputCMND" type="tel" name="cmnd" pattern="\d{11,12}" title="Vui lòng kiểm tra lại số chứng minh nhân dân" :value="data.CMND" readonly>
                            </div>
                            <div class="input-register-content" id="PhoneNumber" style="flex: 1;" >
                                <label>Số điện thoại (<span id="label-required">*</span>)</label><br>
                                <input class="register-input required" id="inputPhoneNumber" name="phone" type="tel" pattern="\d{10,11}" title="Vui lòng kiểm tra lại số điện thoại" :value="data.phone" readonly>
                            </div>
                            <div class="input-register-content" id="Address" style="flex: 1;">
                                <label>Địa chỉ</label><br>
                                <input class="register-input" id="inputAddress" type="text" name="address" :value="data.address" readonly >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "myaccount",

    data() {
        return {
            accountData: [],
            rePassword: {
                'newPassword': null,
                'reNewPassword': null,
                'notice': null
            },
        }
    },
    created() {
        this.getAccountData();
    },
    methods: {
        getAccountData() {
            axios.get('/accountApi').then((res) => {
                if (res.status === 200) {
                    this.accountData = res.data;
                }
            }).catch(() => {
                console.log(err);
            })
        },
        checkPass() {
            if (this.rePassword.reNewPassword != this.rePassword.newPassword) {
                this.rePassword.notice = "Mật khẩu nhập lại chưa đúng";
            }else {
                this.rePassword.notice = "";
            }
        }
    }
};
</script>


