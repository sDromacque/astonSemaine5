<?php
require_once 'Database.php';
require_once 'Session.php';

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

        $session = new Session();
        $session->createSession($reponse[0]['firstname'], $reponse[0]['lastname'], $reponse[0]['type']);
        if($reponse[0]['type'] == 'admin'){
            header('Location: ../templates/administration/portal.administration.template.php');
        }elseif ($reponse[0]['type'] == 'teacher'){
            header('Location: ../classes.php');
        }else{
            header('Location: ../templates/login.template.php');
        }

    } catch (PDOException $e) {
        exit($e->getMessage());
    }
}else{
    echo('nop');
}