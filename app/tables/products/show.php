<?php

use App\models\Product;

require_once $_SERVER['DOCUMENT_ROOT'] . "/bootstrap.php";

$product = Product::find($_GET['id']);

require_once $_SERVER['DOCUMENT_ROOT'] . "/views/products/show.view.php";