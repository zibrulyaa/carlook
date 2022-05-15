<?php
require '../../db/connect.php';
global $con;

if(isset($_POST['save'])){
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $body = $_POST['body'];
    $color = $_POST['color'];
    $cnf = $_POST['cnf'];
    $vin = $_POST['vin'];
    $stock = $_POST['stock'];
    $date = $_POST['date'];
    $price = $_POST['price'];


    $query =
        "INSERT INTO car 
    (brand_id, model_id, body_id, color_id, cnf_id, vin, stock_id, date, price)
     VALUES ('$brand', '$model', '$body','$color','$cnf','$vin','$stock','$date','$price') ";
    $query_run = mysqli_query($con,$query);

    header("Location: ../../cars.php");
}
