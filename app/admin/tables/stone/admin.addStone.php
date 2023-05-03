<?php

use App\models\Stone;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if(!isset($_SESSION["admin"]) || !$_SESSION["admin"]){
    header("location: /");
    die();
}
session_unset();


Stone::addStone($_POST["name"]);

header('Location: /app/admin/tables/stone/admin.stone.php');