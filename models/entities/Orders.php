<?php

namespace app\models\entities;

use app\models\entities\DataEntity;


class Orders extends DataEntity
{
    public $id;
    public $name;
    public $phone;
    public $email;
    public $adres;
    public $session_id;
    public $status;
    public $status_name;

    /**
     * Product constructor.
     * @param $id
     * @param $name
     * @param $phone
     * @param $email
     * @param $adres
     * @param $session_id
     */
    public function __construct($name = null, $phone = null, $email = null, $adres = null, $session_id = null, $status = null, $status_name = null)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;        
        $this->adres = $adres;
        $this->session_id= $session_id;
        $this->status = $status;
        $this->status_name = $status_name;
    }





}