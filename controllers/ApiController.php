<?php

namespace app\controllers;


use app\engine\App;
use app\engine\Request;
use app\models\entities\{Basket, Orders, User};
use app\models\repositories\{BasketRepository, UserRepository, OrderRepository};

class ApiController extends Controller
{

    public function actionEditOrderStatus() {
        
        //die(ttt);
        $id = App::call()->request->getParams()['id'];//;
        $status = App::call()->request->getParams()['select'];//;
        //var_dump($status);
        //var_dump($id);
        App::call()->orderRepository->editOrder($id, $status);
        //die(1234567);
        header("Location: /orders/");
        $response = [
            'result' => 1,
            'count' => App::call()->basketRepository->totalQuantity(),
            'totalPrice' => App::call()->basketRepository->totalPrice()
        ];
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;

    }

    public function actionRegOrder()
    {

        echo $this->render('regorder',[
            //'name' => (new UserRepository())->getDataWhere(name, login, ((new UserRepository())->getName()))
            'name' => App::call()->userRepository->getName()
        ]);

        if (isset($_POST['button'])) {
            //TODO переделать на request ПЕРЕДЕЛАЛ!!!
            $name = App::call()->request->getParams()['name'];
            $adres = App::call()->request->getParams()['adres'];
            $phone = App::call()->request->getParams()['phone'];
            $email = App::call()->request->getParams()['email'];

            /*$name = $_POST['name'];
            $adres = $_POST['adres'];
            $phone = $_POST['phone'];*/
            //$order = new Order($name, $phone, $adres, session_id(), 0);
            //var_dump($order);
            //die();
            App::call()->orderRepository->save(new Orders($name, $phone, $email, $adres, session_id(), 1, 'оформлен'));
            $order_id = array_pop(App::call()->orderRepository->getWhereMassiv(['id'], 
                ['session_id' =>session_id()]))['id'];/*, 
                 'product_id'=> $id]
                )[0]['quantity'];*/
            $baskets = App::call()->basketRepository->getWhereMassiv(['id'], 
                ['session_id' =>session_id(), 
                 'order_id'=> 0]);
            
            foreach ($baskets as $key => $value) {
                $id = $value['id'];
                App::call()->basketRepository->editOrderIdInBasket($id, $order_id);
            }
            //App::call()->basketRepository->totalPrice();
            //App::call()->basketRepository->totalQuantity();
                echo "<br>Ваш заказ принят<br><a href='/product/catalog/'> Назад в каталог </a>";
                //header("Location: /");
            exit();
        }
        exit;
    }

    /*public function actionAddBasket() //рабочий метод добавляет в базу каждый товар отдельно
    {

        //$price

       // (new BasketRepository())->save(new Basket(session_id(), (new Request())->getParams()['id']));
        App::call()->basketRepository->save(new Basket(
                session_id(),
                App::call()->request->getParams()['id'],
                App::call()->userRepository->getName())
        );


        $response = [
            'result' => 1,
            'count' => App::call()->basketRepository->getCountWhere('session_id', session_id())
        ];
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }*/

