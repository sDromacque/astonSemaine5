<?php
/**
 * database connection
 */
class Database {

    static private $host = "localhost";
    static private $dbname = "classproject";
    static private $user = "root";
    static private $pass = "";

    public static function getConnection() {

        try {
            return new PDO("mysql:host=".self::$host.";dbname=".self::$dbname, self::$user, self::$pass);
        }
        catch (PDOException $e) {

            echo $e->getMessage();
            return null;
        }
    }

}