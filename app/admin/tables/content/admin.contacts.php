<?

use App\models\Section;

require_once $_SERVER['DOCUMENT_ROOT'] . "/bootstrap.php";

$elements = Section::getSectionElements('контакты');

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/views/content/admin.contacts.view.php";