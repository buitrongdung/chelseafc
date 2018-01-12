<div align="center">
    <div style="width: 380px;color: white;border: solid 1px #2d79e5;border-radius: 10px 10px 5px 5px;margin-top: 14px;height: 256px;">
        <form name="login" action="" method="POST" onsubmit="return getInfo();" >
            <div style="font-size: 24px;background-color: blue;border-radius: 10px 10px 0 0;">Đăng nhập</div>
            <div class="error" style="margin-top: 6px;margin-bottom: -16px;">
                <?php //echo "$error"; ?>
                <?php //if (isset($errors) && !empty($errors)) : ?>
                <?php //foreach ($errors as $error) : ?>
                <div><?//=$error?></div>
                <?php //endforeach ?>
                <?php //else: ?>
                <?php //endif ?>
            </div>
            <div style="margin-top: 36px">
                <fieldset>
                    <strong>Tên đăng nhập </strong><span class="error">* </span>
                    <label><input name="user" id="idUser" type="text" style="width: 200px" /></label>
                    <div style="padding-left: 63px;padding-bottom: 7px;margin-top: -11px;">
                        <span class="error" id="errorName_msg">
                            <?php echo (isset($errorsLogin['user']) ? $errorsLogin['user'] : '') ?>
                        </span>
                    </div>
                </fieldset>
            </div>
            <div style="padding-left: 35px">
                <fieldset>
                    <strong>Mật khẩu </strong><span class="error">*</span>
                    <label><input name="pass" id="idPass" type="password" style="width: 200px"/></label>
                    <div style=";padding-bottom: 7px;margin-top: -11px;"><span class="error" id="errorPass_msg">
                            <?php echo (isset($errorsLogin['pass']) ? $errorsLogin['pass'] : '') ?>
                        </span>
                    </div>
                </fieldset>
            </div>
            <div style="padding-left: 35px">
                <fieldset>
                    <label style="padding-left: 12px;"><input  type="checkbox" name="checkbox" id="checkbox" value="" />
                        Ghi nhớ mật khẩu</label>
                </fieldset>
            </div>
            <div style="height: 40px">
                <label><input type="submit" name="submit" id="obj_BtnLogin" value="Đăng nhập"
                              style="background-color: rgb(26, 39, 189);border-radius: 15px;width: 120px;height: 42px;font-family:sans-serif;" />
                </label><br>
            </div>
            <div style=" height: 30px; margin-top: 11px;">
                <span style="padding-left: 111px">Bạn chưa có tài khoản </span><a href="">Đăng ký</a><br>
                <a href="/user/facebook"><img src="../../public/img/facebook2.png" style="width: 141px;height: 26px;"></a><br>
                <a href="/user/google"><img src="../../public/img/Google-Login.png" style="width: 143px;height: 26px;border-radius: 12px"></a>
            </div>
        </form>
    </div>
</div>
<br>
