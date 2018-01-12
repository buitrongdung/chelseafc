/**
 * Created by Dzung_cfc on 20-Jun-16.
 */
var errorMsg = {};
var hasError = false;
function userValid()
{
    var errorUser = [];
    var userElm = document.forms['login']['user'];
    var user = userElm.value;
    if (user == '') {
        errorUser.push('Bạn chưa nhập tên đăng nhập');
        userElm.focus();
    }
    if (errorUser.length > 0) {
        errorMsg.errorName = errorUser;
        hasError = true;
    }
}
function passValid()
{
    var errorPassword = [];
    var passElm = document.forms['login']['pass'];
    var pass = passElm.value;
    if (pass == '') {
        errorPassword.push('Bạn chưa nhập mật khẩu');
        passElm.focus();
    }
    if (errorPassword.length > 0) {
        errorMsg.errorPass = errorPassword;
        hasError = true;
    }
}
/*
function maxacnhanValid()
{
    var errorMaXN = [];
    var maxacnhanELm = document.forms['login']['maxacnhan'];
    var maxacnhan = maxacnhanELm.value;
    if (maxacnhan == '') {
        errorMaXN.push('Bạn chưa nhập mã xác nhận');
        maxacnhanELm.focus();
    } else if (maxacnhan != 4) {
        errorMaXN.push('Mã xác nhận không hợp lệ');
        maxacnhanELm.focus();
    }
    if (errorMaXN.length > 0) {
        errorMsg.errorMXN = errorMaXN;
        hasError = true;
    }
}
*/
function getInfo()
{
    userValid();
    passValid();
    //maxacnhanValid();
    if (hasError) {
        for (var elmId in errorMsg) {
            var msg = errorMsg[elmId];
            var msgString = '';
            for (i = 0; i < msg.length; i++) {
                msgString += '*' + msg[i] + '<br/>';
            }
            document.getElementById(elmId + '_msg').innerHTML = msgString;
        }
        return false;
    }
    return true;
}
//----autologin
/*function AutoLogin(a){
    var obj_Btnlogin = document.getElementById("obj_BtnLogin");
    if(a.keyCode= 13 && chekValid())
    {
        obj_Btnlogin.onclick();
    }
}

//------------Check Valid
/*function chekValid(){
    var yourname = document.getElementById('yourname');
    var password = document.getElementById('password');
    var mabaove = document.getElementById('maxacnhan');

    var valid =true;
    if(yourname.value.trim().length==0){
        valid=false;
        alert('Bạn chưa nhập tên');
        yourname.focus();
    }else if(mabaove.value.trim().length==0){
        valid=false;
        alert('Chưa nhập mã xác nhận');
        mabaove.focus();
    }else if(mabaove.value.trim().length!=4){
        valid=false;
        alert('Mã xác nhận của bạn không hợp lệ');
        mabaove.focus();
    }
    return valid;
}
document.getElementById('yourname').focus();
*/