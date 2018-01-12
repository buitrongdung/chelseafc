<?php

class ShopController extends AbsController
{
    public $params;
    public $products;

    function __construct()
    {
        $this->products = new Products();
    }

    public function searchAction ()
    {
        if (isset($_GET['search'])) {
            $resultSearch = $this->products->search($_GET['search']);
            if (empty($resultSearch)) die("No products");
        }
        $data['listProducts'] = $resultSearch;
        $this->render('shop/listProducts', $data);
    }

    public function menuCategoriesAction()
    {
        $listProducts = $this->products->listProducts();
        if (empty($listProducts)) die("No products");
        $data['listProducts'] = $listProducts;
        $this->render('shop/menuProducts', $data);
    }


    public function listAllProductsAction()
    {
        $allPro = $this->products->listProducts();
        echo "<pre>";print_r(json_encode($allPro));
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 2;
        $countProducts = $this->products->countProducts();
        $totalPage = ceil($countProducts / $limit);
        if ($currentPage > $totalPage) {
            $currentPage = $totalPage;
        }elseif ($currentPage < 1) {
            $currentPage = 1;
        }

        $start = ($currentPage - 1) * $limit;
        $listProducts = $this->products->selectProductLimit($start, $limit);

        $data['currentPage'] = $currentPage;
        $data['totalPage'] = $totalPage;
        $data['listProducts'] = $listProducts;
        $this->render('shop/listProducts', $data);
    }

    public function detailCategoriesAction($params = array())
    {
        $this->params = $params;
        $listProducts = $this->products->detailCategories($params[0]);
        $data['listProducts'] = $listProducts;
        $this->render('shop/detailCategories', $data);
    }

    public function detailProductAction($params = array())
    {
        $this->params = $params;
        $selectProduct = $this->products->detailProduct($params[0]);

        if (isset($_POST['id'])) {
            foreach ($_POST as $key => $value) {
                $newProduct[$key] = filter_var($value, FILTER_SANITIZE_STRING);
            }
            $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            $stmt = $mysqli->prepare("SELECT `name`, `price`, `image` FROM `products` WHERE `id`=? LIMIT 1");
            $stmt->bind_param("s", $newProduct['id']);
            $stmt->execute();
            $stmt->bind_result($productName, $productPrice, $productImage);
            while ($stmt->fetch()) {
                $newProduct['name'] = $productName;
                $newProduct['price'] = $productPrice;
                $newProduct['image'] = $productImage;
                if (isset($_SESSION['products'])) {
                    if (isset($_SESSION['products'][$newProduct['id']]))
                        unset($_SESSION['products'][$newProduct['id']]);
                }
                $_SESSION['products'][$newProduct['id']] = $newProduct;
            }
            $totalItems = count($_SESSION['products']);
            die(json_encode(array('items' => $totalItems)));
        }

        if (isset($_POST['loadCart']) && $_POST['loadCart'] == 1) {
            if (isset($_SESSION['products']) && $_SESSION['products'] > 0) {
                $cartBox = "<ul class=\"cart-products-loaded\">";
                $total = 0;
                foreach ($_SESSION['products'] as $product) {
                    $productName = $product['name'];
                    $productPrice = $product['price'];
                    if (!empty($product['size']) && $product['size'] != '0') {
                        $productSize = $product['size'];
                    } else {
                        $productSize = "-";
                    }
                    $productQuantity = $product['quantity'];
                    $productId = $product['id'];
//                    echo "<pre>";
//                    var_dump($productId);
//                    echo "</pre>";
                    if (array_key_exists($product['id'], $product) && $product['size'] != '0' && array_key_exists($product['size'], $product)) {
                        $cartBox .= "fsdfd";
                        die;
//                        $cartBox .= "<li>$productName (Qty: $productQuantity | Size: $productSizeNew) - U$ "
//                            . sprintf("%01.2f", ($productQuantity * $productPrice)) . "
//                            <a href=\"#\" class=\"remove-item\" data-id=\"$productId\">&times;</a></li>";
                    } else {
                        $cartBox .= "<li>$productName (Qty: $productQuantity | Size: $productSize) - U$ "
                            . sprintf("%01.2f", ($productQuantity * $productPrice)) . "
                        <a href=\"#\" class=\"remove-item\" data-id=\"$productId\">&times;</a></li>";
                    }
                    $subTotal = ($productPrice * $productQuantity);
                    $total += $subTotal;
                }
                $cartBox .= "</ul>";
                $cartBox .= '<div class="cart-products-total">Total : U$ ' . sprintf("%01.2f", $total) . ' 
                            <u><a href="" title="Review Cart and Check-Out">Check-out</a></u></div>';
                die($cartBox);
            } else {
                die ("Your Cart is empty!");
            }
        }

        if (isset($_GET['removeProduct']) && isset($_SESSION['products'])) {
            $productId = filter_var($_GET['removeProduct'], FILTER_SANITIZE_STRING);
            if (isset($_SESSION['products'][$productId])) {
                unset($_SESSION['products'][$productId]);
            }
            $total = count($_SESSION['products']);
            die(json_encode(['items' => $total]));
        }

        $data['detailProduct'] = $selectProduct;
        $this->render('shop/detailProduct', $data);
    }

    public function viewCartAction()
    {
//        echo "<pre>";
//        var_dump($_SESSION['products']);
//        echo "</pre>";

        $data['viewCart'] = '';
        $this->render('shop/viewCart', $data);
    }

    public function removeCartAction()
    {
        if (isset($_GET['removeProduct']) && isset($_SESSION['products'])) {
            $productId = filter_var($_GET['removeProduct'], FILTER_SANITIZE_STRING);
            if (isset($_SESSION['products'][$productId])) {
                unset($_SESSION['products'][$productId]);
            }
            $total = count($_SESSION['products']);
            die(json_encode(['items' => $total]));
        }
        $data['viewCart'] = '';
        $this->render('shop/viewCart', $data);
    }

    public function infoCartAction()
    {

    }
}