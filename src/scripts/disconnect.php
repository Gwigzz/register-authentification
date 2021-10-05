<?php
session_start();

if (isset($_SESSION['privateMembre'])) {
    unset($_SESSION['privateMembre']);
    session_destroy();
    session_unset();
    header('Location: /');
    die();
    //
} elseif (isset($_GET['clear']) && empty($_GET['clear'])) { // from after delete profil
    session_destroy();
    session_unset();
    header('Location: /');
    die();
    //
} elseif (!isset($_SESSION['privateMembre'])) { // if bug or not session
    session_destroy();
    session_unset();
    header('Location: /');
    die();
}
