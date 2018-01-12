<?php

/**
 * Created by PhpStorm.
 * User: Dzung_cfc
 * Date: 07-Apr-17
 * Time: 9:32 PM
 */
class CartController extends AbsController
{
    public $params;
    public $products;

    public function __construct()
    {
        $this->products = new Products();
    }

    public function addToCartAction ()
    {

    }

}