<?php
require_once ROOT_PATH . "/email/XPM3_MAIL.php";
require_once ROOT_PATH . "/email/inc_parseEmail.php";

function SendEmail($serverAddress, $serverPort, $serverSSL, $serverAccName, $serverAccPW,
                   $senderName, $senderEmail, $arrSendTo, $strSubject, $strMessage, $typeMessage='Html', $attackFile=false,$headers=array())
{
    $objEmail = new XPM3_MAIL();
    try {
        if (!$objEmail->relay($serverAddress, $serverAccName, $serverAccPW, $serverPort, $serverSSL)) {
            return (ERR_EMAIL_CONNECT_FAILED);
        }
    } catch (Exception $e) {
        return (ERR_EMAIL_CONNECT_FAILED);
    }
    
    try {
        $objEmail->delivery('relay');
        $strAction = "From {$senderEmail}";
        $objEmail->From($senderEmail, $senderName);
        $strAction = "AddTo ...";
        $tmpEmail = array();
        if ($arrSendTo) {
            foreach ($arrSendTo as $tSendTo) {
                $strAction = "AddTo.." . json_encode($tSendTo);
                $email = isset($tSendTo['email']) ? $tSendTo['email'] : '';
                if (empty($email) || isset($tmpEmail[$email])) continue;
                    $objEmail->addto($email, $tSendTo['name']);
                    $tmpEmail[$email] = $email;
            }
        }

        foreach ($headers as $name => $value) {
            $strAction = "AddHeader {$name}: {$value}";
            $objEmail->addheader($name, $value);
        }
    } catch (Exception $e) {
        return (ERR_EMAIL_INVALID_ADDRESS);
    }

    if ($typeMessage=='Html') {
        $objEmail->html($strMessage, XPM3_MIME::HCHARSET);
    } else {
        $objEmail->text($strMessage, XPM3_MIME::HCHARSET);
    }

    try {
        global $PATH_BASE;
        if ($attackFile) {
            $file = $PATH_BASE . "/public/data/img_lights.jpg";
            $objEmail->attachfile($file);
        }
        $a = $objEmail->send($strSubject, XPM3_MIME::HCHARSET, XPM3_MIME::HENCODING);
        $objEmail->quit();
    } catch (Exception $e) {
        return (ERR_EMAIL_SEND_ERROR);
    }
}