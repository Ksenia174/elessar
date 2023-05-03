<?

use App\models\Section;

require_once $_SERVER['DOCUMENT_ROOT'] . "/bootstrap.php";

$about = Section::getSectionImg('о нас');

require_once $_SERVER["DOCUMENT_ROOT"] . "/views/content/about.view.php";