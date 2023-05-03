<?php
session_start();

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/views/templates/header.php"; ?>



<a href="/app/admin/tables/products/admin.products.php">Назад</a>
<h1>Добавить товар</h1>
<form class="addProduct" action="/app/admin/tables/products/admin.addProduct.save.php" method="POST" enctype="multipart/form-data">
    <div class="form-group"> <label for="name">Наименование</label>
        <input type="text" name="name">
    </div>
    <div class="form-group"> <label for="description">Описание</label>
        <textarea rows="10" cols="40" name="description"></textarea>
    </div>
    <div class="form-group">
        <input type="file" id="image" name="image">
        <img src="" id="loadedImage" alt="image">
        <h2><?= $_SESSION["error"] ?? "" ?></h2>
    </div>
    <div class="form-group">
        <label for="price">Цена</label>
        <input type="text" name="price">
    </div>
    <div class="form-group">
        <label for="amount">Количество</label>
        <input type="number" name="amount">
    </div>
    <div class="form-group">
        <label for="category">Категория</label>
        <select name="category_id">
            <?php foreach ($categories as $category) : ?>
                <option value="<?= $category->id ?>"><?= $category->name ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group"> <label for="stone">Камень</label>
        <select name="stone_id">
            <?php foreach ($stones as $stone) : ?>
                <option value="<?= $stone->id ?>"><?= $stone->name ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label for="material">Материал</label>
        <select name="material_id">
            <?php foreach ($materials as $material) : ?>
                <option value="<?= $material->id ?>"><?= $material->name ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <button name="save-product">Сохранить</button>
</form>

<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/views/templates/footer.php" ?>