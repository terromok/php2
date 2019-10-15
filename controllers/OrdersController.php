<?php


namespace app\controllers;

use app\engine\App;

use app\models\entities\Orders;
use app\models\Repository;

use app\models\repositories\OrderRepository;

class OrdersController extends Controller
{
    public function actionIndex()
    {
    	//die(session_id());
        echo $this->render('orders', [
            'orders' => App::call()->orderRepository->getAll(),
            'username' => App::call()->userRepository->getName()
            ]);
    }

    public function actionOrder()
    {
        $id = App::call()->request->getParams()['id'];

    	//die(session_id());
        echo $this->render('order', [
            'order' => App::call()->orderRepository->getOne($id),
            'username' => App::call()->userRepository->getName()
            ]);
    }


}