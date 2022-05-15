<?php
require '../../db/connect.php';
global $con;

if(isset($_POST['save'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mname = $_POST['mname'];
    $tel = $_POST['tel'];

    $query = "INSERT INTO client (lastName, firstName, middleName, phone) VALUES ('$lname', '$fname', '$mname','$tel') ";
    $query_run = mysqli_query($con,$query);
    header("Location: ../../clients.php");

}
