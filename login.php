<?php
session_start();
include 'conn.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = mysqli_query($conn,"SELECT * FROM pengguna WHERE username='$username' AND password='$password'");
$hasil = mysqli_num_rows($sql);

if($hasil > 0){
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;

    setcookie($_SESSION['username'],$_SESSION['password'],time()+(86400*30),"/");

    echo "<script>alert('Anda berhasil login'); document.location.href = 'masuk.html';</script>";
}
else{
    echo "<script>alert('Anda gagal untuk login'); document.location.href = 'index.php';</script>";
}

?>