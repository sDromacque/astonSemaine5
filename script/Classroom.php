<?php

require('Database.php');
class Classroom extends Database
{
    public function getAllClassroom()
    {
        try {
            $query = $this->DBH->prepare("SELECT * FROM classroom");
            $query->execute();
            return $query->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

}