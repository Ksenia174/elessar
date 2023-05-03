<?

use App\models\Category;
use App\models\Product;
use App\models\Section;

require_once $_SERVER['DOCUMENT_ROOT'] . "/bootstrap.php";

$firstSixCategories = Category::getFirstSix();

$banner = Section::getSectionImg('баннер')[0];
$choices = Section::getSectionImg('преимущества');

$lastFiveProducts = Product::lastFiveProduct();

require_once $_SERVER["DOCUMENT_ROOT"] . "/views/products/index.view.php";