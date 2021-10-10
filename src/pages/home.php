<?php

use App\RenderHtml;

session_start();

require_once(dirname(__FILE__) . '/../../vendor/autoload.php');

$render = new RenderHtml;


// content...



// render...
$title = "_Acceuil"; // title page
$activeNav = "home";

$render->renderHtml(
    'home.html.php',
    [
        'title' => $title,
        'activeNav' => $activeNav
    ]
);
