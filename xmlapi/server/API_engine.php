<?php
/**
 * Created by PhpStorm.
 * User: Welcome
 * Date: 1/5/2018
 * Time: 10:36 AM
 */

class API_engine extends ModelAbs
{
    public function getProductList ()
    {
        $objRes = new clsGetProductListRS();
        $listProducts = $this->rowsWhere('products', '(1=1)', '*');
        if (empty($listProducts)) die();
        foreach ($listProducts as $product) {
            $objItem = new clsProductList();
            $objItem->Id = $product->id;
            $objItem->Name = $product->name;
            $objItem->Description = $product->description ? $product->description : '';
            $objItem->Size = $product->size ? $product->size : '';
            $objItem->Price = $product->price;
            $objRes->List[] = $objItem;
        }
        $objRes->OpResult = clsTypeResult::OK();
        return $objRes;
    }
}