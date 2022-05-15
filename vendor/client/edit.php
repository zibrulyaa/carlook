<?php
require '../../db/connect.php';
global $con;

if(isset($_POST['save'])){
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mname = $_POST['mname'];
    $tel = $_POST['tel'];

    $query = "UPDATE client SET firstName = '$fname',lastName = '$lname', middleName = '$mname', phone = '$tel' WHERE id = '$id'";
    $query_run = mysqli_query($con,$query);
    header("Location: ../../clients.php");
}
