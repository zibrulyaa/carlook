<?php

require '../../db/db.php';

global $db;
$query = "INSERT INTO engine VALUES (NULL, :name, :power, :type)";
$tmp = $db->prepare($query);
$tmp->execute([
    'name' => $_POST['name'],
    'power' => $_POST['power'],
    'type' => $_POST['type'],
]);
header("Location: ../../cars.php");
exit(0);

