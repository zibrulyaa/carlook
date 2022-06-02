<?
require '../../db/db.php';
global $db;

if(isset($_POST['save'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $power = $_POST['power'];
    $type = $_POST['type'];

    $query = "UPDATE engine SET name = '$name',power = '$power', type = '$type' WHERE id = '$id'";

    $tmp = $db->prepare($query);
    $tmp->execute([
        'name' => $_POST['name'],
        'power' => $_POST['power'],
        'type' => $_POST['type'],
        'id'=>$_POST['id']]);
    header("Location: ../../cars.php");
}
exit(0);