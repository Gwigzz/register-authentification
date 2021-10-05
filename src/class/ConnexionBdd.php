<?php

namespace App;

use App\ModelPdo;

/**
 * Connect DB and extends ModelPdo.php
 */
class ConnexionBdd extends ModelPdo
{
    /**
     * Prepare connexion for user FROM (table) "users" WHERE "userEmail" ?
     * Shearch Email
     * @return PDO
     */
    public function connexionPdo()
    {
        $mysql = $this->pdo->prepare(
            "SELECT * FROM users WHERE userEmail = ?"
        );

        return $mysql;
    }

    /** Get simple PDO connexion */
    public function getPdo()
    {
        return connPdo();
    }
}
