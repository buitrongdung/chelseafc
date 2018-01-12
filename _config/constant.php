<?php
$PATH_BASE = dirname(__FILE__) . '/..';
$PATH_LAYOUTS = $PATH_BASE . "/layouts";
define ('BASE_URL', 'http://chelseafc.lvh.me/');
define ('BASE_DIR', '/public/img/');
define ('HTML', '.html');

define('ERR_EMAIL_CONNECT_FAILED',  1);
define('ERR_EMAIL_INVALID_ADDRESS', 2);
define('ERR_EMAIL_INVALID_DATA',    3);
define('ERR_EMAIL_INVALID_ATTACH',  4);
define('ERR_EMAIL_SEND_ERROR',      5);

$EMAIL_SERVER_SMTP_HOST   = 'smtp.gmail.com';
$EMAIL_SERVER_SMTP_PORT   = 465;
$EMAIL_SERVER_SMTP_SSL    = true;
$EMAIL_SERVER_POP3_HOST   = 'pop.gmail.com';
$EMAIL_SERVER_POP3_PORT   = 995;
$EMAIL_SERVER_POP3_SSL    = true;
$SYS_EMAIL_SERVER = "no-reply@gmail.com";
$SYS_EMAIL_SERVER_NAME = "The Blue";
$SYS_EMAIL_LOGIN = "buitrongdung0895@gmail.com";
$SYS_EMAIL_PW = "Dzungcfc11.email";

