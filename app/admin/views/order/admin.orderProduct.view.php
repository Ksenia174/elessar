<?php

use App\models\Order;


session_start();

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/views/templates/header.php";
?>


<div class="orders">

    <a href="/app/admin/tables/order/admin.order.php">Вернуться назад</a>
    <h1>Продукты в заказе <?= $order_id ?></h1>
    <h3>Пользователь: <?= Order::find($order_id)->login ?></h3>
    <h3>Дата создания: <?= Order::find($order_id)->date_of_registrations ?></h3>
    <h2>Общее кол-во: <?= Order::getCountAllByOrder($order_id)->count_product_order ?> шт</h2>
    <h2>Итог: <?= Order::getPriceAllByOrder($order_id)->price_product_order ?>₽</h2>
    <table class="table">

        <thead>
            <tr>
                <th scope="col">Продукт</th>
                <th scope="col">Стоимость</th>
                <th scope="col">Количество</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?= $product->name ?></td>
                    <td><?= $product->price_product_order ?></td>
                    <td><?= $product->product_count ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/views/templates/footer.php"; ?>