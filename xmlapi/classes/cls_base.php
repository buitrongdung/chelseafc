<?php
class clsTypeResult
{
    public $Id;
    public $Message;
    public function __construct($id = 0, $message = '') {
        $this->id = $id;
        $this->message = $message;
    }
    public static function OK () {
        return (new clsTypeResult(0));
    }
}

class clsAccessType
{
    public $Id;
    public $Name;
    public $Description;
    public $Size;
    public $Price;
    public $IsTest;
    public $acAdminId;

    public function __construct($id, $name, $description, $size, $price)
    {
        $this->Id = $id;
        $this->Name = $name;
        $this->Description = $description;
        $this->Size = $size;
        $this->Price = $price;
        $this->IsTest = false;
    }

    public function SetAcAdmin($acAdminId)
    {
        $this->acAdminId = $acAdminId;
    }

    public function GetAcAdmin()
    {
        return $this->acAdminId;
    }

}