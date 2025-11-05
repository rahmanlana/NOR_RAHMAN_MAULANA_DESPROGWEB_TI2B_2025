<?php
include "koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = "SELECT * FROM user Where username='$username' and password='$password'";
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($result);

if ($row['level'] == 1) {
    echo "Selamat anda berhasil login, silahkan menuju";
    ?>
    <a href="homeAdmin.php"> Halaman Home Admin</a>
    <?php
} else if ($row['level'] == 2) {
    echo "Selamatn anda berhasil login, Silahkan menuju";
    ?>
        <a href="homeGuest.php"> Halaman Home Guesty</a>
    <?php
} else {
    echo "Anda Gagal login, silahkan "; ?>
        <a href="loginForm.php"> Login Kembali</a>
        <?php
        echo mysqli_error($connect);
}
?>