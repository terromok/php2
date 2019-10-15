<?

use app\models\entities\{Basket, Product, User};
use app\models\repositories\{ProductRepository, UserRepository};
use app\engine\Db;

//$user = new UserRepository("Kolya", 123);
//$user->save();

//$product = new ProductRepository("Шляпапа", "prod4.png", "Super shlapapa", 1243);
//$product->save();

$product = Product::getOne(4);
$product->setName("Сникерс2");
$product->setPrice(255);
$product->save();