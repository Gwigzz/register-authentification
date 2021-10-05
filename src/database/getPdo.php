<?php

function connPdo(): PDO
{
    try {

        $dbName = "local_inscription";
        $charset = "utf8";
        $loginDb = "root";
        $pswDb = "";

        $bdd = new PDO(
            "mysql:host=localhost;dbname=$dbName;charset=$charset",
            "$loginDb",
            "$pswDb",
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );
    } catch (PDOException $er) {
        die("Erreur: " . $er->getMessage());
    }

    return $bdd;
}
