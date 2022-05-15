<?php
require '../../db/connect.php';
global $con;

if(isset($_POST['save'])){
    $name = $_POST['name'];
    $engine = $_POST['engine'];
    $gear = $_POST['gear'];
    $drive = $_POST['drive'];
    $options = $_POST['options'];

    $query = "INSERT INTO configuration (name, engine_id, gearbox_id, drive_id) VALUES ('$name', '$engine', '$gear','$drive') ";
    $query_run = mysqli_query($con,$query);

    if($query_run){
        $last_id = $con->insert_id;
        foreach ($options as $option){
            $query = "INSERT INTO configuration_options (configuration_id,option_id) VALUES ('$last_id', '$option') ";
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
