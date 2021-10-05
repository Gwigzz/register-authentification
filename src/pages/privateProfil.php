<?php

use App\RenderHtml;

session_start();

if (!isset($_SESSION['privateMembre'])) {
    header('Location: /index.php');
    die();
}

require_once(dirname(__FILE__) . '/../../vendor/autoload.php');

$render = new RenderHtml;


// render...
$title = "_Private Profil";
$activeNav = "privateProfil";

$render->renderHtml(
    'privateProfil.html.php',
    [
        "title" => $title,
        "activeNav" => $activeNav
    ]
);
