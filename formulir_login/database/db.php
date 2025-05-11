<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "latihan_login_db";

    $com = mysqli_connect($host, $user, $pass, $db);

    if(!$com){
        die("Koneksi gagal: ". mysqli_connect_error());
    }
    
?>