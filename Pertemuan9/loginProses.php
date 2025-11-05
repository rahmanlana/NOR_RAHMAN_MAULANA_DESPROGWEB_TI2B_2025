<?php
include "koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = "SELECT * FROM user Where username='$username' and password='$password'";
$result = mysqli_query($connect, $query);
$cek = mysqli_num_rows($result);

if ($cek > 0) {
    echo "Anda berhasil login, silahkan menuju "; ?>
    <a href="homeAdmin.php">Halaman Home</a>
    <?php
} else {
    echo "Anda gagal Login, silahkan menuju "; ?>
    <a href="loginForm.php">Halaman Login</a>
    <?php
    echo mysqli_error($connect);
}
?>