<?php

/**
 * Created by PhpStorm.
 * User: Gaelle
 * Date: 05/01/2017
 * Time: 15:41
 */
require('Database.php');
class Person
{
    public function getAllPerson()
    {
        $bdd = dbConnection();
        $reponse = $bdd->query('SELECT * FROM person');

    }
}