<?php
session_start();

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/views/templates/header.php"; ?>

<div class="products">
<a href="/app/admin/tables/products/admin.products.php">Назад</a>
    <div class="card one" style="height: 20rem;">
        <form action="/app/admin/tables/products/admin.change.product.save.php" method="POST" enctype="multipart/form-data">
            <div class="card-body">
                <label for="image">файл</label>
                <input type="file" name="image" id="image">

                <div>
                    <img style="width: 150px;" src="/upload/<?= $product->photo ?>" alt="image" id="loadedImage" class="imgload">
                    <input type="text" name="oldImage" value="<?= $product->photo ?>">
                </div>
                <p><?= $_SESSION["error"] ?? "" ?></p>
                <label for="name">Название</label>
                <input type="text" size="40" name="name" value="<?= $product->name ?>">

                <label for="price">Цена</label>
                <input type="number" size="40" name="price" value="<?= $product->price ?>">

                <label for="amount">Количество</label>
                <input type="number" size="40" name="amount" value="<?= $product->amount ?>">


                <label for="description">Описание</label> <br>
                <textarea name="description" id="" cols="30" rows="10"><?= $product->description ?></textarea>

                <label for="category">Категория</label>
                <select name="category_id">
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?= $category->id ?>"><?= $category->name ?></option>
                    <?php endforeach ?>
                </select>

                <label for="stone">Камень</label>
                <select name="stone_id">
                    <?php foreach ($stones as $stone) : ?>
                        <option value="<?= $stone->id ?>"><?= $stone->name ?></option>
                    <?php endforeach ?>
                </select>

                <label for="material">Материал</label>
                <select name="material_id">
                    <?php foreach ($materials as $material) : ?>
                        <option value="<?= $material->id ?>"><?= $material->name ?></option>
                    <?php endforeach ?>
                </select>
                <button name="save-product" value="<?= $product->id ?>">Сохранить</button>
            </div>
        </form>
    </div>
</div>

<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/views/templates/footer.php" ?>