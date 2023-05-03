<?

use App\models\Section;

require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php"; ?>


    <div class="contacts">
        <? foreach ($elements as $item) : ?>
            <div class="contacts__container">
                <p><?= $item->name ?></p>
                <div class="contacts-image">
                    <? foreach (Section::getElementImg($item->id) as $img) : ?>
                        <p><a href="<?= $img->content ?>"><img src="/upload/<?= $img->img ?>" alt="<?= $img->img ?>"></a></p>
                    <? endforeach ?>
                    <p><?= $item->description ?></p>
                </div>
            </div>
        <? endforeach ?>
    </div>
    
    <div class="iframe">
        <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A811efac08a43a8ec2d47b9de68b06142af8dc2b439ec4b2931285aeeb94bd010&amp;source=constructor" width="600" height="400" frameborder="0"></iframe>
    </div>



<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php" ?>