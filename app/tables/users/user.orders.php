<?php

use App\models\Order;
use App\models\User;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if (!isset($_SESSION['auth']) || !$_SESSION['auth']) {
    header("Location: /app/tables/users/create.php");
    die();
}

$user_id = $_GET['user'];

$orders = Order::getAllOrdersByUser($user_id);

require_once $_SERVER["DOCUMENT_ROOT"] . "/views/users/users.orders.view.php";