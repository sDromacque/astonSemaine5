<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <h1>Welcome</h1>
    <?php
        require('./script/Person.php');
        $object = new Person();
        $record = $object->getAllPerson();
        var_dump($record);
    ?>
</body>
</html>