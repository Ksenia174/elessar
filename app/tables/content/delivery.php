<?

use App\models\Section;

require_once $_SERVER['DOCUMENT_ROOT'] . "/bootstrap.php";

// $delivery = Section::getSectionText('доставка и оплата');
$elements = Section::getSectionElements('доставка и оплата');
// echo('<pre>');
// var_dump($elements);
// echo('</pre>');
require_once $_SERVER["DOCUMENT_ROOT"] . "/views/content/delivery.view.php";