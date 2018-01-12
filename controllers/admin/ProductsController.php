<?php

class ProductsController extends AbsController
{
    public $products;

    function __construct()
    {
        $this->products = new Products();
    }

    public function addCategoryAction ()
    {
        $error = array();
        if (isset($_POST['addCategory'])) {
            $aliasCategory = $this->sanitizeTitle($_POST['name']);
            $checkAddCate = $this->products->checkCategory($_POST['name']);
            if (empty($checkAddCate)) {
                $this->products->insertCategory($_POST['name'], $aliasCategory);
                header("Location: " . $_SERVER['HTTP_REFERER']);
            } else {
//                array_push($error,"Category name already exists", null);
                $error[] = "Category name already exists";
                header("Location: " . $_SERVER['HTTP_REFERER']);
            }
        }

        $data['addCategory'] = '';
        $this->render('admin/product/category/addCategory', $data);
    }

    public function listCategoryAction ()
    {

        $data['category'] = '';
        $this->render('admin/product/category/listCategory', $data);
    }

    function sanitizeTitle($string) {
        if(!$string) return false;
        $utf8 = array(
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'd'=>'đ|Đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
        );
        foreach($utf8 as $ascii=>$uni) $string = preg_replace("/($uni)/i",$ascii,$string);
        $string = $this->utf8Url($string);
        return $string;
    }

    function utf8Url($string){
        $string = strtolower($string);
        $string = str_replace( "ß", "ss", $string);
        $string = str_replace( "%", "", $string);
        $string = preg_replace("/[^_a-zA-Z0-9 -]/", "",$string);
        $string = str_replace(array('%20', ' '), '-', $string);
        $string = str_replace("----","-",$string);
        $string = str_replace("---","-",$string);
        $string = str_replace("--","-",$string);
        return $string;
    }

    public function addProductAction ()
    {
        $error = array();
        $selectCategory = $this->products->selectCategories(0);
        if (empty($selectCategory)) {
            die("No categories");
        }
        if (isset($_POST['addProduct'])) {
            $upDir = "public/img/products/";
            $upFile = $upDir . basename($_FILES['image']['name']);
            $img = basename($_FILES['image']['name']);
            $aliasProducts = $this->sanitizeTitle($_POST['name']);
            $id = substr(uniqid(), rand(1,5), 10);
            if (empty($img)) {
                $error['image'] = "You need select a image";
            }
            if (empty($_POST['name'])) {
                $error['name'] = "You need to enter a product name";
            }
            if (empty($_POST['price'])) {
                $error['price'] = 'You need to enter a product price';
            }
            if (empty($_POST['description'])) {
                $error['description'] = 'You need to enter a product description';
            }
            if (!empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['description']) && !empty($img)){
                $insertProduct = $this->products->insertProducts($id, $_POST['name'], $aliasProducts, $_POST['image'] = $img, $_POST['price'], $_POST['categories'], $_POST['description']);
                if (move_uploaded_file($_FILES['image']['tmp_name'], $upFile) && !empty($insertProduct)) {
                    header('location:' . $_SERVER['HTTP_REFERER']);
                } else {
                    header('location:' . $_SERVER['HTTP_REFERER']);
                }
            }
        }
        $data['selectCategory'] = $selectCategory;
        $data['error'] = $error;
        $this->render('admin/product/addProducts', $data);
    }

    public function listProductAction ()
    {
        $listProducts = $this->products->listProducts();
        if (empty($listProducts)) die("No products");

        $data['listProducts'] = $listProducts;
        $this->render('admin/product/listProducts', $data);
    }
}