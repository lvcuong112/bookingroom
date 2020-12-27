$(document).ready(function () {
    loginClick();
    registerClick();
    reportClick();
    OKRegisterClick();
})



khai báo dialog đăng nhập
function loginClick() {
    dialog_login = $(".dialog-login").dialog({
        autoOpen: false,
        width: 800,
        height: 500,
        modal: true,
    });
    $('.btn-login').click(function () {
        dialog_login.dialog('open');
    });

};

//khai báo dialog đăng ký
function registerClick() {
     dialog_register = $(".dialog-register").dialog({
        autoOpen: false,
        width: 700,
        modal: true,
    });
    $('.btn-register').click(function () {
        dialog_register.dialog('open');
    });
    $('#cancel-register').click(function () {
        dialog_register.dialog('close');
    });
};



// Dialog Report
function reportClick() {
    dialog_report = $(".dialog-report").dialog({
       autoOpen: false,
       width: 700,
       modal: true,
   });
   $('.btn-report').click(function () {
        dialog_report.dialog('open');
   });
   $('#cancel-report').click(function () {
        dialog_report.dialog('close');
    });

};

