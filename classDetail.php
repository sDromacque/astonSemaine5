<?php
require_once 'script/Classroom.php';
require_once 'script/Note.php';
$content = 'templates/classes/detail.classes.template.php';
$id = $_GET['class'];

$class = Classroom::getClassroom($id);
$notes = Note::getNotes($id);

require_once 'templates/layouts/main.layouts.template.php';