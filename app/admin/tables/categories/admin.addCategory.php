<?php

use App\models\Category;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if(!isset($_SESSION["admin"]) || !$_SESSION["admin"]){
    header("location: /");
    die();
}
session_unset();


if(isset($_FILES["image"])){
    $name = $_FILES["image"]["name"];
    $tmpname= $_FILES["image"]["tmp_name"];
    $error = $_FILES["image"]["error"];

    $nameInServer =  time(). "_" .preg_replace("/[\-&\d_#]/","", $name);
    if(move_uploaded_file($tmpname,$_SERVER["DOCUMENT_ROOT"]. "/upload/".$nameInServer)){
        $_SESSION["message"] = "файл успешно загружен";
    }
    else{
        $_SESSION["errors"]["image"] = "Ошибка";
    }
    
}

Category::addCategory($_POST["name"], $nameInServer);

header('Location: /app/admin/tables/categories/admin.category.php');