<? require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php";
session_start();
?>

    <div class="block">
        <img class="banner-img" src="/upload/<?= $banner->img ?>" alt="img">
        <div class="block__logo">
            <h1><?= $banner->element ?></h1>
            <p class=""><?= $banner->description ?></p>
            <a href="/app/tables/products/product.php">Перейти в каталог</a>
        </div>
        
    </div>

    <p class="head">Посмотреть по категориям</p>
    <div class="categories-card">
        <? $i = 0;
        for ($k = 0; $k <= 2; $k++) : ?>
            <div class="card-flex">
                <? for ($j = 0; $j <= 1; $j++) : ?>
                    <div class="card grid-one">
                        
                        <div class="image">
                            <img class="category-image img-one" src="/upload/<?= $firstSixCategories[$i]->image ?>" alt="<?= $firstSixCategories[$i]->image ?>">
                            <div class="text">
                                <p class="category"><?= $firstSixCategories[$i]->name ?></p>
                            </div>
                            
                        </div>
                    </div>
                <? $i++;
                endfor ?>
            </div>
        <? endfor ?>
    </div>

    <p class="head">Почему выбирают нас?</p>
    <div class="choice">
        <? foreach ($choices as $choice) : ?>
            <div>
                <img src="/upload/<?= $choice->img ?>" alt="<?= $choice->img ?>">
                <h3><?= $choice->element ?></h3>
                <p><?= $choice->description ?></p>
            </div>
        <? endforeach ?>
    </div>

    <p class="head" id="new">Новинки</p>

    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-inner">

            <?php foreach ($lastFiveProducts as $key => $product) : ?>

                <div class="carousel-item <?= $key == 0 ? 'active' : '' ?>">
                    <img src="/upload/<?= $product->photo ?>" class="img-carousel d-block w-100" alt="<?= $product->photo ?>">
                    <div class="carousel-caption d-none d-md-block">
                        <h2><?= $product->name ?></h2>
                        <a class="more-intelligence" href="/app/tables/products/show.php?id=<?= $product->id ?>">Подробные сведения</a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden"></span>
        </button>
    </div>
<script src="/assets/js/bootstrap.bundle.min.js"></script>


<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php" ?>