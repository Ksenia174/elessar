<?php

use App\models\Material;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if(!$_SESSION["admin"]){
    header("location: /");
}

if(isset($_POST["btn-change"])){
    $_SESSION["btn-change"] = $_POST["btn-change"];
}

$material = Material::find($_SESSION["btn-change"]);


require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/views/material/admin.change.material.view.php";