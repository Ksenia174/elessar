<?php

session_start();

use App\models\User;

require_once $_SERVER['DOCUMENT_ROOT'] . "/bootstrap.php";

if (isset($_POST['login'])) {
    $user = User::getUser($_POST['login'], $_POST['password']);
    if ($user == null) {
        $_SESSION['auth'] = false;
        $_SESSION['error'] = "Пользователь не найден";
    } else {
        $_SESSION["auth"] = true;
        $_SESSION["id"] = $user->id;
        $_SESSION['name'] = $user->name;
    }
    echo json_encode($user, JSON_UNESCAPED_UNICODE);
}