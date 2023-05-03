<?php

use App\models\Material;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$materials = Material::getAll();

$stream = file_get_contents("php://input");

if ($stream != null) {
    $id = json_decode($stream)->id;
    $delete = Material::deleteMaterial($id);
    echo json_encode( $delete, JSON_UNESCAPED_UNICODE);
}

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/views/material/admin.material.view.php";