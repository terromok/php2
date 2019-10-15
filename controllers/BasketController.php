<?php


namespace app\controllers;


use app\engine\App;


class BasketController extends Controller
{
    public function actionIndex()
    {
        echo $this->render('basket', [
            'products' => App::call()->basketRepository->getBasket(session_id())]);
    }
}