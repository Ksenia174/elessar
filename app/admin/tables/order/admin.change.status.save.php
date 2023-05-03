<?php
use App\models\Order;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";


if (isset($_POST["btn-create-status"])) {
    if ($_POST["status"] == 3) {
        if (preg_match("/^(?=.{10,})(?=(.*[^а-яёА-ЯЁ])).*$/u", $_POST["message"])) {
            Order::changeStatus($_POST["btn-create-status"], $_POST["status"], $_POST["message"]);
            header("location: /app/admin/tables/order/admin.order.php");
        } else {
            $_SESSION["error"] = "Ошибка";
            header("location: /app/admin/tables/order/admin.change.status.php");
        }
    } else {
        Order::changeStatus($_POST["btn-create-status"], $_POST["status"], $_POST["message"]);
        header("location: /app/admin/tables/order/admin.order.php");
    }
}


