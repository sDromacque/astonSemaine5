<?php

/**
 * Class Policy
 * Check access user
 */
class Policy
{
    public function isAuthorizedTeacher($type)
    {
        if($type == 'teacher'){
            return true;
        }
        else{
            return false;
        }
    }

    public function isAuthorizedAdmin($type)
    {
        if($type == 'admin'){
            return true;
        }
        else{
            return false;
        }
    }
}