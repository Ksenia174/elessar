<?php
session_start();

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/views/templates/header.php";
?>

<div class="products">
<a href="/app/admin/tables/order/admin.order.php">Вернуться назад</a>

    <form action="/app/admin/tables/order/admin.change.status.save.php" method="POST">
    <select name="status" id="categories">
        <?php foreach ($statuses as $status) : ?>
            <option value="<?= $status->id ?>"><?= $status->name ?></option>
        <?php endforeach ?>
    </select>
     <textarea name="message"></textarea>
     <p><button name="btn-create-status" value="<?= $order_id ?>">Сохранить</button></p>
    </form>   
    <p><?= $_SESSION["error"]??"" ?></p>    
</div>

<script>
    let selectStatus = document.querySelector("[name = status]");
    let textarea = document.querySelector('textarea');
    textarea.style.display = 'none';
    
    document.addEventListener("click", (event) => {
        let status = selectStatus.value;
        let message = document.querySelector("[name = message]").value;
        let btn = document.querySelector("[name = btn-create-status]");
        btn.disabled = false;
        textarea.style.display = 'none';

        if(status == 3 && message == ""){
            textarea.style.display = 'block';
            btn.disabled = true;
        }
    })
</script>

<? require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/views/templates/footer.php"; ?>