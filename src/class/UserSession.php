<?php

namespace App;

use App\Redirect;

class UserSession extends Redirect
{
    /**
     * If not session, redirect user
     */
    public function notSession(string $sessionName, string $pathRedirect)
    {
        if (!isset($_SESSION[$sessionName])) {
            return self::redirectDie($pathRedirect);
        }
    }

    /**
     * If session already, redirect user
     */
    public function okSession(string $sessionName, string $pathRedirect)
    {
        if (isset($_SESSION[$sessionName])) {
            return self::redirectDie($pathRedirect);
        }
    }
}
