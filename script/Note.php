<?php

require_once('Database.php');
class Note
{
    public function postNote($note, $coeff, $person)
    {
        try {
            $query = Database::getConnection()->prepare("INSERT INTO note (note, coeff) VALUES (:note, :coeff, :person)");
            $query->execute(array(
                'note' => $note,
                'coeff' => $coeff,
                'idPerson' => $person
            ));

            return true;

        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
}