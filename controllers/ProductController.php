<?php

namespace app\controllers;

use app\engine\App;
use app\engine\Request;
use app\models\Basket;
use app\models\Product;
use app\models\repositories\ProductRepository;

class ProductController extends Controller
{


    public function actionIndex() {
        echo $this->render('index');
    }

    public function actionCatalog() {
        $catalog = App::call()->productRepository->getAll();
        echo $this->render('catalog', ['catalog' => $catalog]);
    }


    public function actionCard() {
        $id = App::call()->request->getParams()['id'];

        if ($id == 0) {
            throw new \Exception("Продукт не найден", 404);
        }

        $product = App::call()->productRepository->getOne($id);
        echo $this->render('card', ['product' => $product]);
    }



}