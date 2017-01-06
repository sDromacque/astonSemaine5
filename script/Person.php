<?php
require('Database.php');
require('Policy.php');

class Person extends Database
{
    public function getAllPerson()
    {
        try {
            $query = $this->DBH->prepare("SELECT * FROM person");
            $query->execute();
            return $query->fetchObject();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function getPersonByClass($idClass)
    {
        try {
            $query = $this->DBH->prepare("SELECT * FROM person");
            $query->execute();
            return $query->fetchObject();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    /**
     * @param $lastname
     * @param $firstname
     * @param $type
     * @return bool
     */
    public function postNewPerson($lastname, $firstname, $type)
    {
        $policy = new Policy();
        $access = $policy->isAuthorizedAdmin($_SESSION['type']);

        if($access){
            try {
                $query = $this->DBH->prepare("INSERT INTO person (lastname, firstname, type) VALUES (:lastname, :firstname, :type)");
                $query->execute(array(
                    'lastname' => $lastname,
                    'firstname' => $firstname,
                    'type' => $type
                ));
                return true;
            } catch (PDOException $e) {
                exit($e->getMessage());
            }
        }else{
            header('Location: ./templates/login.template.php');
        }

    }
}