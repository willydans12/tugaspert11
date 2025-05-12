<?php
session_start();

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username === 'admin' && $password === 'admin123'){
        $_SESSION['user_id']  = 1;
        $_SESSION['username'] = 'admin';
        header("Location: home.php");
        exit;
    }

    header("Location: index.php?error=1");
    exit;
}
