<?php
include "koneksi.php";

include "koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = "SELECT * FROM user Where username='$username' and password='$password'";
$result = mysqli_query($connect, $query);
$cek = mysqli_num_rows($result);

if ($cek > 0) {
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    ?>
    anda berhasil Login Silahkan menuju:
    <a href="homeSession.php">Halaman Home</a>
    <?php
} else {
    echo "Anda gagal Login, silahkan menuju "; ?>
    <a href="sessionLoginForm.php">Halaman Login</a>
    <?php
    echo mysqli_error($connect);
}
?>