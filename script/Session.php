<?php
session_start();

class Session
{
    /**
     * @param $user = personId
     * @param $type = teacher
     */
    public function createSession($firstname, $lastname, $type)
    {
        session_start();
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname;
        $_SESSION['type'] = $type;
        return true;
    }

    public function destroySession()
    {
        // remove all session variables
        session_unset();

        // destroy the session
        session_destroy();
    }
}