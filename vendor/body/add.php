<?php

require '../../db/db.php';

global $db;
$query = "INSERT INTO body VALUES (NULL, :name)";
$tmp = $db->prepare($query);
$tmp->execute(['name' => $_POST['name']]);
header("Location: ../../cars.php");


