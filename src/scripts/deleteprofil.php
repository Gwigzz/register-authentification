<?php

use App\RequestProfilPdo;

session_start();

if (!isset($_SESSION['privateMembre'])) {
    die("Erreur: no session");
}

if (isset($_GET['actionDelProfil']) && !empty($_GET['actionDelProfil'])) {

    $getUrlProfil = (int) htmlspecialchars($_GET['actionDelProfil']);

    // If $_SESSION[] == id in url = OK
    if ($_SESSION['privateMembre']['id'] == $getUrlProfil) {

        require_once(dirname(__FILE__) . '/../../vendor/autoload.php');

        $reqBddClass = new RequestProfilPdo;
        $emailUser = $_SESSION['privateMembre']['userEmail'];

        $actionReq = $reqBddClass->ReqPrepareDelete();
        $actionReq->bindValue(':id', $getUrlProfil, PDO::PARAM_INT);
        $actionReq->bindValue(':userEmail', $emailUser, PDO::PARAM_STR);

        $actionReq->execute(array(
            'id' => $getUrlProfil,
            'userEmail' => $emailUser
        ));

        $rowCountUser = $actionReq->rowCount();

        if ($rowCountUser === 1) {
            /*  echo "cela correspond !"; */
            $actionDelete = $reqBddClass->ReqActionDeleteProfil();
            $actionDelete->bindValue(':id', $getUrlProfil, PDO::PARAM_INT);
            $actionDelete->bindValue(':userEmail', $emailUser, PDO::PARAM_STR);

            if ($actionDelete->execute()) {
                header('Location: /src/scripts/disconnect.php?clear=');
                die();
                //
            } else {
                die("Erreur: erreur executed delete action");
            }
            //
        } else {
            die(" Erreur: no match1 ");
        }
        //
    } else {
        die(" Erreur: no match2 ");
    }
    //
} else {
    die("Erreur: Error . No access");
}
