<?php
require '../../db/connect.php';
global $con;

if(isset($_POST['save'])){

    $id = $_POST['id'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $body = $_POST['body'];
    $color = $_POST['color'];
    $cnf = $_POST['cnf'];
    $vin = $_POST['vin'];
    $stock = $_POST['stock'];
    $date = $_POST['date'];
    $price = $_POST['price'];

    $query = "UPDATE car SET 
               brand_id = '$brand',
               model_id = '$model',
               body_id = '$body',
               color_id = '$color',
               cnf_id = '$cnf',
               vin = '$vin',
               stock_id = '$stock',
               date = '$date',
               price = '$price'
               WHERE id = '$id'";

    $query_run = mysqli_query($con,$query);
    header("Location: ../../cars.php");
}
exit(0);