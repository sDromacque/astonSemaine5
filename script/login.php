<?php
require_once 'Database.php';

if(isset($_POST['submit'])) {
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=classproject;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

    $person = $_POST['username'];
    try {
        $reponse = $bdd->query("SELECT * FROM person WHERE lastname = '$person'")->fetchAll();

        var_dump('ok');
        if($reponse[0]['type'] == 'admin'){
            header('Location: ../templates/portal.administration.template.php');
        }elseif ($reponse[0]['type'] == 'teacher'){
            header('Location: ../templates/classes/list.classes.template.php');
        }else{
            header('Location: ../templates/login.template.php');
        }

    } catch (PDOException $e) {
        exit($e->getMessage());
    }
}else{
    echo('nop');
}