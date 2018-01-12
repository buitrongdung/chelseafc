
<div align="center">
    <div class="formDangKy" style="width: 380px;color: white;">
        <?php// if (isset($errors) && !empty($errors)) : ?>
            <?php// foreach ($errors as $error) : ?>
                <div><?//=$error?></div>
            <?php// endforeach ?>
            <?php// else: ?>
        <?php// endif ?>
        <form id="taotaikhoan" name='taotaikhoan' action="" method="POST" onsubmit="return checkInput();"> <!-- return true ko submit ngược lại return false có submit-->
            <div style="font-size: 24px; background-color: blue; width: 278%; margin-left: -351px;
                    border-radius: 10px 10px 0 0; text-align: left; padding-left: 24px;">Đăng ký</div>
            <div style="margin-top: 12px">
                <fieldset>
                    <strong style="padding-left: 63px;">Họ và tên <span style=" color: red">*</span></strong>
                    <label>
                        <input class="form-control"
                               type="text" name="name" id="idName" value=""/>
                    </label>
                    <div style="color: red;font-size: 13px;padding-left: 123px;" id="errorHoTen_msg">
                        <?php echo (isset($error['name'])) ? $error['name'] : ''; ?>
                        <!-- chưa khai báo cần kiểm tra xem isset($error['ho']) có hay ko nếu có thì trả về '' -->
                    </div>
                </fieldset>
            </div>
            <div>
                <fieldset>
                    <strong style="padding-left: 24px">Tên đăng nhập <span style=" color: red">*</span></strong>
                    <label><input class="form-control"
                                  type="text" name="username" id="idUserName" value="" maxlength="15"/></label>
                    <div style="color: red;font-size: 13px;padding-left: 123px" id="errorUserName_msg">
                        <?php echo (isset($error['username']) ? $error['username'] : ''); ?>
                    </div>
                </fieldset>
            </div>
            <div>
                <fieldset>
                    <strong style="padding-left: 62px">Mật khẩu <span style=" color: red">*</span></strong>
                    <label>
                        <input class="form-control" type="password" name="password" id="idPassword"
                               value=""
                               maxlength="16"/>
                    </label>
                    <div style="color: red;font-size: 13px;padding-left: 123px" id="errorPassword_msg">
                        <?php echo (isset($error['password']) ? $error['password'] : ''); ?>
                    </div>
                </fieldset>
            </div>
            <div>
                <fieldset>
                    <strong>Nhập lại mật khẩu <span style=" color: red">*</span></strong>
                    <label>
                        <input class="form-control" type="password" name="rePassword" id="idRePass"
                               value=""/>
                    </label>
                    <div style="color: red;font-size: 13px;padding-left: 123px" id="errorRePass_msg">
                        <?php echo (isset($error['rePassword']) ? $error['rePassword'] : ''); ?>
                    </div>
                </fieldset>
            </div>
            <div>
                <fieldset>
                    <strong style="padding-left: 87px">Email <span style=" color: red">*</span></strong>
                    <label>
                        <input class="form-control" type="text" name="email" id="id_email" value=""
                               maxlength="50"/>
                    </label>
                    <div style="color: red;font-size: 13px;padding-left: 123px" id="errorEmail_msg">
                        <?php echo (isset($error['email']) ? $error['email'] : ''); ?>
                    </div>
                </fieldset>
            </div>
            <div>
                <fieldset>
                    <strong style="padding-left: 38px">Số điện thoại </strong><span style=" color: red">*</span>
                    <label>
                        <input class="form-control" type="tel" name="phone" id="idSDT" value=""
                               maxlength="11"/>
                    </label>
                    <div style="color: red;font-size: 13px;padding-left: 123px" id="errorSDT_msg">
                        <?php echo (isset($error['phone']) ? $error['phone'] : ''); ?>
                    </div>
                </fieldset>
            </div>
            <div>
                <fieldset>
                    <strong style="float: left; padding-left: 70px;"> Giới tính </strong>
                    <span style=" color: red;float: left;padding-left: 5px;">*</span>
                    <label style="float: left; padding-left: 5px;">
                        <input type="radio" name="gioiTinh" id="idNam" value="nam" checked/>Nam
                        <input type="radio" name="gioiTinh" id="idNu" value="nu"/>Nữ
                    </label>
                </fieldset>
            </div>
            <div>
                <fieldset>
                    <strong style="padding-left: 45px">Sinh nhật</strong>
                    <label>
                        <select style="float: right;width: 63px" id="idYear" name="birthday">
                            <option value="0" disabled="disabled">Năm</option>
                            <option value="1990">1990</option>
                            <option value="1991">1991</option>
                            <option value="1992">1992</option>
                            <option value="1993">1993</option>
                            <option value="1994">1994</option>
                            <option value="1995">1995</option>
                            <option value="1996">1996</option>
                            <option value="1997">1997</option>
                            <option value="1998">1998</option>
                            <option value="1999">1999</option>
                            <option value="2000">2000</option>
                            <option value="2001">2001</option>
                        </select>
                        <select style="width: 70px;float: right" id="idThang" name="birthday">
                            <option value="0" disabled="disabled">Tháng</option>
                            <option value="01">Tháng 1</option>
                            <option value="02">Tháng 2</option>
                            <option value="03">Tháng 3</option>
                            <option value="04">Tháng 4</option>
                            <option value="05">Tháng 5</option>
                            <option value="06">Tháng 6</option>
                            <option value="07">Tháng 7</option>
                            <option value="08">Tháng 8</option>
                            <option value="09">Tháng 9</option>
                            <option value="10">Tháng 10</option>
                            <option value="11">Tháng 11</option>
                            <option value="12">Tháng 12</option>
                        </select>
                        <select style="float: right" name="birthday" id="day">
                            <option value="0" disabled="disabled">Ngày</option>
                            <option value="ngay1">Ngày 1</option>
                            <option value="ngay2">Ngày 2</option>
                            <option value="ngay3">Ngày 3</option>
                            <option value="ngay4">Ngày 4</option>
                            <option value="ngay5">Ngày 5</option>
                            <option value="ngay6">Ngày 6</option>
                            <option value="ngay7">Ngày 7</option>
                            <option value="ngay8">Ngày 8</option>
                            <option value="ngay9">Ngày 9</option>
                            <option value="ngay10">Ngày 10</option>
                            <option value="ngay11">Ngày 11</option>
                            <option value="ngay12">Ngày 12</option>
                            <option value="ngay13">Ngày 13</option>
                            <option value="ngay14">Ngày 14</option>
                            <option value="ngay15">Ngày 15</option>
                            <option value="ngay16">Ngày 16</option>
                            <option value="ngay17">Ngày 17</option>
                            <option value="ngay18">Ngày 18</option>
                            <option value="ngay19">Ngày 19</option>
                            <option value="ngay20">Ngày 20</option>
                            <option value="ngay21">Ngày 21</option>
                            <option value="ngay22">Ngày 22</option>
                            <option value="ngay23">Ngày 23</option>
                            <option value="ngay24">Ngày 24</option>
                            <option value="ngay25">Ngày 25</option>
                            <option value="ngay26">Ngày 26</option>
                            <option value="ngay27">Ngày 27</option>
                            <option value="ngay28">Ngày 28</option>
                            <option value="ngay29">Ngày 29</option>
                            <option value="ngay30">Ngày 30</option>
                            <option value="ngay31">Ngày 31</option>
                        </select>
                    </label>
                </fieldset>
            </div>
            <div>
                <fieldset>
                    <strong style="float: left; padding-left: 70px;">Địa chỉ</strong>
                    <label>
                        <textarea name="address" class="form-control" ></textarea>
                    </label>
                </fieldset>
            </div>
            <div style="padding-left: 105px">
                <fieldset>
                    <label>
                        <input type="checkbox" value="" name="checkBox" id="idCheckBox" onclick=""/>
                        <span style=" color: red">* </span>
                        Tôi đồng ý với<span style="text-decoration: none"><a href="#" style="text-decoration: none"> Các điều khoản</a></span>
                    </label>
                    <div style="color: red" id="errorDK_msg"></div>
                </fieldset>
            </div>
            <div>
                <input style="background-color: rgb(26, 39, 189);border-radius: 15px;width: 120px;height: 42px;font-family:sans-serif;"
                       type="submit" name="submit" value="Đăng ký"/>
            </div>
        </form>
    </div>
</div>
<br>
