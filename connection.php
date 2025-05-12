<?php

$host = "localhost";
$user = "root";
$password = "123";
$database = "resto";

$conn = mysqli_connect($host,$user,$password,$database);

if(!$conn){
    die("Koneksi gagal: ".mysqli_connect_error());
}
