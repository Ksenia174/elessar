<?php

use App\models\Product;
use App\models\Stone;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
if (!$_SESSION["admin"]) {
    header("location: /");
}


$products = Product::getAllproductsByStone($_GET["id"]);
$stone = Stone::find($_GET["id"]);

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/views/stone/admin.productsStone.view.php";