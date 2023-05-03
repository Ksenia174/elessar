<? require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/views/templates/header.php";?>

<div class="profile_admin">
    <h1>Профиль</h1>
    <p>Имя: <?= $admin->name ?></p>
    <p>Почта: <?= $admin->email ?></p>
</div>

<? require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/views/templates/footer.php";?>