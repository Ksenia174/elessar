<?php
use App\models\User;
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
unset($_SESSION['contact']);
$names = [];
$logins = [];
$numbers = [];
if(isset($_POST["login"])){

    $_SESSION['contact']['name'] = $_POST['name'];
    $_SESSION['contact']['login'] = $_POST['login'];
    $_SESSION['contact']['number'] = $_POST['number'];

    if (empty($_POST['name'])) {
        $_SESSION['error']['data']['name'] = "Заполните поле";
    }elseif (!preg_match("/^[А-ЯЁа-яё][а-яё]+$/u", $_POST["name"], $names)) {
        $_SESSION['error']['data']['name'] = "Некорректное имя";
    }else $_SESSION["name"] = $names[0];

    if (empty($_POST['login'])) {
        $_SESSION['error']['data']['login'] = "Заполните поле";
    }elseif(User::findLogin($_POST["login"])){
        $_SESSION['error']['data']['login'] = "Такая почта существует";
    }elseif (!preg_match("/([A-Za-z0-9]+@[a-z]+\.[a-z]+)/u", $_POST["login"], $logins)) {
        $_SESSION['error']['data']['login'] = "некорректный email";
    } else $_SESSION["login"] = $logins[0];

    if (empty($_POST['number'])) {
        $_SESSION['error']['data']['number'] = "Заполните поле";
    }elseif(User::findNumber($_POST["number"])){
        $_SESSION['error']['data']['number'] = "Такой номер телефона уже существует";
    }elseif (!preg_match('~^(?:\+7|8)\d{10}$~', $_POST["number"], $numbers)) {
        $_SESSION['error']['data']['number'] = "некорректный номер телефона";
    } else $_SESSION["number"] = $numbers[0];

    if (empty($_POST['password'])) {
        $_SESSION['error']['data']['password'] = "Заполните поле";
    }

    if (empty($_POST['password_confirmation'])) {
        $_SESSION['error']['data']['password_confirmation'] = "Заполните поле";
    }elseif ($_POST["password"] != $_POST["password_confirmation"]) {
        $_SESSION['error']['data']['password'] = "пароли не совпадают";
    }

    $user = User::getUser($_POST['login'], $_POST['password']);

    if ($user != null) {
        $_SESSION['error']['reg'] = 'Такой человек уже зарегистрирован';
    }
    if (!filter_var($_POST['login'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error']['login'] = 'Неправильный email';
    }
    if ($_POST['password'] == $_POST['password_confirmation']) {
        if (User::insert($_POST)) {
            $user = User::getUser($_POST['login'], $_POST['password']);
            $_SESSION['auth'] = true;
            $_SESSION['name'] = $_POST['name'];
            $_SESSION['id'] = $user->id;
        } else {
            $_SESSION['auth'] = false;
        }
    } else {
        $_SESSION['error']['password'] = 'Пароли не совпадают';
    }
    echo json_encode($user, JSON_UNESCAPED_UNICODE);
}

