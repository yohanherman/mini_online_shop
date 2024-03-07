<?php

declare(strict_types=1);

function loadClass($classe)
{
    require "classes/$classe.class.php";
}

spl_autoload_register("loadClass");


$Cart = new Cart;


// if (isset($_POST["addtoCart"])) {

//     $id = (int)$_POST["id"];
//     $quantity = (int) $_POST["quantity"];

//     $Cart->addToCart($id, $quantity);
// }



if (isset($_POST["addtoCart"])) {

    $id = (int)$_POST["id"];
    $quantity = (int) $_POST["quantity"];

    $Cart->addToCart($id, $quantity);
}


require("general/header.php");


$allCartProducts = $Cart->showCart();

?>

<div class="uppercontainerCart">
    <?php

    foreach ($allCartProducts as $allCartProd) {

        $qty = $allCartProd->getQuantity();
        $price = $allCartProd->getPrice();

        $sum = $qty * $price;

    ?>
        <div class="containerCart">

            <img src="<?= 'images/' . $allCartProd->getProductPath() ?>" alt="image_product" class="imagesCart">

            <p><?= $allCartProd->getProductName() ?></p>

            <p><?= $allCartProd->getQuantity() . " x " . $allCartProd->getPrice() . "" . $Cart::DEVISE . " = " . $sum . $Cart::DEVISE ?></p>

        </div>
    <?php
    }
    ?>

</div>