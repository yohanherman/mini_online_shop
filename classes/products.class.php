<?php

declare(strict_types=1);


class products
{

    public const DEVISE = "$";


    protected int $_id;
    protected string $_productName;
    protected float $_price;
    protected string $_description;
    protected int $_status;
    protected $_productPath;
    protected $_dbh;


    public function __construct()
    {

        //     $this->_name = $_name;
        //     $this->_price = $_price;
        //     $this->_description = $_description;
        //     $this->_status =$_status;

        $this->_dbh = new DataBase;
    }


    // setter


    public function setProductId(int $_id): void
    {

        $this->_id = $_id;
    }


    public function setProductName(string $_productName): void
    {

        if (strlen($_productName) > 0 && is_string($_productName)) {

            $this->_productName = $_productName;
        }
    }

    public function setProductPath(string $_productPath): void
    {

        if (strlen($_productPath) > 0 && is_string($_productPath)) {

            $this->_productPath = $_productPath;
        }
    }

    public function setPrice(float $_price): void
    {

        if (empty($_price) && !is_numeric($_price)) {
            trigger_error('invalid price');
        }
        $this->_price = $_price;
    }

    public function setDescription(string $_description): void
    {

        if (strlen($_description) < 0 && is_numeric($_description)) {
            trigger_error('invalid description');
        }
        $this->_description = $_description;
    }

    public function setStatus(int $_status): void
    {

        if (empty($_status) < 0 && !is_numeric($_status)) {
            trigger_error('invalid status');
        }
        $this->_status = $_status;
    }

    // getter


    public function getProductId(): int
    {
        return $this->_id;
    }

    public function getProductName(): string
    {
        return $this->_productName;
    }
    public function getProductPath(): string
    {
        return $this->_productPath;
    }

    public function getDescription(): string
    {
        return $this->_description;
    }

    public function getPrice(): float
    {
        return $this->_price;
    }

    public function getStatus(): int
    {
        return $this->_status;
    }


    public function displayProduct()
    {

        $request = "SELECT id,productPath,productName , productPrice, Description, status FROM theproduct";

        $stmt = $this->_dbh->prepare($request);
        $stmt->execute();

        $Results = $stmt->fetchAll(PDO::FETCH_OBJ);

        error_log(print_r($Results, true));

        $arrResults = [];

        foreach ($Results as $Result) {


            $obj = new products;

            $obj->setProductId($Result->id);
            $obj->setProductName($Result->productName);
            $obj->setProductPath($Result->productPath);
            $obj->setPrice($Result->productPrice);
            $obj->setDescription($Result->Description);
            $obj->setStatus($Result->status);

            $arrResults[] = $obj;
        }

        return $arrResults;
    }
}
