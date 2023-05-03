<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

use App\models\Material;

$materials = Material::getAll();

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/views/material/admin.material.view.php";