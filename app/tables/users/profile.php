<?php

use App\models\User;

require_once $_SERVER['DOCUMENT_ROOT'] . "/bootstrap.php";

if (!isset($_SESSION['auth']) || !$_SESSION['auth']) {
    header("Location: /app/tables/users/create.php");
    die();
}

$user = User::find($_SESSION['id']);

require_once $_SERVER['DOCUMENT_ROOT'] . "/views/users/profile.view.php";
