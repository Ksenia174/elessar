<?php

use App\models\Material;
use App\models\Product;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
if (!$_SESSION["admin"]) {
    header("location: /");
}


$products = Product::getAllproductsByMaterial($_GET["id"]);
$material = Material::find($_GET["id"]);

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/views/material/admin.productsMaterial.view.php";