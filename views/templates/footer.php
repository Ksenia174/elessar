<?

use App\models\Section;

$elements = Section::getSectionElements('контакты');
?>
</div>
</div>
<div class="footer">

    <p>© 2022 Elessar</p>
    <? foreach ($elements as $item) : ?>
        <div class="container-footer">

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

<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/modalReg.php" ?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/modalAuth.php" ?>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="/assets/js/menu.js"></script>

</body>

</html>