<?php

require_once('Database.php');
require_once('Person.php');
require_once('Note.php');

class Classroom
{
    private $id;
    private $name;
    private $students;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getStudents()
    {
        return $this->students;
    }

    /**
     * @param mixed $students
     */
    public function setStudents($students)
    {
        $this->students = $students;
    }

    public function __construct($newId, $newName, $students)
    {
        $this->id = $newId;
        $this->name = $newName;
        $this->students = $students;
    }


    public static function getAllClassroom()
    {
        try {
            $query = Database::getConnection()->prepare("SELECT * FROM classroom");
            $query->execute();

            $classrooms = [];

            while ($class = $query->fetch(PDO::FETCH_ASSOC)) {
                $students = Person::getPersonByClass($class['id']);

                $classroom = new Classroom($class['id'], $class['name'], $students);

                array_push($classrooms, $classroom);
            };

            return $classrooms;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public static function getClassroom($id) {
        try {
            $query = Database::getConnection()->prepare("SELECT * FROM classroom WHERE id = ?");
            $query->execute(array($id));

            $classrooms = [];

            while ($class = $query->fetch(PDO::FETCH_ASSOC)) {
                $students = Person::getPersonByClass($class['id']);

                $classroom = new Classroom($class['id'], $class['name'], $students);

                array_push($classrooms, $classroom);
            };

            return $classrooms[0];
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
}