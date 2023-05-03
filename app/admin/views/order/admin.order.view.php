<?php

use App\models\Order;

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/views/templates/header.php";
?>


<div class="orders">
    <h1>Заказы</h1>
    <!-- <div class="form-check">
        <input value="all" id="all" class="form-check-input" type="checkbox" name="status">
        <label class="form-check-label" for="all">Все</label>
    </div>

    <?php foreach ($statuses as $status) : ?>
        <div class="form-check">
            <input value="<?= $status->id ?>" id="<?= $status->id ?>" class="form-check-input" type="checkbox" name="status">
            <label class="form-check-label" for="<?= $status->id ?>"><?= $status->name ?></label>
        </div>
    <?php endforeach ?>

    <p class="count-orders"></p> -->
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Номер заказа</th>
                <th scope="col">Клиент</th>
                <th scope="col">статус</th>
                <th scope="col">Изменить статус</th>
                <th scope="col">дата создания</th>
                <th scope="col">дата выполнения</th>
                <th scope="col">Товаров в заказе</th>
            </tr>
        </thead>
        <tbody class="container-orders">
            <?php foreach ($orders as $order) : ?>
                <tr>
                    <td><?= $order->order_id ?></td>
                    <td><?= $order->login ?></td>
                    <form action="/app/admin/tables/order/admin.change.status.php" method="POST">
                        <td><?= $order->statuse ?></td>
                        <td><button name="btn-change-status" value="<?= $order->order_id ?>">&#x2710;</button></td>
                    </form>
                    <td><?= $order->date_of_registrations ?></td>
                    <td><?= $order->date_of_complection ?></td>
                    <td><?= Order::countByOrder($order->order_id)->count_product_order ?></td>
                    <td>
                        <a href="/app/admin/tables/order/admin.productByOrder.php?order=<?= $order->order_id ?>" data-order-id="<?= $order->order_id ?>" name="btn-show-products">Товары</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/views/templates/footer.php"; ?>