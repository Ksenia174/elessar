<?

use App\models\Section;

require_once $_SERVER['DOCUMENT_ROOT'] . "/bootstrap.php";

$elements = Section::getSectionElements('доставка и оплата');

require_once $_SERVER["DOCUMENT_ROOT"] . "app/admin/tables/content/admin.delivery.view.php";