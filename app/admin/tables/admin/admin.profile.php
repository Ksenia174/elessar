<?php

use App\models\User;


require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";


if (!isset($_SESSION['admin']) || !$_SESSION['admin']) {
    header("Location: /app/admin/index.php");
    die();
}

$admin = User::find($_SESSION['id']);

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/views/admin/admin.profile.view.php";
