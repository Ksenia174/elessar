<div class="modal-wrapper-auth">
    <div class="modal-auth">
        <div class="modal__close-auth">&times;</div>
        <h1>Вход в личный кабинет</h1>
        <div class="modal-window">
            <h2 class="h2-auth">Авторизация</h2>
            <form name="form-auth" action="" method="POST">

                <div class="form-group">
                    <label for="login">Введите Ваш e-mail <em style="color: red;">*</em></label> <br>
                    <input name="login" type="text" id="log" value="<?= $_SESSION['contact']['login'] ?? "" ?>"> <br>
                    <p class="error"><?= $_SESSION['error'] ?? "" ?></p> <br>
                </div>

                <div class="form-group">
                    <label for="password">Введите пароль <em style="color: red">*</em></label> <br>
                    <input type="password" name="password" id="pass"><br>
                </div>

                <button class="auth" name="auth">Войти</button>
            </form>
        </div>
    </div>
</div>

<?php
unset($_SESSION['error']); ?>
<script type="module" src="/assets/js/script.js"></script>
<script src="/assets/js/fetch.js"></script>
<script src="/assets/js/loadModalAuth.js"></script>