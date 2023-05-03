<?php
session_start();

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/views/templates/header.php"; ?>

<div class="material">
<a href="/app/admin/tables/material/admin.material.php">Назад</a>
    <div class="card one" style="height: 20rem;">
        <form action="/app/admin/tables/material/admin.change.material.save.php" method="POST">
            <div class="card-body">
                <label for="name">Название</label>
                <input type="text" size="40" name="name" value="<?= $material->name ?>">
                <br>
                <button name="save-category" value="<?= $material->id ?>">Сохранить</button>
            </div>
        </form>
    </div>
</div>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/views/templates/footer.php" ?>