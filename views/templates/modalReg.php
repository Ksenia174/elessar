<div class="modal-wrapper-reg">
    <div class="modal">
        <div class="modal__close">&times;</div>
        <h1>Вход в личный кабинет</h1>
        <div class="modal-window">
            <h2 class="h2-reg">Регистрация</h2>
            <form name="form-registration" action="" method="POST">
                <div class="form-group">
                    <label for="name">Укажите Ваше имя <em style="color: red;">*</em></label> <br>
                    <input name="name" type="text" id="name" value="<?= $_SESSION['contact']['name'] ?? "" ?>"> <br>
                    <p class="error"><?= $_SESSION['error']['data']['name'] ?? "" ?></p> <br>
                </div>

                <div class="form-group">
                    <label for="login">Укажите Ваш e-mail <em style="color: red;">*</em></label> <br>
                    <input name="login" type="text" id="log" value="<?= $_SESSION['contact']['login'] ?? "" ?>"> <br>
                    <p class="error"><?= $_SESSION['error']['data']['login'] ?? "" ?></p> <br>
                </div>

                <div class="form-group">
                    <label for="number">Укажите Ваш номер телефона <em style="color: red;">*</em></label> <br>
                    <input name="number" type="text" id="num" value="<?= $_SESSION['contact']['number'] ?? "" ?>"> <br>
                    <p class="error"><?= $_SESSION['error']['data']['number'] ?? "" ?></p> <br>
                </div>

                <div class="form-group">
                    <label for="password">Придумайте пароль <em style="color: red">*</em></label> <br>
                    <input type="password" name="password" id="pass"><br>
                    <p class="error"><?= $_SESSION['error']['data']['password'] ?? "" ?></p> <br>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Подтвердите пароль <em style="color: red">*</em></label> <br>
                    <input type="password" name="password_confirmation" id="password_confirmation">
                    <p class="error"><?= $_SESSION['error']['data']['reg'] ?? "" ?></p> <br>
                </div>
                <h5>Уже зарегестрированы? <a class="a-auth" href="#">Авторизоваться</a></h5>
                <button class="registration" name="registration">Зарегистрироваться</button>
            </form>
        </div>
    </div>
</div>




<?php unset($_SESSION['error']);
unset($_SESSION['contact']); ?>
<script type="module" src="/assets/js/script.js"></script>
<script src="/assets/js/fetch.js"></script>
<script src="/assets/js/loadModal.js"></script>