<?php
require '../../db/connect.php';
global $con;

if(isset($_POST['save'])){
    $date = $_POST['date'];
    $manager = $_POST['manager'];
    $client = $_POST['client'];
    $car = $_POST['car'];
    $status = $_POST['status'];

    $query = "INSERT INTO request (manager_id, client_id, car_id, date, status_id) VALUES ('$manager', '$client', '$car','$date', '$status') ";
    $query_run = mysqli_query($con,$query);
    header("Location: ../../clients.php");

}
