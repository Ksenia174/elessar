<?

use App\models\Section;

require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php"; ?>
<main class="container">
    <p class="head">Доставка и оплата</p>
    <div class="delivery">
        <? foreach ($elements as $item) : ?>
            <div class="delivery-container">
                <h3><?= $item->name ?></h3>
                <p><?= $item->description ?></p>
                <? foreach (Section::getElementTexts($item->id) as $text) : ?>
                    <div class="information">
                        <p><?= $text->text ?></p>
                        <p><?= $text->content ?></p>
                    </div>
                <? endforeach ?>
            </div>
        <? endforeach ?>
    </div>
</main>


<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php"; ?>