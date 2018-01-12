<?php
/**
 * Created by PhpStorm.
 * User: Welcome
 * Date: 1/11/2018
 * Time: 11:41 AM
 */


class AutoJobController extends AbsController
{
    public function GenAction()
    {
        $data['a'] = '';
        $this->render('admin/gen_html/index', $data);
    }

    public function Gen_HtmlAction()
    {
        $data['a'] = '';
        $this->render('admin/gen_html/index', $data);
    }

    public function SendEmailAction ()
    {
        global $EMAIL_SERVER_SMTP_HOST, $EMAIL_SERVER_SMTP_PORT, $EMAIL_SERVER_SMTP_SSL, $SYS_EMAIL_LOGIN, $SYS_EMAIL_PW,
                $SYS_EMAIL_SERVER, $SYS_EMAIL_SERVER_NAME;
        $arrSenTo = ParseEmailNameList("buidung0895@gmail.com");
        $sub = "Demo test";
        $message = "Hello world";
        SendEmail($EMAIL_SERVER_SMTP_HOST, $EMAIL_SERVER_SMTP_PORT, $EMAIL_SERVER_SMTP_SSL, $SYS_EMAIL_LOGIN,
            $SYS_EMAIL_PW, $SYS_EMAIL_SERVER_NAME, $SYS_EMAIL_SERVER,
            $arrSenTo, $sub, $message);
    }
}