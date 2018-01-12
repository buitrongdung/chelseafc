<?php
define('ROOT_PATH', __DIR__);

if (!session_id()) {
    session_start();
}
include_once ROOT_PATH . "/autoload.php";
$uri = strtok($_SERVER['REQUEST_URI'], '?');//phân rã chuỗi $_SERVER['REQUEST_URI'] thành chuỗi nhỏ hơn
//var_dump($uri);
$urlParse = explode('/', trim($uri, '/'));//tách chuỗi và xóa kí tự
//var_dump($uri);
//var_dump($urlParse);
$ctrlIndex = 0;
$actionIndex = 1;
$paramIndex = 2;
$admin = '';
if ($urlParse[0] == 'admin') {
	$ctrlIndex = 1;
	$actionIndex = 2;
	$paramIndex = 3;
	$admin = 'admin/';
}
$controller = (isset($urlParse[$ctrlIndex]) && $urlParse[$ctrlIndex]) ? $urlParse[$ctrlIndex] : 'index';
$action = (isset($urlParse[$actionIndex]) && $urlParse[$actionIndex]) ? $urlParse[$actionIndex] : 'index';

if ($controller && strpos($controller, '-')) {
    //strops tìm vị trí của - trong $controller. kq false : ko tìm thấy
	//If has -, change to ucfirst, i.e /hello-world => helloWorld
	$cPices = explode('-', $controller);
    //explode chuyển 1 chuỗi $controller thành 1 mảng các phần tử với kí tự tách mảng -
	$cPices = array_map(function($pice) {
		return ucfirst($pice);//chuyển kí tự đầu tiên sang chữ hoa
	}, $cPices);
    //array_map gửi mỗi giá trị $cPices về function $pice do người dùng tạo ra, kết quả trả về ucfirst($pice)
	$controller = implode('', $cPices);
    //chuyển mảng $cPice thành chuỗi với kí tự tách chuỗi space
}
$controller = ucfirst($controller) . 'Controller';

if ($action && strpos($action, '-')) {
	$aPices = explode('-', $action);
	$aPices = array_map(function($pice) {
		return ucfirst($pice);
	}, $aPices);
	$action = implode('', $aPices);
}
$action = lcfirst($action) . 'Action';//chuyển thành chữ thường

$controllerFile = __DIR__ . '/controllers/' . $admin . $controller . '.php';

$valid = false;
if (file_exists($controllerFile)) {
    $valid = true;
} else die('Page Not Found - The requested page could not be found (file)');

include_once ROOT_PATH . '/_config/db.php';
include_once ROOT_PATH . '/_config/constant.php';
include_once ROOT_PATH . '/controllers/lib/content.php';
include_once ROOT_PATH . '/email/inc_email.php';
include_once $controllerFile;
//sử dụng khi $params trên __construct
//$params = (!empty($_REQUEST)) ? $_REQUEST : null;
//$pageObj = new $controller($params);

//sử dụng khi $params không trên __construct
$pageObj = new $controller();

if (!method_exists($pageObj, $action)) {
    die('Page Not Found - The requested page could not be found (method)');
}
$slice = array_slice($urlParse, $paramIndex);//trích xuất 1 mảng $urlParse tại vị trí $paramIndex

//sử dụng khi lấy tất cả các request hay $slice
$slice = array_merge($_REQUEST, $slice);//hợp 1 hoặc nhiều mảng thành 1 mảng
call_user_func(array($pageObj, $action), $slice);//gọi lại 1 array với params là $slice
