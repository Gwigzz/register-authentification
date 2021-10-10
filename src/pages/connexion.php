<?php

use App\Redirect;
use App\RenderHtml;
use App\UserSession;
use App\ConnexionBdd;
use App\MessagePopup;

session_start();

require_once(dirname(__FILE__) . '../../../vendor/autoload.php');

$verifSession = new UserSession; // verif session
$verifSession->okSession('privateMembre', 'home.php');

$render = new RenderHtml; // render
$redirectHeader = new Redirect; // redirect

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

    // if not user, redirect
    if ($rowCount !== 1) {
        $redirectHeader->redirectDie('connexion.php?pop=erLog');
    }

    // if not the same password, redirect
    if (!password_verify($userPass, $datas['userPass'])) {
        $redirectHeader->redirectDie('connexion.php?pop=erLog');
    }

    // Creat a unique session with datas user
    $_SESSION['privateMembre'] = [
        'id' => $datas['id'],
        'userName' => $datas['userName'],
        'userEmail' => $datas['userEmail'],
        'dateInscription' => $datas['dateInscription']
    ];

    // if connexion ok, redirect to profil with session
    $redirectHeader->redirectDie('privateProfil.php');
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
