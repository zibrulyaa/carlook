
<?php
require '../../db/db.php';
global $db;
$id = $_GET['id'];
$query = $db->exec("DELETE FROM request WHERE id = $id");
header('Location: ../../clients.php');
exit(0);
