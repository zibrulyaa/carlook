<?
require '../../db/db.php';
global $db;
$query = "UPDATE color SET name = :name WHERE id = :id";
$tmp = $db->prepare($query);
$tmp->execute([
    'name' => $_POST['name'],
    'id'=>$_POST['id']]);
header('Location: ../../cars.php');