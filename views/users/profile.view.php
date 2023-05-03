<?php
if (!isset($_SESSION['auth']) || !$_SESSION['auth']) {
    header("Location: /app/tables/users/create.php");
    die();
}
require_once $_SERVER['DOCUMENT_ROOT'] . "/views/templates/header.php";
?>
<div class="profile">
    <h1>Личный кабинет</h1>
    <a href="/app/tables/users/user.orders.php?user=<?= $user->id ?>">Мои заказы</a>
    <div class="data">
        <p>Имя: <?= $user->name ?></p>
        <p>Логин: <?= $user->email ?></p>
        <p>Телефон: <?= $user->number ?></p>
        <a class="nav-link" href="/app/tables/users/logout.php">Выйти</a>
    </div>

</div>


<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/views/templates/footer.php"; ?>