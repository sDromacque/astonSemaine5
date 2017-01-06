<?php
session_start();
?>

<div class="classes-list-container">
    <h2>Classes</h2>
    <div class="list-container">
        <?php foreach($classes as $class) : ?>
        <div class="list-item">
            <h3><?= $class->getName(); ?></h3>
            <p>Students : <?= count($class->getStudents()); ?></p>
            <p>Class average : <?= round(Note::getClassAvg($class->getId()), 1)  ?> / 20</p>
            <a href="classDetail.php?class=<?= $class->getId(); ?>"><button>Show class</button></a>
        </div>
        <?php endforeach; ?>
    </div>
</div>