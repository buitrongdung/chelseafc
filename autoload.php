<?php
require_once ROOT_PATH . "/controllers/AbsController.php";
include_once ROOT_PATH . "/vendor/autoload.php";


//spl_autoload_register(function ($className) {
//    //dat ten cho tien to
//    $prefix = 'Api\\Facebook\\';
//
//    //thu muc co so cua tien to khong gian
//    $baseDir = ROOT_PATH . "/Facebook";
//
//    //Lớp học sử dụng tiền tố không gian tên?
//    $len = strlen($prefix);//dem so luong ki tu
//    if (strncmp($prefix, $className, $len) !== 0)//so sanh nhi phan khong phan biet chu hoa chu thuong
//        //khong, di chuyen đến autoload được đăng kí tiếp theo
//        return;
//    //lay ten lop tuong ung
//    $relativeClass = substr($className, $len);//thay the 1 phan class trong chuoi len
//    $file = rtrim($baseDir, '/') . '/' . str_replace('\\', '/', $relativeClass) . ".php";
//    //rtrim: Thay thế tất cả các lần xuất hiện của chuỗi tìm kiếm bằng chuỗi thay thế
//    if (file_exists($file))
//        require $file;
//});

spl_autoload_register(function ($models) {
//    $prefix = 'Models\\';
//    $baseDir = ROOT_PATH . "/models/";
   $baseDir = ROOT_PATH . '/models/' . $models . ".php";
   if (file_exists($baseDir))
       require_once $baseDir;
//    $len = strlen($prefix);
//    if (strncmp($prefix, $models, $len) !== 0)
//        return;
//    $relativeModels = substr($models, $len);
//    $file = rtrim($baseDir, "/") . "/" . str_replace('\\', '/', $relativeModels) . ".php";
//    if (file_exists($file))
//        require_once $file;
});