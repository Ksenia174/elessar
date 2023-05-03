<?php

use App\models\Category;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

session_start();
unset($_SESSION["error"]);

if (!$_SESSION["admin"]) {
    header("location: /");
}

$extensions = ["jpeg", "jpg", "png", "webp", "jfif"];
$types = ["image/jpeg", "image/png", "image/webp", "image/jfif"];

if (isset($_POST["save-category"])) {
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
        Category::changeCategory($_SESSION["btn-change"], $_POST["name"], $name);
        header("location: /app/admin/tables/categories/admin.category.php");
    } else {
        header("location: /app/admin/tables/categories/admin.change.category.php");
    }
}
