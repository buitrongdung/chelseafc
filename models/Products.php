<?php

class Products extends ModelAbs
{
    public function search ($textSearch)
    {
        $resultSearch = $this->fullTextSeatch('name', 'products', $textSearch, 'NATURAL LANGUAGE MODE');
        $listSearch = array();
        if (empty($resultSearch))
            die('No Product');
        else {
            foreach ($resultSearch as $list) {
                $listSearch[] = $list;
            }
        }
        return $listSearch;
    }

    public function countProducts ()
    {
        $count = $this->select('products', 'count(id) as total', 'id_categories != 0');
        $totalRecord = $count['total'];
//        var_dump($totalRecord);
        return $totalRecord;
    }

    public function selectProductLimit ($start, $limit)
    {
        $list = $this->selectLimit('products', ' id_categories != 0', $start, $limit);
        $selectProducts = array();
        if (empty($list)) die("No Products");
        foreach ($list as $item) {
            $selectProducts[] = $item;
        }
        return $selectProducts;
    }

    public function insertCategory ($name, $alias)
    {
        $insertCategory = $this->insert('products', "`name`, `alias`", "'$name', '$alias'");
        return $insertCategory;
    }

    public function checkCategory ($name)
    {
        $rowCategory = $this->row('products', "name = '" . $name . "'");
        return $rowCategory;
    }

    public function selectCategories ()
    {
        $listCategory = $this->rows('products', "`id`, `name`, `id_categories`");
        $dataCategory = array();
        if (empty($listCategory)) {
            die('No products in store');
        } else {
            foreach ($listCategory as $list) {
                $dataCategory[] = $list;
            }
        }
        return $dataCategory;
    }

    public function insertProducts ($id, $name, $alias, $image, $price, $idCategory,  $description)
    {
        $insertProducts = $this->insert('products', "`id`, `name`, `alias`, `image`, `price`, `id_categories`, `description`", " '$id', '$name', '$alias', '$image', '$price', '$idCategory', '$description'");
        return $insertProducts;
    }

    public function listProducts ()
    {
        $listProducts = $this->rowsWhere('products', '(1=1)', '*');
        $dataProducts = array();
        if (empty($listProducts)) die("No query products");
        else {
            foreach ($listProducts as $list)
                $dataProducts[] = $list;
        }
        return $dataProducts;
    }

    public function detailCategories ($idProduct)
    {
        $detail = $this->rowsWhere('products', 'id_categories = "' . $idProduct . '"', '`name`, `id_categories`, `alias`, `image`, `price`, `description`');
        $listData = array();
        if (empty($detail)) die("No products ");
        else {
            foreach ($detail as $list)
                $listData[] = $list;
        }
        return $listData;
    }

    public function detailProduct ($idProduct)
    {
        $detail = $this->row('products', 'id = "' . $idProduct . '"');
        return $detail;
    }
}