<?php
require_once('Database.php');
require_once('Policy.php');

class Person
{
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
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getIsDelegate()
    {
        return $this->isDelegate;
    }

    /**
     * @param mixed $isDelegate
     */
    public function setIsDelegate($isDelegate)
    {
        $this->isDelegate = $isDelegate;
    }
    private $id;
    private $firstname;
    private $lastname;
    private $type;
    private $isDelegate;

    public function __construct($id, $firstname, $lastname, $type, $isDelegate) {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->type = $type;
        $this->isDelegate = $isDelegate;
    }

    public function getAllPerson()
    {
        try {
            $query = Database::getConnection()->prepare("SELECT * FROM person");
            $query->execute();
            return $query->fetchObject();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public static function getPersonByClass($class) {
        try {
            $query = Database::getConnection()->prepare("
                SELECT p.id, p.firstname, p.lastname, p.type, p.isDelegate 
                FROM classproject.person p
                INNER JOIN classproject.classeshavepersons as chp ON chp.idPerson = p.id
                INNER JOIN classproject.classroom as c ON c.id = chp.idClass
                WHERE c.id = ? && p.type = 'student'");

            $query->execute(array($class));

            $students = [];

            while($newStudent = $query->fetch(PDO::FETCH_ASSOC)) {
                $student = new Person($newStudent['id'], $newStudent['firstname'], $newStudent['lastname'], $newStudent['type'], $newStudent['isDelegate']);
                array_push($students, $student);
            }

            return $students;
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
                $query = Database::getConnection()->prepare("INSERT INTO person (lastname, firstname, type) VALUES (:lastname, :firstname, :type)");
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