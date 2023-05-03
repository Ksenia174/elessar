<?php
session_start();

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/views/templates/header.php";
?>

<div class="products">
    <a href="/app/admin/tables/material/admin.material.php">назад</a>
    <h1>Товары с материалом:  <?= $material->name ?></h1>

    <table class="table">
        <thead>
            <th class="col">Фото</th>
            <th class="col">Название</th>
            <th class="col">Цена</th>
            <th class="col">Кол-во</th>
            <th class="col">Камень</th>
            <th class="col">Материал</th>
        </thead>
        <tbody>
            <?php foreach($products as $product): ?>
            <tr>
            <td class="col"><img style="width: 100px;" id="loadedImage" src="/upload/<?= $product->photo ?>" alt="<?= $product->photo ?>"></td>
            <td class="col"><?= $product->product_name ?></td>
            <td class="col"><?= $product->price ?></td>
            <td class="col"><?= $product->amount ?></td>
            <td class="col"><?= $product->stone ?></td>
            <td class="col"><?= $product->material ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/app/admin/views/templates/footer.php'; ?>