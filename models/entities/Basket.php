<?php

namespace app\models\entities;

use app\models\entities\DataEntity;


class Basket extends DataEntity
{
    public $id;
    public $session_id;
    public $product_id;
    public $login;
    public $summ_row;


    /**
     * Basket constructor.
     * @param $session_id
     * @param $product_id
     * @param $login
     
     */
    public function __construct($session_id = null, $product_id = null, $login = null, $summ_row = null)//
    {
        $this->session_id = $session_id;
        $this->product_id = $product_id;
        $this->login = $login;
        $this->summ_row = $summ_row;

    }




}