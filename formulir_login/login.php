<?php
session_start();
include 'koneksi/db.php';

$username = $_POST['username'];
$password = $_POST['password'];
$query = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($com, $query);
$user = mysqli_fetch_assoc($result);

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user'] = $user['username'];
    header("Location: dashboard.php");
} else {
    $_SESSION['error'] = "Login gagal. Username atau password tidak sesuai.";
    header("Location: ../index.php"); 
}
exit;
?>
