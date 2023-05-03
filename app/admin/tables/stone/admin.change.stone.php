<?php

use App\models\Stone;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if(!$_SESSION["admin"]){
    header("location: /");
}

if(isset($_POST["btn-change"])){
    $_SESSION["btn-change"] = $_POST["btn-change"];
}

$stone = Stone::find($_SESSION["btn-change"]);


require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/views/stone/admin.change.stone.view.php";