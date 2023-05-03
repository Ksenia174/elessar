<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

use App\models\Stone;

$stones = Stone::getAll();

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/views/stone/admin.stone.view.php";