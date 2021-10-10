<?php

namespace App;

require_once(dirname(__FILE__) . '/../database/getPdo.php');

/**
 * Return connexion for DB
 */
class ModelPdo
{
    protected $pdo;

    /**
     * Connect to PDO DB from getPdo.php.
     */
    public function __construct()
    {
        $this->pdo = connPdo();
    }
}
