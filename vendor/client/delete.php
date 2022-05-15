
<?php
require '../../db/db.php';
global $db;
$id = $_GET['id'];
$query = $db->exec("DELETE FROM client WHERE id = $id");
header('Location: ../../clients.php');
?>



