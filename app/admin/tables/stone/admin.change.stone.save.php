<?php

use App\models\Stone;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

unset($_SESSION["error"]);

if (!$_SESSION["admin"]) {
    header("location: /");
}
Stone::changeStone($_SESSION["btn-change"], $_POST["name"]);
header("location: /app/admin/tables/stone/admin.stone.php");
