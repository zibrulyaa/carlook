<?php
require '../../db/db.php';
$id = $_GET['id'];
global $db;
$query = $db->exec("DELETE FROM color WHERE id = $id");
header('Location: ../../cars.php');
