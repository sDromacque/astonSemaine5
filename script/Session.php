<?php
session_start();

class Session
{
    /**
     * @param $user = personId
     * @param $type = teacher
     */
    public function createSession($user, $type)
    {
        $_SESSION['person'] = $user;
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