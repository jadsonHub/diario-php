<?php

$dbName = "user";
$dbServerName = "localhost";
$dbUser = "root";
$dbPassword = "123edu"; 
$dbPort = 3306;

$conect = mysqli_connect($dbServerName,$dbUser,$dbPassword,$dbName,$dbPort);

try{

    $conect = mysqli_connect($dbServerName,$dbUser,$dbPassword,$dbName,$dbPort);
     return $conect;

}catch(Exception $e){

    echo $e->getMessage();
    $conect = "error";

}