
<?php
require '../../db/db.php';
global $db;
$id = $_GET['id'];
$query = $db->exec("DELETE FROM manager WHERE id = $id");
header('Location: ../../managers.php');
?>



