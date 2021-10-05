<?php

namespace App;

require_once(dirname(__FILE__) . '/../database/getPdo.php');

class ModelPdo
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = connPdo();
    }
}
