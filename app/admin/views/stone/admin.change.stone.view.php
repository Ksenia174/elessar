<?php
session_start();

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/views/templates/header.php"; ?>

<div class="categories">
<a href="/app/admin/tables/stone/admin.stone.php">Назад</a>
    <div class="card one" style="height: 20rem;">
        <form action="/app/admin/tables/stone/admin.change.stone.save.php" method="POST">
            <div class="card-body">
                <label for="name">Название</label>
                <input type="text" size="40" name="name" value="<?= $stone->name ?>">
                <br>
                <button name="save-category" value="<?= $stone->id ?>">Сохранить</button>
            </div>
        </form>
    </div>
</div>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/views/templates/footer.php" ?>