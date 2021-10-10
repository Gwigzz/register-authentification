<?php
session_start();

use App\Redirect;
use App\RenderHtml;
use App\UserSession;
use App\ConnexionBdd;
use App\MessagePopup;

require_once(dirname(__FILE__) . '/../../vendor/autoload.php');

$verifSession = new UserSession;
$render = new RenderHtml;

// verif session
$verifSession->okSession('privateMembre', 'privateProfil.php');

if (
    isset($_POST['btnValidForm']) && empty($_POST['btnValidForm'])
    && isset($_POST['userName']) && !empty($_POST['userName'])
    && isset($_POST['userEmail']) && !empty($_POST['userEmail'])
    && isset($_POST['userPass']) && !empty($_POST['userPass'])
    && isset($_POST['userRepeatPass']) && !empty($_POST['userRepeatPass'])
) {

    $userName = htmlspecialchars($_POST['userName']);
    $userEmail = htmlspecialchars($_POST['userEmail']);
    $userPass = htmlspecialchars($_POST['userPass']);
    $userRepeatPass = htmlspecialchars($_POST['userRepeatPass']);

    // Class for redirections
    $redirectHeader = new Redirect;

    // controle lenght userName
    if (strlen($userName) < 3) {
        $redirectHeader->redirectDie('inscription.php?pop=erStr');
    } elseif (strlen($userName) > 10) {
        $redirectHeader->redirectDie('inscription.php?pop=erStr');
    }

    // control its a real email or not
    if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
        die('Erreur: no validate Email');
    }

    // repeat same password
    if ($userPass !== $userRepeatPass) {
        $redirectHeader->redirectDie('inscription.php?pop=erPass');
    }

    // hash password
    $userPass = password_hash($userRepeatPass, PASSWORD_BCRYPT);

    $connexionBdd = new ConnexionBdd; // connexion BDD

    // prepare request check if email exist or not
    $checkEmailExist = $connexionBdd->getPdo()->prepare("SELECT * FROM users WHERE userEmail = ?");
    $checkEmailExist->execute(array($userEmail));

    // row count DB for Email
    $rowExecuteEmailExist = $checkEmailExist->rowCount();

    // verif email with count
    if ($rowExecuteEmailExist >= 1) {
        $redirectHeader->redirectDie('inscription.php?pop=erAlreadyEmail');
    }

    // prepare request insert
    $requestBdd = $connexionBdd->getPdo()->prepare(
        "INSERT INTO users(userName, userEmail, userPass) VALUES(:userName, :userEmail, :userPass)"
    );

    // PDO binValue()
    $requestBdd->bindValue(":userName", $userName, PDO::PARAM_STR);
    $requestBdd->bindValue(":userEmail", $userEmail, PDO::PARAM_STR);
    $requestBdd->bindValue(":userPass", $userPass, PDO::PARAM_STR);

    // execute request
    $insertBdd = $requestBdd->execute(array(
        "userName" => $userName,
        "userEmail" => $userEmail,
        "userPass" => $userPass
    ));

    // validation, or not.
    if ($insertBdd == true) {
        $redirectHeader->redirectDie('connexion.php?pop=valRegister');
    } else {
        die("Erreur: no request.");
    }
}

// render...
$title = "_Inscription"; // title page
$activeNav = "inscription"; // active nav CSS
$messagePop = new MessagePopup; // for err message

$render->renderHtml(
    'inscription.html.php',
    [
        'title' => $title,
        'activeNav' => $activeNav,
        'messagePop' => $messagePop
    ]
);
