<? session_start() ?>
<form class="form" action="/app/admin/tables/admin/admin.auth.check.php" method="POST">
    <label for="login">Введите логин</label>
    <input type="login" class="form-control" name="login">
    <label for="password" class="form-label">Пароль</label>
    <input type="password" name="password" class="form-control" id="password">

    <?php if (!empty($_SESSION["error"])) : ?>
        <p class="error"><?= $_SESSION["error"] ?></p>
    <?php endif ?>

    <div class="form-group">
        <button class="button" name="AdminAuthBtn">Войти</button>
    </div>
</form>

<?php unset($_SESSION["error"]); ?>