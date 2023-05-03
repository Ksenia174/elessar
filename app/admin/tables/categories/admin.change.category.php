<?php

use App\models\Product;
use App\models\Category;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if(!$_SESSION["admin"]){
    header("location: /");
}

if(isset($_POST["btn-change"])){
    $_SESSION["btn-change"] = $_POST["btn-change"];
}

$categories = Category::find($_SESSION["btn-change"]);


require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/views/categories/admin.change.category.view.php";