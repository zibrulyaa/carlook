<?php
require '../../db/connect.php';
global $con;

if(isset($_POST['save'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mname = $_POST['mname'];
    $post = $_POST['post'];
    $tel = $_POST['tel'];

    $query = "INSERT INTO manager (lastName, firstName, middleName, post, phone) VALUES ('$lname', '$fname', '$mname','$post','$tel') ";
    $query_run = mysqli_query($con,$query);
    header("Location: ../../managers.php");

}
