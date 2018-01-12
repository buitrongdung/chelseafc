var errorMessages = {};
var hasError = false;
function isEmailValid()
{
    var error_email = [];
    var emailElm = document.forms['contract']['email'];
    var email = emailElm.value;
    var viTri = email.indexOf("@");
    var dauCham = email.lastIndexOf(".");
    if (email == '') {
        error_email.push('Quý khách chưa nhập email');
        emailElm.focus();
    }
    if ((viTri < 1) || (dauCham < viTri + 2) || (dauCham + 2 >= email.length)) {
        error_email.push('Email của quý khách chưa hợp lệ');
        emailElm.focus();
    }
    if (error_email.length > 0) {
        errorMessages.errorEmail = error_email;
        hasError = true;
    }
}

function checkNumberPhone()
{
    var errorNbPhone = [];
    var phoneElm = document.forms['contract']['phone'];
    var nbPhone = phoneElm.value;
    if (nbPhone == '') {
        errorNbPhone.push('Quý khách vui lòng nhập số điện thoại');
        phoneElm.focus();
    }
    if (isNaN(nbPhone) == true) {
        errorNbPhone.push('Quý khách nhập sai số điện thoại');
        phoneElm.focus();
    }
    if (errorNbPhone.length > 0) {
        errorMessages.errorSDT = errorNbPhone;
        hasError = true;
    }
}

function checkName()
{
    var errorName = [];
    var nameElm = document.forms['contract']['name'];
    var name = nameElm.value;
    if (name == '') {
        errorName.push('Quý khách vui lòng nhập tên');
        nameElm.focus();
    }
    if (errorName.length > 0) {
        errorMessages.errorHoTen = errorName;
        hasError = true;
    }
}

function checkMenu ()
{
    var errorMn = [];
    var rQuestElm = document.forms['contract']['menu'];
    var rQuest = rQuestElm.value;
    if (rQuest == '') {
        errorMn.push('Quý khách vui lòng chon thực đơn');
        rQuestElm.focus();
    }
    if (errorMn.length > 0) {
        errorMessages.errorMenu = errorMn;
        hasError = true;
    }
}

function checkNumTable ()
{
    var errorNumTable = [];
    var vipElm = document.forms['contract']['vip'];
    var noMalElm = document.forms['contract']['noMal'];
    var vip = vipElm.options[vipElm.selectedIndex].value;
    var noMal = noMalElm.options[noMalElm.selectedIndex].value;
    if (vip == '0' && noMal == '0') {
        errorNumTable.push('Quý khách vui lòng đặt bàn');
    }
    if (errorNumTable.length > 0) {
        errorMessages.errorTable = errorNumTable;
        hasError = true;
    }
}


function checkInput()
{
    checkName();
    isEmailValid();
    checkNumberPhone();
    checkMenu();
    checkNumTable();
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