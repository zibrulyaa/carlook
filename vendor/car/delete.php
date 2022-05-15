
<?php
require '../../db/db.php';
global $db;
$id = $_GET['id'];
$query = $db->exec("DELETE FROM car WHERE id = $id");
header('Location: ../../cars.php');
?>



