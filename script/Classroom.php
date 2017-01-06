<?php

require('Database.php');
class Classroom extends Database
{
    public function getAllClassroom()
    {
        try {
            $query = $this->DBH->prepare("SELECT * FROM classroom");
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

}