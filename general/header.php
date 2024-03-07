<?php

// declare(strict_types=1);


$Cart = new Cart;
$database = new DataBase;


$connecter = false;

if (!$connecter) { ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/b713960f0d.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="styles.css">
        <title>Document</title>
    </head>

    <body>
        <header>
            <div>

                <nav class="navbar">

                    <div class="btnburger"><i class="fa-solid fa-bars"></i></div>

                    <div class="test">
                        <div>
                            <ul class="burgerMenu">
                                <li><a href=""></a>lorem</li>
                                <li><a href=""></a>lorem</li>
                                <li><a href=""></a>lorem</li>
                            </ul>
                        </div>
                    </div>

                    <a href=""><i class="fa-solid fa-magnifying-glass"></i></a>

                    <div id="logo">SOLD</div>

                    <div><a href=""><i class="fa-solid fa-heart"></i></a></div>
                    <a href="cart.php"><i class="fa-solid fa-cart-shopping"></i><span class="numberProductCart"><?= $Cart->numberOfproductincart() ?></span></a>

                </nav>
            </div>
        </header>

        <script src="script.js"></script>
    </body>

    </html>

<?php

} elseif ($connecter) { ?>



    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/b713960f0d.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="styles.css">
        <title>Document</title>
    </head>

    <body>
        <header>
            <div>
                <nav class="navbar">

                    <div class="test">
                        <div>
                            <ul class="burgerMenu">
                                <li><a href=""></a>lorem</li>
                                <li><a href=""></a>lorem</li>
                                <li><a href=""></a>lorem</li>
                            </ul>
                        </div>
                    </div>

                    <div class="btnburger"><i class="fa-solid fa-bars"></i></div>

                    <a href=""><i class="fa-solid fa-magnifying-glass"></i>"></i></a>

                    <div>LOGO</div>

                    <div><a href=""><i class="fa-solid fa-heart"></i></a></div>
                    <a href=""><i class="fa-solid fa-cart-shopping"></i></a>

                </nav>

            </div>

        </header>

        <script src="script.js"></script>
    </body>

    </html>

<?php

}
