<?php

use App\models\Category;
use App\models\Material;
use App\models\Product;
use App\models\Stone;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if(!$_SESSION["admin"]){
    header("location: /");
}

if(isset($_POST["btn-change"])){
    $_SESSION["btn-change"] = $_POST["btn-change"];
}

$product = Product::find($_SESSION["btn-change"]);
$categories = Category::getAll();
$stones = Stone::getAll();
$materials = Material::getAll();


require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/views/products/admin.change.product.view.php";