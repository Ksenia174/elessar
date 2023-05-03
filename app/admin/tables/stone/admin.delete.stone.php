<?php

use App\models\Stone;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$stones = Stone::getAll();

$stream = file_get_contents("php://input");

if ($stream != null) {
    $id = json_decode($stream)->id;
    $delete = Stone::deleteStone($id);
    echo json_encode( $delete, JSON_UNESCAPED_UNICODE);
}

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/views/stone/admin.stone.view.php";