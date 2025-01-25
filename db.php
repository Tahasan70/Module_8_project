<?php
$host="localhost";
$user="root";
$pass="";
$database="photo_gallery";

$conn=new mysqli($host,$user,$pass,$database);
if($conn->connect_error){
    die("connection failed :". $conn->connect_error);
}



?>