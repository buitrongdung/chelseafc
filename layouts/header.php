<?php
    if (!session_id()) session_start();
?>
<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->
<head>
    <meta charset="utf-8"/>
    <title> ChelseaFc Fans | Official Site |</title>
    <link rel="icon" type="image/x-icon" href="../../../public/img/favicon.ico"/>

    <!--    <link type="text/css" rel="stylesheet" href="../public/css/header.css" />-->
    <link type="text/css" rel="stylesheet" href="../../../public/css/login.css" >
    <link rel="stylesheet" type="text/css" href="../../../public/css/style.css" />
    <link rel="stylesheet" type="text/css" href="../../../public/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="../../../public/css/cart.css" />
    <link rel="stylesheet" type="text/css" href="../../../public/css/menu.css" />
    <link rel="stylesheet" type="text/css" href="../../../public/js/jquery/jquery-ui.css" />
<!--    <script type="text/javascript" src="../../../public/js/jquery-1.11.2.min.map"></script>-->

<!--    <link type="text/css" rel="stylesheet" href="../../public/css/bootstrap.min.css" >-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="../../../public/js/function_login.js"></script>
    <script type="text/javascript" src="../../../public/js/index.js"></script>
    <script type="text/javascript" src="../../../public/js/function_sign_up.js"></script>
    <script type="text/javascript" src="../../../public/js/jquery-min.js"></script>
    <script type="text/javascript" src="../../../public/js/modernizr.custom.63321.js"></script>
    <script type="text/javascript" src="../../../public/js/jquery.catslider.js"></script>
    <script type="text/javascript" src="../../../public/js/shoppingCart.js"></script>
<!--    <script type="text/javascript" src="../../../public/js/jquery/jquery.js"></script>-->
<!--    <script type="text/javascript" src="../../../public/js/jquery/jquery-ui.js"></script>-->
    <style>
        /*==Style cơ bản cho website==*/

        /*==Style cho menu===*/

</style>

    <script>
    $( function() {
        var availableTags = [
            "ActionScript",
            "AppleScript",
            "Asp",
            "BASIC",
            "C",
            "C++",
            "Clojure",
            "COBOL",
            "ColdFusion",
            "Erlang",
            "Fortran",
            "Groovy",
            "Haskell",
            "Java",
            "JavaScript",
            "Lisp",
            "Perl",
            "PHP",
            "Python",
            "Ruby",
            "Scala",
            "Scheme"
        ];
        $("#autocomplete").autocomplete({
            source: availableTags
        });
    });
    </script>

</head>
<body background="../public/img/1920x1080-royal-blue-traditional-solid-color-background.jpg" style="width: 100%; height: 100%">
<div class="container" style="margin-left: auto; margin-right: auto; width: 80%">
    <a href="/"><img src="../../../public/img/Chelsea.png" alt="Chelsea" style="float: left; height: 150px; width: 150px"></a>
    <div class="chelsea_baner" style="height: 100px;margin-top: 5px; border: solid 0 azure;border-radius: 0 0 0 19px;margin-left: 72px;">
        <div>
            <a href="/"><div style="font-size: 37px;position: absolute;margin-left: 94px;margin-top: 42px;color: white;font-style:italic ">
                    ChelseaFc Fans</div></a>
        </div>
        <div style="position:relative">
            <form method="get" action="<?=BASE_URL?>shop/search">
                <input id="autocomplete" title="type &quot;a&quot;" placeholder="Search..." style="position: absolute;height: 33px;padding-left: 9px;font-size:15px;width: 242px;border-radius: 4px 0 0 4px;border: none;">
<!--                <button type="submit" id="searchProducts" style="background: none;border: none;margin-left: 241px"><img src="/public/img/search.png" style="height: 36px;margin-top: -2px"></button>-->
            </form>
        </div>


        <div style="float: right;margin: 22px 11px 0 0">
            <a href="#" class="cart-box" id="cart-info" title="View Cart">
                <?php
                if(isset($_SESSION["products"])){
                    echo count($_SESSION["products"]);
                }else{
                    echo 0;
                }
                ?>
            </a>
            <a href="/shop/view-cart/"><img src="../../../public/img/cart-7-32.png"></a>
        </div>
        <div class="shopping-cart-box">
            <a href="#" class="close-shopping-cart-box" >Close</a>
            <h3>Your Shopping Cart</h3>
            <div id="shopping-cart-results">
            </div>
        </div>
    </div>
    <div id="menu" style="height: 30px; border: solid 1px #1269ff;margin-left: 143px;border-radius:35px">
        <ul>
            <div style="float: left">
                <li><a href="/"> Home </a></li>
                <li><a href="#"> Matches </a></li>
                <li><a href="#"> Video </a></li>
                <li><a href="/shop/list-all-products"> Shop </a></li>
                <li><a href="/shop/menu-categories"> Fans</a></li>
            </div>
            <div style="float: right;padding-right: 13px;">
                <?php if (isset($_SESSION['username']) && !empty($_SESSION['username'])): ?>
                    <li style="width: 150px;"><a href="/user/detail/<?=$_SESSION['id_user']?>" style="font-size: 14px;font-style: normal;">Welcome <?=$_SESSION['username']?></a></li>
                    <li><a href="/user/logout" style="font-size: 14px"> Logout </a></li>
                <?php elseif (isset($_SESSION['name']) && !empty($_SESSION['name'])): ?>
                    <li style="width: 150px;"><a href="/user/detail/<?=$_SESSION['id']?>" style="font-size: 14px;font-style: normal;">Welcome <?=$_SESSION['name']?></a></li>
                    <li><a href="/user/logout" style="font-size: 14px"> Logout </a></li>
                <?php else: ?>
                    <li style="padding-left: 100px;"><a href="/user/login" style="font-size: 14px"> Login </a></li>
                    <li><a href="/user/signup" style="font-size: 14px"> Sign Up </a></li>
                <?php endif ?>
            </div>
        </ul>
    </div>
</div>
<div style="width: 80%; margin-left: auto; margin-right: auto; height: auto;">
