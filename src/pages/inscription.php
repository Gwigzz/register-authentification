<?php
session_start();

if (isset($_SESSION['privateMembre'])) {
    header('Location: /src/pages/privateProfil.php');
    die();
}

use App\ConnexionBdd;
use App\RenderHtml;

require_once(dirname(__FILE__) . '/../../vendor/autoload.php');

$render = new RenderHtml;


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


    // controle lenght userName
    if (strlen($userName) < 3) {
        die("Erreur: le nom doit contenir minimum 3 à 10 caractères maximum");
    } elseif (strlen($userName) > 10) {
        die("Erreur: le nom doit contenir minimum 3 à 10 caractères maximum");
    }

    // control its a real email or not
    if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
        die("Erreur: veuillez entrez une adresse Email valide");
    }

    // repeat same password
    if ($userPass !== $userRepeatPass) {
        die("Erreur: Retaper le même mot de passe");
    }

    // hash password
    $userPass = password_hash($userRepeatPass, PASSWORD_BCRYPT);

    $connexionBdd = new ConnexionBdd; // connexion BDD

    // prepare request check if email exist or not
    $checkEmailExist = $connexionBdd->getPdo()->prepare("SELECT * FROM users WHERE userEmail = ?");
    $checkEmailExist->execute(array($userEmail));
    $rowExecuteEmailExist = $checkEmailExist->rowCount();

    // verif email with count
    if ($rowExecuteEmailExist >= 1) {
        die("Erreur: l'email est déjà existante");
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
        //echo "Validation OK";
        header('Location: /src/pages/connexion.php');
        die();
    } else {
        echo "Erreur lors du traitement d'information";
    }
}

// render...
$title = "_Inscription"; // title page
$activeNav = "inscription";

$render->renderHtml(
    'inscription.html.php',
    [
        'title' => $title,
        'activeNav' => $activeNav
    ]
);
