<?php

use App\models\Order;

session_start();

if (!$_SESSION["admin"]) {
    header("location: /");
}

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$order_id = $_GET["order"];

$products = Order::getAllProductsByOrder($order_id);

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/views/order/admin.orderProduct.view.php";
