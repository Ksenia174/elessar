<?php

use App\models\Order;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
unset($_SESSION["error"]);
$orders = Order::getAll();

$statuses = Order::allStatus();
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/views/order/admin.order.view.php";
