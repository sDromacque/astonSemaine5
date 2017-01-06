<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<nav id="mainNav">
    <h1>EZtextbook</h1>
    <div class="user">
        <?= $_SESSION['type'] ?>
        <?= $_SESSION['firstname'].' '.$_SESSION['lastname']?>
        <a href="deleteSession.php"><button>Logout</button></a>
    </div>
</nav>
<?php include $content; ?>
</body>
</html>