<?php

use App\models\Category;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$categories = Category::getAll();

$stream = file_get_contents("php://input");

if ($stream != null) {
    $id = json_decode($stream)->id;
    $delete = Category::deleteCategory($id);
    echo json_encode( $delete, JSON_UNESCAPED_UNICODE);
}

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/views/categories/admin.category.view.php";