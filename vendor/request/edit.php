<?php
require '../../db/connect.php';
global $con;

if(isset($_POST['save'])){

    $id = $_POST['id'];
    $date = $_POST['date'];
    $manager = $_POST['manager'];
    $client = $_POST['client'];
    $car = $_POST['car'];
    $status = $_POST['status'];

    $query = "UPDATE request SET 
               manager_id = '$manager',
               client_id = '$client',
               car_id = '$car',
               date = '$date',
               status_id = '$status'
               WHERE id = '$id'";
    $query_run = mysqli_query($con,$query);
    header("Location: ../../clients.php");
}
exit(0);