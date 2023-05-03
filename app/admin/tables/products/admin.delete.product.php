<?php

use App\models\Product;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";


$product = Product::deleteProduct($_POST["btn-del"]);

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/tables/products/admin.products.php";