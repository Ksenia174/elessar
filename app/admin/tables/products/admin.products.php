<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

use App\models\Category;
use App\models\Material;
use App\models\Product;
use App\models\Stone;

if(!isset($_SESSION["admin"]) || !$_SESSION["admin"]){
    header("location: /");
    die();
}
session_unset();

$categories = Category::getAll();

$stones = Stone::getAll();

$materials = Material::getAll();

$products = Product::getAll();

if (isset($_POST['category'])) {
    $category = $_POST['category'];
    if (empty($category) || $category == "all") {
        $products = Product::getAll();
    } else {
        $products = Product::getProductsByCategories($category);
    }
}

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/views/products/admin.products.views.php";
