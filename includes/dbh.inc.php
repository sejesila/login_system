<?php
include_once '../header.php';

$DB_HOST=$_ENV['DB_HOST'];
$DB_USER=$_ENV['DB_USER'];
$DB_PASS=$_ENV['DB_PASS'];
$DB_NAME=$_ENV['DB_NAME'];
$conn = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);



if (!$conn){

    die("Connection failed". mysqli_connect_error());
}
