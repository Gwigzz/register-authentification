<?php

namespace App;

class Redirect
{

    private $redirection;

    /**
     * Redirect to location specified
     */
    public function redirectDie(string $redirection)
    {
        $this->redirection = $redirection;
        header('Location: /src/pages/' . htmlspecialchars($this->redirection) . '');
        die();
    }
}
