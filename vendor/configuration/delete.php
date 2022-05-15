
<?php
require '../../db/db.php';
global $db;
$id = $_GET['id'];
$query = $db->exec("DELETE FROM configuration_options WHERE configuration_id = $id");
$query = $db->exec("DELETE FROM configuration WHERE id = $id");
header('Location: ../../cars.php');
?>



