<?

use App\models\Basket;

require_once $_SERVER['DOCUMENT_ROOT'] . "/bootstrap.php";

$user_id = $_SESSION['id'];
$productInBasket =  Basket::productsInBasket($user_id);
$totalPrice = Basket::totalPrice($user_id);
$totalCount = Basket::totalCount($user_id);

require_once $_SERVER["DOCUMENT_ROOT"] . "/views/basket/basket.view.php";