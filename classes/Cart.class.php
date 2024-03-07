<?php

declare(strict_types=1);

class Cart extends products

{

    protected $_quantity = 0;


    public function setQuantity(int $_quantity): void
    {

        $this->_quantity = $_quantity;
    }

    public function getQuantity(): int
    {

        return $this->_quantity;
    }

    // public function addToCart(int $productId, int $quantity)
    // {
    //     $request = "INSERT INTO cart (theProduct_Id, quantity) VALUES(:theProduct_Id, :quantity)";

    //     $stmt = $this->_dbh->prepare($request);

    //     $stmt->bindParam(":theProduct_Id", $productId, PDO::PARAM_INT);
    //     $stmt->bindParam(":quantity", $quantity);
    //     $stmt->execute();
    // }

    private function checkProduct(int $productId)
    {

        $request = "SELECT * FROM cart WHERE theProduct_Id =:theProduct_Id";
        $stmt = $this->_dbh->prepare($request);
        $stmt->bindParam(":theProduct_Id", $productId, PDO::PARAM_INT);
        $stmt->execute();

        $resultss = $stmt->fetchAll();

        if ($stmt->rowCount() > 0) {

            // echo "j'ai trouvé";

            return true;
        } else {

            // echo "j'ai pas trouvé";
            return false;
        }
    }

    public function addToCart(int $productId, int $quantity)
    {

        if (!$this->checkProduct($productId)) {

            $request = "INSERT INTO cart (theProduct_Id, quantity) VALUES(:theProduct_Id, :quantity)";

            $stmt = $this->_dbh->prepare($request);

            $stmt->bindParam(":theProduct_Id", $productId, PDO::PARAM_INT);
            $stmt->bindParam(":quantity", $quantity);
            $stmt->execute();
        } elseif ($this->checkProduct($productId)) {


            // bug a regler mpdifié qu'un elemnt bien precs dans la base de donnee grace a l;ID

            $request = "UPDATE cart set quantity = :quantity WHERE id= :id ";

            $stmt = $this->_dbh->prepare($request);
            $stmt->bindParam(":quantity", $quantity);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
        }
    }

    public function showCart()
    {

        $request = "SELECT theProduct.productPath , theProduct.productName, theProduct.productPrice ,cart.quantity FROM cart JOIN theproduct ON theProduct.id = cart.theproduct_Id ";
        $stmt = $this->_dbh->prepare($request);
        $stmt->execute();

        $resultsCarts = $stmt->fetchAll(PDO::FETCH_OBJ);

        $arrResultsCart = [];

        foreach ($resultsCarts as $resultsCart) {

            $obj = new Cart;
            $obj->setProductPath($resultsCart->productPath);
            $obj->setProductName($resultsCart->productName);
            $obj->setPrice($resultsCart->productPrice);
            $obj->setQuantity($resultsCart->quantity);

            $arrResultsCart[] = $obj;
        }

        return $arrResultsCart;
    }
}
