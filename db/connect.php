<?php
require_once 'connect.php';
global $host,$dbname,$username,$password;

//$con = mysqli_connect($host,$username,$password, $dbname); на локальном сервере это работать не будет из-за особенностей php
$con = mysqli_connect('localhost','root','', 'f0650590_carlook');