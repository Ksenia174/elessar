<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

use App\models\Category;

$categories = Category::getAll();

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/views/categories/admin.category.view.php";
