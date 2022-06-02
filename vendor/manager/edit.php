<?php
require '../../db/connect.php';
global $con;

if(isset($_POST['save'])){
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mname = $_POST['mname'];
    $post = $_POST['post'];
    $tel = $_POST['tel'];

    $query = "UPDATE manager SET firstName = '$fname',lastName = '$lname', middleName = '$mname', post = '$post', phone = '$tel' WHERE id = '$id'";
    $query_run = mysqli_query($con,$query);
    header("Location: ../../managers.php");
}
exit(0);