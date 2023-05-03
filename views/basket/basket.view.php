<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/views/templates/header.php"; ?>


<h2 class="head">Корзина</h2>
<div id="basket">
    <?php foreach ($productInBasket as $product) : ?>
        <div class="card-show-basket basket-position">
            <img src="/upload/<?= $product->photo ?>" class="card-img-top-basket" alt="<?= $product->photo ?>">
            <div class="card-body">
                <div class="card-title">
                    <h4><?= $product->name ?></h4>
                    <p><?= $product->description ?></p>
                </div>
                <div class="count">
                    <button class="btn-product-basket minus" data-product-id="<?= $product->product_id ?>">-</button>
                    <p class="count" id="count-<?= $product->product_id ?>"><?= $product->amount ?> </p>шт.
                    <button class="btn-product-basket plus" data-product-id="<?= $product->product_id  ?>">+</button>
                </div>
                <p class="sumProduct" data-price-position="<?= $product->product_id ?>"><?= $product->price_position ?> </p>₽
                <img class="btn-delete delete" src="/assets/images/delete.png" alt="trash" data-product-id="<?= $product->product_id ?>">
            </div>
        </div>
    <?php endforeach ?>
</div>

<div class="itog">
    <h2>Итого:</h2>
    Сумма: <span class="totalPrice"> <?= (int)$totalPrice ?> </span> ₽ <br>
    Количество: <span class="totalCount"> <?= (int)$totalCount ?> </span> шт
</div>

<div class="btn-form">
    <button class="clear">Очистить корзину</button>

    <form action="/app/tables/basket/order.php" method="POST">
        <button class="design">Оформить заказ</button>
    </form>
</div>



<script src="/assets/js/loadProductInBasket.js"></script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/views/templates/footer.php"; ?>