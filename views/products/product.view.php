<? require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php"; ?>


<p class="head"> Каталог</p>
<div class="product-card">
    <? foreach ($products as $product) : ?>

        <div class="product">
            <div class="add">
                <button class="add-in-basket" id="btn-<?= $product->id ?>" data-btn-id="<?= $product->id ?>">Добавить в корзину</button>
                <img class="img-basket" src="/assets/images/shopping-basket 1.png" alt="basket">
            </div>

            <img class="product-image" src="/upload/<?= $product->photo ?>" alt="<?= $product->photo ?>"> <br>
            <p class="product-name"><?= $product->name ?></p>
            <p class="product-description"><?= $product->description ?></p>
            <p class="product-price"><?= number_format($product->price, 0, ',', ' ') ?> ₽</p>
            <div class="more">
                <a class="more-product" href="/app/tables/products/show.php?id=<?= $product->id ?>">Подробные сведения</a>
            </div>
        </div>

    <? endforeach ?>
</div>


<script src="/assets/js/product.js"></script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php'; ?>