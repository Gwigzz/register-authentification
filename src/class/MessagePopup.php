<?php

namespace App;

class MessagePopup
{

    private $message;

    /**
     * Get message from URL ?pop
     */
    public function messagePop()
    {
        if (isset($_GET['pop'])) {

            $this->message = htmlspecialchars($_GET['pop']);

            echo '<div class="container-pop">';
            switch ($this->message) {
                    // Email or Password not valide (Login)
                case 'erLog':
                    echo '<span class="messagePop error">Email address or password is incorrect.</span>';
                    break;

                    // Lenght username (Register)
                case 'erStr':
                    echo '<span class="messagePop error">The name must contain at least 3 to 10 characters maximum.</span>';
                    break;

                    // Not same Password (Register)
                case 'erPass':
                    echo '<span class="messagePop error">Retype the same password.</span>';
                    break;

                    // Validate Register (Register)
                case 'valRegister':
                    echo
                    '<span class="messagePop success">You can log in.</span>';
                    break;

                    // If Email is already
                case 'erAlreadyEmail':
                    echo '<span class="messagePop error">Email address already exists.</span>';
                    break;
            }
            echo '</div>';
        }
    }
}
