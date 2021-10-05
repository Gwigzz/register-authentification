<?php

namespace App;


use App\ModelPdo;

class ConnexionBdd extends ModelPdo
{
    /**
     * Prépare la connextion de l'utilisateur a PDO
     * 
     * @return PDO   $mysql = $this->pdo->prepare(
     * "SELECT * FROM users WHERE userEmail = ?" );
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
