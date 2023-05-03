<?php

use App\models\Material;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if(!isset($_SESSION["admin"]) || !$_SESSION["admin"]){
    header("location: /");
    die();
}
session_unset();


Material::addMaterial($_POST["name"]);

header('Location: /app/admin/tables/material/admin.material.php');