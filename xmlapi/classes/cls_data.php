<?php
class clsItem
{
    public $Id;
    public $Name;
    public function __construct($id = 0, $name = '')
    {
        $this->Id = $id;
        $this->Name = $name;
    }
}

class clsProductList
{
    public $Id;
    public $Name;
    public $Description;
    public $Size;
    public $Price;

    public function __construct()
    {

    }
}