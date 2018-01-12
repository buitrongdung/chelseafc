<?php

//include_once ROOT_PATH . "/vendor/facebook/graph-sdk/src/Facebook/autoload.php";
/*
 * 1: Access token: cần phải có để xác nhận truy cập đến 1 app, sử dụng theo yêu cầu quy định
 * Các Facebook\Authentication\AccessToken thực thể đại diện cho một thẻ truy cập.
 * 2: oAuth2: phương thức chứng thực mà nhờ đó 1 web service or app bên thứ 3 có thể đại diện truy cập vào tài nguyên
 * của người dùng trong 1 dịch vụ nào đó
 *    +--------+                               +---------------+
     |        |--(A)- Authorization Request ->|   Resource    |
     |        |                               |     Owner     |
     |        |<-(B)-- Authorization Grant ---|(Người dùng)   |
     |        |                               +---------------+
     |        |
     |        |                               +---------------+
     |        |--(C)-- Authorization Grant -->| Authorization |
     | Client |                               |     Server    |
     |  (app) |<-(D)----- Access Token -------|(dịch vụ chứng thực)    |
     |        |                               +---------------+
     |        |
     |        |                               +---------------+
     |        |--(E)----- Access Token ------>|    Resource   |
     |        |                               |     Server    |
     |        |<-(F)--- Protected Resource ---| (cung cấp thông tin)  |
     +--------+                               +---------------+
 * */
//provider an easy interface for working with all components of the SDK
//Gửi yêu cầu quyền truy nhập tới người dùng
class FacebookController extends AbsController
{
    function __construct()
    {
    }

    public function getPhotosAction ()
    {

    }
}


