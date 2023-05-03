<?php

use App\models\Category;
use App\models\Product;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
if (!$_SESSION["admin"]) {
    header("location: /");
}


$products = Product::getAllproductsByCategory($_GET["id"]);
$category = Category::find($_GET["id"]);

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/views/categories/admin.productsCategory.view.php";