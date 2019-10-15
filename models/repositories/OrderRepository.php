<?php


namespace app\models\repositories;

use app\engine\App;
use app\models\entities\Orders;
use app\models\Repository;

class OrderRepository extends Repository
{

    /*public function getOrder($session)
    {
        $sql = "SELECT o.id, o.phone, o.name, o.email, o.adres, o.status_name,  FROM orders o, order_status s";
        return App::call()->orderRepository->getDataWhere($data, 'session', $session);
    }*/

    public function editOrder($id, $status) {
        $sql = "UPDATE `orders` SET `status_name`=:status WHERE `id`=:id";
        //die($sql);
        return App::call()->db->execute($sql, [":id"=>$id, ":status"=>"$status"]/*, $this->getEntityClass()*/);
    }

    public function getTableName()
    {
        return 'orders';
    }

    public function getEntityClass()
    {
        return Order::class;
    }

}