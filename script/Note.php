<?php

require_once('Database.php');
class Note
{

    public static function postNote($note, $coeff, $person)
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

    public static function getClassAvg($class)
    {
      try
      {
         return Database::getConnection()->query("SELECT AVG(note) FROM note INNER JOIN classeshavepersons ON note.idPerson = classeshavepersons.idPerson WHERE classeshavepersons.idClass = $class")->fetchColumn();
      }catch(PDOException $e){
        exit($e->getMessage());
      }
    }
    public function getStudentAvg($student)
    {
      try
      {
         return Database::getConnection()->query("SELECT AVG(note) FROM note WHERE idPerson = $student");
      }catch(PDOException $e){
        exit($e->getMessage());
      }
    }
    public static function getNotes($class)
    {
      try
      {
         $resultats= Database::getConnection()->query("SELECT person.firstname,person.lastname,note,coeff,CreatedAt, reviewedAt, comment.comment FROM note INNER JOIN classeshavepersons ON note.idPerson = classeshavepersons.idPerson INNER JOIN person ON note.idPerson = person.id LEFT JOIN comment ON note.idComment = comment.id WHERE classeshavepersons.idClass = $class")->fetchAll(PDO::FETCH_ASSOC);
         return $resultats;
      }catch(PDOException $e){
        exit($e->getMessage());
      }

    }
}
