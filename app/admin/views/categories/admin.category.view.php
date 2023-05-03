<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/views/templates/header.php"; ?>

<div class="category">
    <h1>Категории</h1>
    <div class="Admin-container">
        <div class="form-group">
            <h3>Добавить категорию</h3>
            <form class="addCategory" action="/app/admin/tables/categories/admin.addCategory.php" method="POST" enctype="multipart/form-data">
                <label for="name">Введите название категории
                    <input type="text" class="form-control" name="name">
                </label>
                <label for="image">Фото категории
                    <input type="file" name="image" id="image">
                </label>
                <button class="button" name="InsertCategory"> Добавить </button>
            </form>
        </div>
        <div class="card">
            <ul class="list-group list-group-flush">
                <table>
                    <tr>
                        <th>Изображение</th>
                        <th>Название</th>
                        <th>Изменить</th>
                        <th>Товары</th>
                        <th>Удалить</th>
                    </tr>
                    <?php foreach ($categories as $cat) : ?>
                        <tr>
                            <td><img class="img-admin" src="/upload/<?= $cat->image ?>" alt="<?= $cat->image ?>"></td>
                            <td><?= $cat->name ?></td>
                            <td>
                                <form action="/app/admin/tables/categories/admin.change.category.php" method="POST"><button class="change" name="btn-change" value="<?= $cat->id ?>">Изменить &#x2710;</button></form>
                            </td>
                            <td><a class="btn" href="/app/admin/tables/categories/admin.productsCategory.php?id=<?= $cat->id ?>">Товары</a></td>
                            <form class="delCategory" action="/app/admin/tables/categories/admin.delete.category.php" method="POST">
                            <td class="list-group-item position-category">
                                <button class="trash" data-id="<?= $cat->id ?>">Удалить &#x2716;</button>
                            </td>
                            </form>
                          
                            
                        </tr>
                    <?php endforeach ?>
                </table>
            </ul>
        </div>
    </div>
    <script src="/app/admin/assets/js/loadCategory.js"></script>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/app/admin/views/templates/footer.php'; ?>