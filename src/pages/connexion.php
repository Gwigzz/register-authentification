<?php

use App\RenderHtml;
use App\ConnexionBdd;

session_start();

if (isset($_SESSION['privateMembre'])) {
    header('Location: /');
    die();
}

require_once(dirname(__FILE__) . '../../../vendor/autoload.php');

$render = new RenderHtml;

// traitement connexion
if (
    isset($_POST['btnValidForm']) && empty($_POST['btnValidForm'])
    && isset($_POST['userEmail']) && !empty($_POST['userEmail'])
    && isset($_POST['userPass']) && !empty($_POST['userPass'])
) {
    $userEmail = htmlspecialchars($_POST['userEmail']);
    $userPass = htmlspecialchars($_POST['userPass']);

    $connPdo = new ConnexionBdd;

    $checkUser = $connPdo->connexionPdo();
    $checkUser->execute(array($userEmail));

    $datas = $checkUser->fetch();
    $rowCount = $checkUser->rowCount();

    if ($rowCount === 1) {
        if (filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
            if (password_verify($userPass, $datas['userPass'])) {

                $_SESSION['privateMembre'] = [
                    'id' => $datas['id'],
                    'userName' => $datas['userName'],
                    'userEmail' => $datas['userEmail'],
                    'dateInscription' => $datas['dateInscription']
                ];

                header('Location: /src/pages/privateProfil.php');
                die();
                //
            } else {
                die("Erreur: Password or email invalide");
            }
        } else {
            die("Erreur: Email not valide");
        }
    } else {
        die("Erreur: Email or password invalide");
    }
}

// render...
$title = "_Connexion";
$activeNav = 'connect';

$render->renderHtml(
    'connexion.html.php',
    [
        "title" => $title,
        "activeNav" => $activeNav
    ]
);
