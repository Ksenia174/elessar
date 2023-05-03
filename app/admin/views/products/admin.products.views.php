<?php

use App\models\Product;

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/views/templates/header.php"; ?>

<h1>Товары</h1>
<div class="prod">

    <div class="check_product">
        <form action="" method="POST">

            <div class="form-check">
                <input value="all" id="all" class="form-check-input" type="checkbox" checked name="category" onchange="this.form.submit()">
                <label class="form-check-label" for="all">Все</label>
            </div>

            <?php foreach ($categories as $category) : ?>
                <div class="form-check">
                    <input onchange="this.form.submit()" value="<?= $category->id ?>" id="<?= $category->id ?>" class="form-check-input" type="checkbox" name="category[]">
                    <label class="form-check-label" for="<?= $category->id ?>"><?= $category->name ?></label>
                </div>
            <?php endforeach ?>
        </form>
    </div>

    <div class="main-poduct">
        <a href="/app/admin/tables/products/admin.addProduct.php">Добавить товар</a>
        <table class="table-product">
            <thead>
                <tr>
                    <th scope="col">Изображение</th>
                    <th scope="col">Наименование</th>
                    <th scope="col">Описание</th>
                    <th scope="col">Цена</th>
                    <th scope="col">Количество</th>
                    <th scope="col">Категория</th>
                    <th scope="col">Камень</th>
                    <th scope="col">Материал</th>
                    <th scope="col">Дата добавления</th>
                    <th scope="col">Действия</th>

                </tr>
            </thead>
            <tbody class="container-products">
                <?php foreach ($products as $product) : ?>
                    <tr>
                        <td><img class="img-admin" src="/upload/<?= $product->photo ?>" alt="<?= $product->photo ?>"></td>
                        <td><?= $product->name ?></td>
                        <td><?= $product->description ?></td>
                        <td><?= $product->price ?></td>
                        <td><?= $product->amount ?></td>
                        <td><?= Product::find($product->id)->category ?></td>
                        <td><?= Product::find($product->id)->stone ?></td>
                        <td><?= Product::find($product->id)->material ?></td>
                        <td><?= $product->createDate ?></td>
                        <td>
                            <form action="/app/admin/tables/products/admin.change.product.php" method="POST">
                                <button class="change" name="btn-change" value="<?= $product->id ?>">Изменить &#x2710;</button>
                            </form>
                            <form action="/app/admin/tables/products/admin.delete.product.php" method="POST">
                                <button class="delete" name="btn-del" value="<?= $product->id ?>">Удалить &#x2716;</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

    </div>

   
</div>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/app/admin/views/templates/footer.php'; ?>