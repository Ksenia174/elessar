<?php


use App\models\Product;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

session_start();
unset($_SESSION["error"]);

if (!$_SESSION["admin"]) {
    header("location: /");
}

$extensions = ["jpeg", "jpg", "png", "webp", "jfif"];
$types = ["image/jpeg", "image/png", "image/webp", "image/jfif"];

if (isset($_POST["save-product"])) {
    $name = $_POST["oldImage"];

    if (isset($_FILES["image"]) && !empty($_FILES["image"]["name"])) {
        $newName = $_FILES["image"]["name"];
        $tmpName = $_FILES["image"]["tmp_name"];
        $error = $_FILES["image"]["error"];
        $size = $_FILES["image"]["size"];

        $path_parts = pathinfo("name");

        $newName = time() . "_" . $newName;

        if (in_array(mime_content_type($tmpName), $types)) {

            if ($size > 3145728) {
                $_SESSION["error"] = "Файл слишком большой";
            }
            if (!move_uploaded_file($tmpName, $_SERVER["DOCUMENT_ROOT"] . "/upload/$newName" )) {
                $_SESSION["error"] = "Не удалось переместить файл";
            } else {               
                unlink($_SERVER["DOCUMENT_ROOT"] . "/upload/$name");
                $name = $newName;
            }
        } else {
            $_SESSION["error"] = "Расширение файла должно быть: " . implode(", ", $extensions);
        }
    }
    if (!isset($_SESSION["error"])) {
        Product::changeProduct($_SESSION["btn-change"], $name, $_POST["name"], $_POST["price"], $_POST["description"], $_POST["amount"], $_POST["category_id"], $_POST["stone_id"], $_POST["material_id"],);

        header("location: /app/admin/tables/products/admin.products.php");
    } else {
        header("location: /app/admin/tables/products/admin.change.product.php");
    }
}