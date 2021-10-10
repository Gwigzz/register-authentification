<?php

use App\Redirect;
use App\RenderHtml;
use App\ConnexionBdd;
use App\MessagePopup;

session_start();

if (isset($_SESSION['privateMembre'])) {
    header('Location: /');
    die();
}

require_once(dirname(__FILE__) . '../../../vendor/autoload.php');

$render = new RenderHtml;
$redirectHeader = new Redirect;

// traitement connexion
if (
    isset($_POST['btnValidForm']) && empty($_POST['btnValidForm'])
    && isset($_POST['userEmail']) && !empty($_POST['userEmail'])
    && isset($_POST['userPass']) && !empty($_POST['userPass'])
) {
    $userEmail = htmlspecialchars($_POST['userEmail']);
    $userPass = htmlspecialchars($_POST['userPass']);

    // if not a real email
    if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
        die("Erreur: Email not valide");
    }

    $connPdo = new ConnexionBdd;

    $checkUser = $connPdo->connexionPdo();
    $checkUser->execute(array($userEmail));

    $datas = $checkUser->fetch(); // get informations user
    $rowCount = $checkUser->rowCount(); // check if user exist or not

    if ($rowCount === 1) {
        if (password_verify($userPass, $datas['userPass'])) {

            // Creat a unique session
            $_SESSION['privateMembre'] = [
                'id' => $datas['id'],
                'userName' => $datas['userName'],
                'userEmail' => $datas['userEmail'],
                'dateInscription' => $datas['dateInscription']
            ];

            // if connexion ok, redirect to profil with session
            $redirectHeader->redirectDie('privateProfil.php');
        } else {
            $redirectHeader->redirectDie('connexion.php?pop=erLog');
        }
    } else {
        $redirectHeader->redirectDie('connexion.php?pop=erLog');
    }
}

// render...
$title = "_Connexion";
$activeNav = 'connect';
$messagePop = new MessagePopup;

$render->renderHtml(
    'connexion.html.php',
    [
        "title" => $title,
        "activeNav" => $activeNav,
        "messagePop" => $messagePop
    ]
);
