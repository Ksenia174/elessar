<?php
session_start();

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/views/templates/header.php"; ?>

<div class="categories">
<a href="/app/admin/tables/categories/admin.category.php">Назад</a>
    <div class="card one" style="height: 20rem;">
        <form action="/app/admin/tables/categories/admin.change.category.save.php" method="POST" enctype="multipart/form-data">
            <div class="card-body">
                <label for="image">файл</label>
                <input type="file" name="image" id="image">

                <div>
                    <img style="width: 150px;" src="/upload/<?= $categories->image ?>" alt="image" id="loadedImage" class="imgload">
                    <input type="text" name="oldImage" value="<?= $categories->image ?>">
                </div>
                <p><?= $_SESSION["error"] ?? "" ?></p>
                <label for="name">Название</label>
                <input type="text" size="40" name="name" value="<?= $categories->name ?>">
                <br>
                <button name="save-category" value="<?= $categories->id ?>">Сохранить</button>
            </div>
        </form>
    </div>
</div>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/views/templates/footer.php" ?>