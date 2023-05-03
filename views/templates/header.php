<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/assets/css/carousel.css">
    <link rel="stylesheet" href="/assets/css/style.css">

</head>
<body>
    <div class="wrapper">
        <header class="header">
            <div class="header__container">
                <div class="header__body">
                    <a href="/" class="logo">Elessar</a>
                    <div class="header__burger"><span></span></div>
                    <nav class="header_menu">
                        <ul class="header__list">
                            <li>
                                <a href="/" class="header__link">Главная</a>
                            </li>
                            <li>
                                <a href="/#new" class="header__link">Новинки</a>
                            </li>
                            <li>
                                <a href="/app/tables/products/product.php" class="header__link">Каталог</a>
                            </li>
                            <li>
                                <a href="/app/tables/content/delivery.php" class="header__link">Доставка и оплата</a>
                            </li>
                            <li>
                                <a href="/app/tables/content/about.php" class="header__link">О нас</a>
                            </li>
                            <li>
                                <a href="#" class="header__link">
                                    <img class="nav-img" id="search" src="/assets/images/поиск.png" alt="search">
                                </a>
                            </li>
                            <li>
                                <a href="/app/tables/content/map.php" class="header__link">
                                    <img class="nav-img" id="map" src="/assets/images/marker 1.png" alt="marker">
                                </a>
                            </li>
                            <?php if (!isset($_SESSION['auth']) || !$_SESSION['auth']) : ?>
                                <li>
                                    <a href="#" class="header__link">
                                        <img class="nav-img" id="user" src="/assets/images/user 1.png" alt="user">
                                    </a>
                                </li>
                            <? else : ?>
                                <li>
                                    <a href="/app/tables/basket/basket.php" class="header__link">
                                        <img class="nav-img" src="/assets/images/корзина.png" alt="basket">
                                    </a>
                                </li>
                                <li>
                                    <a class="header__link" href="/app/tables/users/profile.php"><?= $_SESSION['name'] ?? "" ?>
                                    </a>
                                </li>
                                <li>
                                    <a class="header__link" href="/app/tables/users/logout.php">Выйти</a>
                                </li>
                            <? endif ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        <main class="content">
            <div class="container__content">