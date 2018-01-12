/**
 * Created by Dzung_cfc on 21-Jun-16.
 */
var errorMessages = {};
var hasError = false;
function isEmailValid() {
    var error_email = [];
    var emailElm = document.forms['taotaikhoan']['email'];
    var email = emailElm.value;
    var viTri = email.indexOf("@");
    var dauCham = email.lastIndexOf(".");
    if (email == '') {
        error_email.push('Bạn chưa nhập email');
        emailElm.focus();
    }
    if ((viTri < 1) || (dauCham < viTri + 2) || (dauCham + 2 >= email.length)) {
        error_email.push('Email không hợp lệ');
        emailElm.focus();
    }
    if (error_email.length > 0) {
        errorMessages.errorEmail = error_email;
        hasError = true;
    }
}
function passwordValid() {
    var errorPass = [];
    var passElm = document.forms['taotaikhoan']['password'];
    var passWord = passElm.value;
    if (passWord == '') {
        errorPass.push('Mật khẩu chưa được nhập');
        passElm.focus();
    }
    if (passWord.length < 6 || passWord.length > 16) {
        errorPass.push('Mật khẩu không hợp lệ');
        passElm.focus();
    }
    if (errorPass.length > 0) {
        errorMessages.errorPassword = errorPass;
        hasError = true;
    } else {
        var rePassElm = document.forms['taotaikhoan']['rePassword'];
        var rePassword = rePassElm.value;
        if (rePassword.length != passWord.length) {
            errorMessages.errorRePass = ['Mật khẩu nhập lại chưa khớp'];
            hasError = true;
        }
    }
}
function checkNumberPhone() {
    var errorNbPhone = [];
    var phoneElm = document.forms['taotaikhoan']['phone'];
    var nbPhone = phoneElm.value;
    if (nbPhone == '') {
        errorNbPhone.push('Bạn chưa nhập số điện thoại');
        phoneElm.focus();
    }
    if (isNaN(nbPhone) == true) {
        errorNbPhone.push('Số điện thoại phải để định dạng số');
        phoneElm.focus();
    }
    if (errorNbPhone.length > 0) {
        errorMessages.errorSDT = errorNbPhone;
        hasError = true;
    }
}
function checkName() {
    var errorName = [];
    var tenElm = document.forms['taotaikhoan']['name'];
    var ten = tenElm.value;
    if (ten == '') {
        errorName.push('Bạn chưa nhập họ tên');
        tenElm.focus();
    }
    if (errorName.length > 0) {
        errorMessages.errorHoTen = errorName;
        hasError = true;
    }
}
function checkUserName() {
    var errorTenDN = [];
    var usNameElm = document.forms['taotaikhoan']['username'];
    var userName = usNameElm.value;
    if (userName == '') {
        errorTenDN.push('Bạn chưa nhập tên đăng nhập');
        usNameElm.focus();
    }
    if (userName < 5 || userName > 15) {
        errorTenDN.push('Tên đăng nhập không hợp lệ');
        usNameElm.focus();
    }
    if (errorTenDN.length > 0) {
        errorMessages.errorUserName = errorTenDN;
        hasError = true;
    }
}
function offButton() {
    var elmNam = document.getElementById('idNam');
    var elmNu = document.getElementById('idNu');
    var checkNam = elmNam.value;
    var checkNu = elmNu.value;
    if (checkNam.checked == true) {
        checkNu = false;
    } else if (checkNu.checked == true) {
        checkNam = false;
    }
}
/*
 function checkDK()
 {
 var errorCheckBox = [];
 var elmTheBox = document.forms['taotaikhoan']['checkBox'];
 var theBox = elmTheBox.value;
 if (theBox.checked == false) {
 errorCheckBox.push('Bạn chưa chọn phần này')
 } else if (theBox.checked == true) {
 errorCheckBox.push('');
 } if (errorCheckBox.length > 0) {
 errorMessages.errorDK = errorCheckBox;
 hasError = true;
 }
 }
 */
function toggle(checked) {
    var elm = document.getElementById('idCheckBox');
    if (checked != elm.checked) {
        elm.click();
    }
}
function checkInput() {
    checkName();
    checkUserName();
    passwordValid();
    isEmailValid();
    checkNumberPhone();
    offButton();
    // checkDK();
    toggle();
    if (hasError) {
        for (var elmId in errorMessages) {
            //vòng lặp duyệt qua từng phần tử trong mảng mà ko cần biết có bao nhiêu phần tử và ở vị trí thứ mấy
            if (errorMessages[elmId] == undefined) {
                console.log(elmId);
                return;
            }
            var messages = errorMessages[elmId];
            var msgString = '';
            for (i = 0; i < messages.length; i++) {
                msgString += '*' + messages[i] + '<br/>';
            }
            document.getElementById(elmId + '_msg').innerHTML = msgString;
            //document.getElementById(elmId).style.border = '1px solid red';
        }
        return false;
    }
    return true;
}