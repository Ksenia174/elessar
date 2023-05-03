<?php
if (!isset($_SESSION['auth']) || !$_SESSION['auth']) {
    header("Location: /app/tables/users/create.php");
    die();
}
require_once $_SERVER['DOCUMENT_ROOT'] . "/views/templates/header.php";
?>
<div class="user_orders">
    <h1>Вaши заказы</h1>
    <? foreach($orders as $order):?>
    <div class="order">
        <p>Статус <?= $order->statuse?></p>
        <p>Фотография<img class="user_orders_photo" src="/upload/<?= $order->photo_products ?>" alt="<?= $order->photo_products ?>"></p>
        <p>Наименование: <?= $order->name_product ?></p>
        <p>Количество: <?= $order->count ?></p>
        <p>Цена: <?= $order->price ?></p>
    </div>
    <? endforeach ?>

</div>


<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/views/templates/footer.php"; ?>