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
        $record = $object->postTeacher('titi', 'titi');
        print_r($record);
    ?>
</body>
</html>