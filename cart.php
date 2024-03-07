<?php

declare(strict_types=1);

function loadClass($classe)
{
    require "classes/$classe.class.php";
}

spl_autoload_register("loadClass");

$Cart = new Cart;

// $Cart->numberOfproductincart();


if (isset($_POST["addtoCart"])) {

    $id = (int)$_POST["id"];
    $quantity = (int) $_POST["quantity"];

    $Cart->addToCart($id, $quantity);
}


if (isset($_POST["delete"])) {

    $id = (int)$_POST["id"];

    $Cart->removeFromCart($id);
}

require("general/header.php");


$allCartProducts = $Cart->showCart();


?>


<a href="index.php"><i class="fa-solid fa-arrow-left"></i></a>

<div class="uppercontainerCart">

    <!-- cet appel m'affiche le prix total de mon panier a l'ecran -->
    <div class="totalcontainer">

        <p">TOTAL : <span class="totalvalue"><?= $Cart->totalPriceInCart() . " " . $Cart::DEVISE ?></span></p>

    </div>

    <?php

    if (!empty($allCartProducts)) {


        foreach ($allCartProducts as $allCartProd) {

            $qty = $allCartProd->getQuantity();
            $price = $allCartProd->getPrice();

            $multiplication = $qty * $price;

    ?>

            <div class="containerCart">

                <img src="<?= 'images/' . $allCartProd->getProductPath() ?>" alt="image_product" class="imagesCart">

                <p><?= $allCartProd->getProductName() ?></p>

                <p><input class="champCart" type="number" value="<?= $allCartProd->getQuantity()  ?>"><?= " x " . $allCartProd->getPrice() . " " . $Cart::DEVISE . " = " . $multiplication . " " . $Cart::DEVISE ?></p>

                <div>
                    <form action="cart.php" method="POST">

                        <input type="hidden" name="id" value="<?= $allCartProd->getProductId() ?>">

                        <button class="btndeletefromCart" type="submit" name="delete"><i class="fa-solid fa-trash"></i></button>

                    </form>
                </div>

            </div>
        <?php

        }
    } else { ?>


        <div class="cartemptyTextcontainer">

            <div>your Cart is Empty !!! </div>

        </div>

    <?php
    } ?>


</div>