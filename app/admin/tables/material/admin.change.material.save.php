<?php

use App\models\Material;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

unset($_SESSION["error"]);

if (!$_SESSION["admin"]) {
    header("location: /");
}
Material::changeMaterial($_SESSION["btn-change"], $_POST["name"]);
header("location: /app/admin/tables/material/admin.material.php");