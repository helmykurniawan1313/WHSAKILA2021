<?php
include 'koneksi.php';

$username   = $_POST['username'];
$pass       = $_POST['password'];

$user = mysqli_query($connect, "select * from user where username='$username' and password='$pass'");
$chek = mysqli_num_rows($user);
if ($chek > 0) {
    header("location:dashboard1.php");
} else {
    header("location:index.php");
}
