<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/views/templates/header.php"; ?>

<div class="material">
    <h1>Материал</h1>
    <div class="Admin-container">
        <div class="form-group">
            <h3>Добавить материал</h3>
            <form class="addMaterial" action="/app/admin/tables/material/admin.addMaterial.php" method="POST">
                <label for="name">Введите название
                    <input type="text" class="form-control" name="name">
                </label>

                <button class="button" name="InsertMaterial"> Добавить </button>
            </form>
        </div>
        <div class="card">
            <ul class="list-group list-group-flush">
                <table>
                    <tr>
                        <th>Название</th>
                        <th>Изменить</th>
                        <th>Товары</th>
                        <th>Удалить</th>
                    </tr>
                    <?php foreach ($materials as $material) : ?>
                        <tr>
                            <td><?= $material->name ?></td>
                            <td>
                                <form action="/app/admin/tables/material/admin.change.material.php" method="POST"><button class="change" name="btn-change" value="<?= $material->id ?>">Изменить &#x2710;</button></form>
                            </td>
                            <td><a class="btn" href="/app/admin/tables/material/admin.productsMaterial.php?id=<?= $material->id ?>">Товары</a></td>
                            <form class="delMaterial" action="/app/admin/tables/material/admin.delete.material.php" method="POST">
                                <td class="list-group-item position-material">
                                    <button class="trash" data-id="<?= $material->id ?>">Удалить &#x2716;</button>
                                </td>
                            </form>
                        </tr>
                    <?php endforeach ?>
                </table>
            </ul>
        </div>
    </div>
    <script src="/app/admin/assets/js/loadMaterial.js"></script>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/app/admin/views/templates/footer.php'; ?>