<?php

use App\models\User;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

unset($_SESSION["error"]);

if (isset($_POST["AdminAuthBtn"])) {
    $user = User::getUser($_POST["login"], $_POST["password"]);

    if ($user == null) {
        $_SESSION["admin"] = false;
        $_SESSION["error"] = "Пользователь не найден";
        header("Location: /app/admin/tables/admin/admin.auth.php");
        die();
    } else {
        if ($user->role == "администратор") {
            $_SESSION["admin"] = true;
            $_SESSION["id"] = $user->id;
            header("Location: /app/admin/tables/admin/admin.profile.php");
        } else {
            $_SESSION["error"] = "Вы обычный пользователь";
            header("Location: /app/admin/tables/admin/admin.auth.php");
        }
    }
}