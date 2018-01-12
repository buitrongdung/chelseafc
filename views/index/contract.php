<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <script type="text/javascript" src="../../public/js/function_contract.js"></script>
    <style> fieldset {border: none;} </style>
</head>
<body>
<div align="center" style="width: 80%;height: auto;margin-left: auto;margin-right: auto;">
    <img src="../../public/img/1434175389-oubvd25d00a2a744a549469b5106267363d0_dtgq.jpg" style="width: 940px;height: 400px;margin-left: -54px;}">
    <div style="border: solid 1px blue;width: 940px;margin-left: -56px;border-radius: 15px 15px 10px 10px;">
        <div style="font-size: 24px;color:white;border-radius: 10px 10px 0 0; text-align: left; background-color: blue;
                border-radius: 10px 10px 0 0;width: 942px;margin-top: -1px;margin-left: -1px;">
            <a style="padding-left: 17px">Liên hệ đặt bàn</a></div>
        <div class="contract" style="width: 380px;color: white;">
            <form id="contract" name='contract' action="" method="POST" style="font-size: 13px" onsubmit="return checkInput();"> <!-- return true ko submit ngược lại return false có submit-->
                <div style="margin-top: 12px">
                    <strong style="margin-left: -80px">
                        Danh xưng        <span style=" color: red">*</span></strong>
                    <label style="margin-left: 8px">
                        <select style="width: 55px;border-radius: 4px" id="title" name="title">
                            <option value="mr">Ông</option>
                            <option value="mrs">Bà</option>
                        </select>
                    </label>
                </div>
                <div>
                    <fieldset>
                        <strong style="padding-left: 88px;">
                            Name        <span style=" color: red">*</span></strong>
                        <label>
                            <input style="width: 200px;float: right;border-radius: 4px;font-family: time;font-style: italic;"
                                   type="text" name="name" id="name" value=""/>
                        </label>
                        <div style="color: red;font-size: 13px;padding-left: 140px;" id="errorHoTen_msg">
                            <?php echo (isset($error['name'])) ? $error['name'] : ''; ?>
                        </div>
                    </fieldset>
                </div>
                <div style="margin-top: -11px">
                    <fieldset>
                        <strong style="padding-left: 87px;">
                            Email          <span style=" color: red">*</span></strong>
                        <label>
                            <input style="width: 200px;float: right;border-radius: 4px;font-family: time;font-style: italic"
                                   type="text" name="email" id="id_email" value="" maxlength="50"/>
                        </label>
                        <div style="color: red;font-size: 13px;padding-left: 140px" id="errorEmail_msg">
                            <?php echo (isset($error['email'])) ? $error['email'] : ''; ?>
                        </div>
                    </fieldset>
                </div>
                <div style="margin-top: -10px">
                    <fieldset>
                        <strong style="padding-left: 48px">
                            Số điện thoại           <span style=" color: red">*</span></strong>
                        <label>
                            <input style="width: 200px;float: right;border-radius: 4px;" type="tel" name="phone" id="idSDT" value=""
                                   maxlength="11"/>
                        </label>
                        <div style="color: red;font-size: 13px;padding-left: 148px" id="errorSDT_msg">
                            <?php echo (isset($error['phone'])) ? $error['phone'] : ''; ?>
                        </div>
                    </fieldset>
                </div>
                <div style="margin-top: -6px;">
                    <strong style="margin-left: -28px">
                        Ngày đặt             <span style=" color: red">*</span></strong>
                    <label>
                        <input type="text" size="30" maxlength="30" value="12/08/2016" name="daySet" id="daySet" style="width: 90px;border-radius: 4px;margin-left: 10px;margin-bottom: 4px">
                    </label><br>
                    <label style="margin-left: 86px">
                        <select style="width: 44px;border-radius: 4px;" id="hours" name="hours">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </label>
                    <label style="">
                        <select style="width: 44px;border-radius: 4px" id="minute" name="minute">
                            <option value="00">00</option>
                            <option value="15">15</option>
                            <option value="30">30</option>
                            <option value="45">45</option>
                        </select>
                    </label>
                    <label style="">
                        <select style="width: 44px;border-radius: 4px" id="day" name="day">
                            <option value="AM">AM</option>
                            <option value="PM">PM</option>
                        </select>
                    </label>
                    <div style="color: red;font-size: 13px;padding-left: 123px" id="errorDaySet_msg">
                        <?php echo (isset($error['errorDaySet'])) ? $error['errorDaySet'] : ''; ?>
                    </div>
                </div>
                <div>
                    <fieldset>
                        <div>
                            <strong style="padding-left: 42px">
                                Số bàn đặt          <span style=" color: red">*</span></strong>
                            <strong style="padding-right: 11px;padding-left: 19px;">
                                Thường          </strong>
                            <label style="padding-right: 63px">
                                <select style="width: 44px;border-radius: 4px" id="idNoMal" name="noMal">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </label><br>
                        </div>
                        <div style="margin-top: 4px;">
                            <strong style="padding-left: 71px">
                                Vip             </strong>
                            <label style="padding-left: 35px">
                                <select style="width: 44px;border-radius: 4px" id="vip" name="vip">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </label>
                        </div>
                        <div style="color: red;font-size: 13px;padding-left: 123px" id="errorTable_msg">
                            <?php echo (isset($error['table'])) ? $error['table'] : ''; ?>
                        </div>
                    </fieldset>
                </div>
                <div style="margin-top: -11px">
                    <fieldset>
                        <strong style="padding-right: 139px">
                            Thực đơn            <span style=" color: red">*</span></strong><br>
                        <label>
                            <textarea name="menu" placeholder="Chọn món ăn" style="width: 200px;float: right;border-radius: 4px;font-family: TimeNewRoman;font-style: italic;" cols="30"></textarea>
                        </label>
                        <div style="color: red;font-size: 13px;padding-left: 140px" id="errorMenu_msg">
                            <?php echo (isset($error['menu'])) ? $error['menu'] : ''; ?>
                        </div>
                    </fieldset>
                </div>
                <div style="margin-top: -11px">
                    <fieldset>
                        <strong style="padding-right: 152px">
                            Yêu cầu khác            </strong><br>
                        <label>
                            <textarea name="request" style="width: 200px;float: right;border-radius: 4px;font-family: TimeNewRoman;font-style: italic;" cols="30"></textarea>
                        </label>
                        <div style="color: red;font-size: 13px;padding-left: 123px" id="errorReQ_msg">
                            <?php echo (isset($error['request'])) ? $error['request'] : ''; ?>
                        </div>
                    </fieldset>
                </div>
                <div style="padding-left: 86px">
                    <input style="background-color: rgb(26, 39, 189);border-radius: 15px;width: 68px;height: 32px;font-family: time;color: white;font-size: 16px;"
                           type="submit" name="submit" value="Liên hệ"/>
                    <input style="border-radius: 15px;width: 68px;height: 32px;font-family: time;color: black;font-size: 16px;"
                           type="reset" name="refresh" value="Làm lại"/>
                </div>
            </form>
        </div>
        <div style="margin-top: 17px;width:50%;">
            <div style="font-size: 24px;color:white;text-align: left; background-color: blue;
                width: 942px;margin-bottom: 9px;margin-left: -236px;">
                <a style="padding-left: 17px">Địa chỉ liên hệ</a></div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15675.147249854535!2d106.6939804!3d10.82762035!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcef95dce1fbe08e2!2zxJBhzKNpIEhvzKNjIEPDtG5nIE5naGnDqsyjcCBUUEhDTQ!5e0!3m2!1svi!2s!4v1470802067617"
                    width="600" height="300" frameborder="0" style="border:0;margin-left: -62px" allowfullscreen>
            </iframe>
        </div>
    </div>
</div>
<br>
