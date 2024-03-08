<?php

declare(strict_types=1);

function loadClass($classe)
{

    require "classes/$classe.class.php";
}

spl_autoload_register("loadClass");


$database = new DataBase;
$products = new products;

include("general/header.php");

$Allproduct = $products->displayProduct();

?>

<!--  barre de recherche produit -->

<form action="classes/products.class.php" method="POST">

    <div class="searchbarcontainer">
        <input class="searchbar" type="search" name="searchbar">
    </div>

</form>

<!-- <div class="text">text text text tex text text text</div> -->

<div id="textHTML"></div>

<div class="upperContainer">
    <div class="container-product">

        <?php

        foreach ($Allproduct as $product) { ?>

            <div>
                <form action="productPage.php" method="POST">

                    <button class="btnProductPage" type="submit" name="btnproductPage"><img class="productImages" src="<?= 'images/' . $product->getProductPath() ?>" alt="imagesProduct"></button>

                    <h3><?= $product->getProductName() ?></h3>
                    <p><?= $product->getPrice() . $product::DEVISE ?></p>

                    <input type="hidden" name="id" value="<?php echo $product->getProductId() ?>">
                    <input type="hidden" name="productName" value="<?= $product->getProductName() ?>">
                    <input type="hidden" name="productPath" value="<?= $product->getProductPath() ?>">
                    <input type="hidden" name="productPrice" value="<?= $product->getPrice() . $product::DEVISE ?>">
                    <input type="hidden" name="Description" value="<?= $product->getDescription() ?>">
                    <input type="hidden" name="status" value="<?= $product->getStatus() ?>">

                </form>

            </div>
        <?php

        }

        ?>
    </div>
</div>

</body>

</html>