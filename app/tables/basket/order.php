<?php

use App\models\Order;

require_once $_SERVER['DOCUMENT_ROOT'] . "/bootstrap.php";

$user_id = $_SESSION['id'];

$message = Order::create($user_id);

$_SESSION["message"] = $message;

require_once $_SERVER['DOCUMENT_ROOT'] . "/views/products/order.view.php"; 