<?php
session_start();
require_once 'script/Classroom.php';
require_once 'script/Note.php';
if (session_status() == PHP_SESSION_NONE) {
    header('Location: index.php');
}
$content = 'templates/classes/list.classes.template.php';

$classes = Classroom::getAllClassroom();

require_once 'templates/layouts/main.layouts.template.php';

