<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/views/templates/header.php"; ?>

<a href="/app/tables/products/product.php">Обратно в каталог</a>
<div class="card-one-product">
    <img src="/upload/<?= $product->photo ?>" class="product-image-show" alt="<?= $product->photo ?>">
    <div class="card-body-show">
        <h5 class="card-title-show"><?= $product->name ?></h5>
        <h5 class="card-text-show"><?= $product->price ?>₽</h5>
        <p class="card-text-show">Количество на складе: <?= $product->amount ?> шт.</p>
        <p class="card-text-show">Категория: <?= $product->category ?></p>
        <p class="card-text-show">Камень: <?= $product->stone ?></p>
        <p class="card-text-show">Материал: <?= $product->material ?></p>
    </div>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/views/templates/footer.php"; ?>