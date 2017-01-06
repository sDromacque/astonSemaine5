<?php
require('Database.php');
class Note
{
    public static function postNote($note, $coeff, $person)
    {
        try {
            $query = $this->DBH->prepare("INSERT INTO note (note, coeff) VALUES (:note, :coeff, :person)");
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

    public function getClassAvg($class)
    {
      try
      {
         return $this->DBH->query("SELECT AVG(note) FROM note INNER JOIN classeshavepersons ON note.idPerson = classeshavepersons.idPerson WHERE classeshavepersons.idClass = $class");
      }catch(PDOException $e){
        exit($e->getMessage());
      }
    }
    public function getStudentAvg($student)
    {
      try
      {
         return $this->DBH->query("SELECT AVG(note) FROM note WHERE idPerson = $student");
      }catch(PDOException $e){
        exit($e->getMessage());
      }
    }
}
