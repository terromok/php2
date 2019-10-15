<?php


namespace app\models\repositories;

use app\engine\App;
use app\models\entities\Basket;
use app\models\Repository;

class BasketRepository extends Repository
{

    public function getBasket($session)
    {
        $sql = "SELECT p.id id_prod, b.id id_basket, p.name, p.description, p.price, b.summ_row, b.quantity FROM basket b,products p WHERE b.product_id=p.id AND session_id = :session AND b.order_id = 0";
        return App::call()->db->queryAll($sql, ['session' => $session]);
    }

        public function editOrderIdInBasket($id, $order_id) {
        $sql = "UPDATE `basket` SET `order_id`=:order_id WHERE `id`=:id";
        //die($sql);
        return App::call()->db->execute($sql, [":id"=>$id, ":order_id"=>"$order_id"]/*, $this->getEntityClass()*/);
    }

    public function updateRowBasket($id, $price, $quantity) { //$sign, 
        $session_id = session_id();
        
        $sql = "UPDATE `basket` 
        SET quantity=:quantity+1, summ_row = summ_row+:price WHERE 
            session_id='{$session_id}' AND product_id=:id";
            //die($sql);
        return App::call()->db->execute($sql, ['id' => $id, 'price'=> $price, 'quantity'=> $quantity] );       
    }

    public function updateRowBasketMinus($id, $price, $quantity) { //$sign, 
        $session_id = session_id();
        
        $sql = "UPDATE `basket` 
        SET quantity=:quantity-1, summ_row = summ_row-:price WHERE 
            session_id='{$session_id}' AND product_id=:id";
            //die($sql);
        return App::call()->db->execute($sql, ['id' => $id, 'price'=> $price, 'quantity' => $quantity]);       
    }

    public function getTableName()
    {
        return 'basket';
    }

    public function getEntityClass()
    {
        return Basket::class;
    }

}