<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

use App\models\Section;

$banner = Section::getSectionImg('баннер')[0];

$choices = Section::getSectionImg('преимущества');

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/views/content/admin.home.view.php";