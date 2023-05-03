<? require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php";?>

<p class="head">Почему выбирают нас?</p>
    <div class="about">
        <? foreach ($about as $item) : ?>
            
            <div class="about_us">
                <img class="about_img" src="/upload/<?= $item->img ?>" alt="<?= $item->img ?>">
                <div>
                    <h3><?= $item->element ?></h3>
                <p class="paragraph"><?= $item->description ?></p>
                </div>
                
            </div>
        <? endforeach ?>
    </div>
<? require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php";?>
