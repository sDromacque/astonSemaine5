<?php
require('Database.php');
class Person extends Database
{
    public function getAllPerson()
    {
        try {
            $query = $this->DBH->prepare("SELECT * FROM person");
            $query->execute();
            return $query->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function getPersonByClass($idClass)
    {
        try {
            $query = $this->DBH->prepare("SELECT * FROM person");
            $query->execute();
            return $query->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
}