<?php
require '../../db/connect.php';
global $con;

if(isset($_POST['save'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $engine = $_POST['engine'];
    $gear = $_POST['gear'];
    $drive = $_POST['drive'];
    $options = $_POST['options'];

    $query = "UPDATE configuration SET name = '$name', engine_id = '$engine', gearbox_id = '$gear', drive_id = '$drive' WHERE id = '$id'";
    $query_run = mysqli_query($con,$query);
    header("Location: ../../cars.php");
    if($query_run){

        $con->query("DELETE FROM configuration_options WHERE configuration_id = $id");
        foreach ($options as $option){
            $query = "INSERT INTO configuration_options (configuration_id,option_id) VALUES ('$id', '$option') ";
            $query_run = mysqli_query($con,$query);
        }
        header("Location: ../../cars.php");
        exit(0);
    }
    else{
        header("Location: ../../cars.php");
        exit(0);
    }
}