    public function actionAddBasket()
    {

        //die(terer);
        //$sign = App::call()->request->getParams()['sign'];
        $id_basket = App::call()->request->getParams()['id_basket'];
        $id = App::call()->request->getParams()['id'];
        $price = App::call()->productRepository->getWhere('id', $id)->price;
        $quantity = App::call()->basketRepository->getWhereMassiv(['quantity'], 
            ['session_id' =>session_id(), 
             'product_id'=> $id,
             'order_id' => 0]
            )[0]['quantity'];
        
        if ($quantity!=null) {
            App::call()->basketRepository->updateRowBasket($id, $price, $quantity);//$sign, 
        }
        else
        {
        App::call()->basketRepository->save(new Basket(
                session_id(),
                App::call()->request->getParams()['id'],
                App::call()->userRepository->getName(),
                $price)
        );
        //$response = ['quantity' => 1];
        //var_dump($response);
        //die(qqqq);
        };

        if (!$id_basket) {
            $id_basket = App::call()->basketRepository->getWhereMassiv(['id'], ['session_id' =>session_id(), 'product_id' => $id])[0]['id'];
            //var_dump($id_basket);
        } 

        $response =[
            'result' => 1,
            'product_id'=> $id,
            'summ_row' => App::call()->basketRepository->getWhereMassiv(['summ_row'], ['session_id' =>session_id(), 'id' => $id_basket])[0]['summ_row'],
            'count' => App::call()->basketRepository->totalQuantity(),
            'totalPrice' => App::call()->basketRepository->totalPrice(),
            'quantity' => App::call()->basketRepository->getWhereMassiv(['quantity'], 
                ['session_id' =>session_id(), 
                 'product_id'=> $id]
                )[0]['quantity'],
        ];
            //var_dump($response);
        header('Content-Type: application/json');
        echo json_encode($response);
        //header("Location: /");
        exit;
    }

    public function actiondelFromBasket()
    {

        $id = App::call()->request->getParams()['id'];
        $session = session_id();
        /*
        $basket = Basket::getOne($id);
        if ($session == $basket->session_id)
            $basket->delete();
        */
//DELETE FROM basket WHERE id=1 AND session_id='23123';
        //Вариант оптимальный

        App::call()->basketRepository->deleteByIdWhere($id, 'session_id', $session);


        $response = [
            'result' => 1,
            'product_id'=> $id,
            'summ_row' => App::call()->basketRepository->getWhereMassiv(['summ_row'], ['session_id' =>session_id(), 'id' => $id_basket])[0]['summ_row'],
            'count' => App::call()->basketRepository->totalQuantity(),
            'totalPrice' => App::call()->basketRepository->totalPrice(),
            'quantity' => App::call()->basketRepository->getWhereMassiv(['quantity'], 
                ['session_id' =>session_id(), 
                 'product_id' => $id]
                )[0]['quantity'],
        ];

        header('Content-Type: application/json');
        echo json_encode($response);

        exit;
    }

    public function actiondelFromBasketMinus()
    {

        $id = App::call()->request->getParams()['id'];
        $id_basket = App::call()->request->getParams()['id_basket'];
        $price = App::call()->productRepository->getWhere('id', $id)->price;
        $quantity = App::call()->basketRepository->getWhereMassiv(['quantity'], 
            ['session_id' =>session_id(), 
             'product_id'=> $id]
            )[0]['quantity'];
        
        if ($quantity>1) {
            App::call()->basketRepository->updateRowBasketMinus($id, $price, $quantity);//$sign, 
        }
        else
        {
            App::call()->basketRepository->deleteByIdWhere($id_basket, 'session_id', session_id());
            $response1 = ['remove' => true];
        };

        $response = [
            'result' => 1,
            'product_id'=> $id,
            'summ_row' => App::call()->basketRepository->getWhereMassiv(['summ_row'], ['session_id' =>session_id(), 'id' => $id_basket])[0]['summ_row'],
            'count' => App::call()->basketRepository->totalQuantity(),
            'totalPrice' => App::call()->basketRepository->totalPrice(),
            'quantity' => App::call()->basketRepository->getWhereMassiv(['quantity'], 
                ['session_id' =>session_id(), 
                 'product_id'=> $id]
                )[0]['quantity'],
        ];

        if ($response1) {
            $response = $response + $response1;
        }

        header('Content-Type: application/json');
        echo json_encode($response);

        exit;
    }

    public function addOneToBasket() {
        $id = App::call()->request->getParams()['id'];
        $session = session_id();

        App::call()->basketRepository->deleteByIdWhere($id, 'session_id', $session);

        $response = [
            'result' => 1,
            'count' => App::call()->basketRepository->totalQuantity(),
            'totalPrice' => App::call()->basketRepository->totalPrice()
        ];

        header('Content-Type: application/json');
        echo json_encode($response);

        exit;

    }

}