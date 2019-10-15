<?
//Что можно еще улучшить
//TODO 1 сделать оптимальным UPDATE
//TODO 2 сделать авторизацию по Hash и зашифровать пароль в БД
session_start();

use app\engine\App;

//include $_SERVER['DOCUMENT_ROOT'] . "/../engine/Autoload.php";
//spl_autoload_register([new Autoload(), 'loadClass']);

require_once '../vendor/autoload.php';
$config = include __DIR__ . "/../config/config.php";


try {
    App::call()->run($config);
} catch (Exception $e) {
    var_dump($e);
}



/**
 * @var Product $product
 */

//$product = new Product("Сникерс", "Вкусный", 12);
//$product->save();
//$product->delete();

//$product = Product::getCountWhere("sessioin_id",session_id());

//$product->setName("Сникерс2");

//$product->save();

//var_dump(($product));
//var_dump(get_class_methods($product));

