<?php

use App\RenderHtml;
use App\UserSession;

session_start();

require_once(dirname(__FILE__) . '/../../vendor/autoload.php');

$verifSession = new UserSession; // session
$verifSession->notSession('privateMembre', 'home.php');

$render = new RenderHtml; // render html


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
