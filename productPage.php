<?php

declare(strict_types=1);

function loadClass($classe)
{
    require "classes/$classe.class.php";
}

spl_autoload_register("loadClass");




include("general/header.php");


?>

<a href="index.php"><i class="fa-solid fa-arrow-left"></i></a>

<div class="containerProductPage">
    <div>
        <img src="<?= "images/" . $_POST["productPath"] ?>" alt="imageProduit" class="productImagesX2">
        <h3><?= $_POST["productName"] ?></h3>
        <p><?= $_POST["productPrice"] ?></p>
        <p><?= $_POST["Description"] ?></p>
        <p><?= $_POST["status"] ?></p>
    </div>
</div>


<form action="cart.php" method="POST">

    <div>
        <input type="hidden" name="id" value="<?= $_POST["id"] ?>">
        <!-- <input type="hidden" name="price" value="<= $_POST["productPrice"] ?>"> -->
        <input type="number" name="quantity" min="1">
    </div>

    <div>
        <button name="addtoCart">add to Cart </button>
    </div>
</form>



</body>

</html>