<?php

namespace app\models\entities;

use app\models\entities\DataEntity;

class Product extends DataEntity
{
    public $id;
    public $name;
    public $description;
    public $price;

    /**
     * Product constructor.
     * @param $id
     * @param $name
     * @param $description
     * @param $price
     */
    public function __construct($name = null, $description = null, $price = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }





}