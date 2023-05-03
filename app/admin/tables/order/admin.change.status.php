<?php

use App\models\Order;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
//var_dump($_SESSION);
// if(!$_SESSION["admin"]){
//     header("location: /");
// }


$statuses = Order::allStatus();

if(isset($_POST["btn-change-status"])){
    $_SESSION["btn-change-status"] = $_POST["btn-change-status"];    
}

$order_id = $_SESSION["btn-change-status"];

require_once $_SERVER["DOCUMENT_ROOT"]."/app/admin/views/order/admin.change.status.view.php";