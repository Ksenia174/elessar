<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/views/templates/header.php"; ?>

<div class="stone">
    <h1>Камни</h1>
    <div class="Admin-container">
        <div class="form-group">
            <h3>Добавить камень</h3>
            <form class="addStone" action="/app/admin/tables/stone/admin.addStone.php" method="POST">
                <label for="name">Введите название
                    <input type="text" class="form-control" name="name">
                </label>

                <button class="button" name="InsertStone"> Добавить </button>
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
                    <?php foreach ($stones as $stone) : ?>
                        <tr>
                            <td><?= $stone->name ?></td>
                            <td>
                                <form action="/app/admin/tables/stone/admin.change.stone.php" method="POST"><button class="change" name="btn-change" value="<?= $stone->id ?>">Изменить &#x2710;</button></form>
                            </td>
                            <td><a class="btn" href="/app/admin/tables/stone/admin.productsStone.php?id=<?= $stone->id ?>">Товары</a></td>
                            <form class="delStone" action="/app/admin/tables/stone/admin.delete.stone.php" method="POST">
                            <td class="list-group-item position-stone">
                                <button class="trash" data-id="<?= $stone->id ?>">Удалить &#x2716;</button>
                            </td>
                            </form>
                            
                            
                        </tr>
                    <?php endforeach ?>
                </table>
            </ul>
        </div>
    </div>
    <script src="/app/admin/assets/js/loadStone.js"></script>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/app/admin/views/templates/footer.php'; ?>