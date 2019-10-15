<?php

namespace app\models\entities;

use app\models\entities\DataEntity;

class User extends DataEntity
{
    public $id;
    public $name;
    public $login;
    public $pass;

    public function __construct($name = null, $login = null, $pass = null)
    {
    	$this->name = $name;
        $this->login = $login;
        $this->pass = $pass;
    }
}