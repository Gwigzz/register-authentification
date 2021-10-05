<?php

namespace App;

use App\ConnexionBdd;

class RequestProfilPdo extends ConnexionBdd
{
    /**
     * Prepare delete before delete profil
     */
    public function ReqPrepareDelete()
    {
        $mysql = $this->pdo->prepare(
            "SELECT * FROM users 
            WHERE id = :id 
            AND userEmail = :userEmail 
            LIMIT 1"
        );

        return $mysql;
    }

    /**
     * Delete profil membre
     */
    public function ReqActionDeleteProfil()
    {
        $mysql = $this->pdo->prepare(
            "DELETE FROM users 
            WHERE id = :id
            AND userEmail = :userEmail
            LIMIT 1"
        );

        return $mysql;
    }
}
