<?php
$username = $_POST['username'];
$pass = $_POST['password'];

if ($username == "admin" && $pass == "1234") {
    session_start();
    $_SESSION["username"] = $username;
    $_SESSION["status"] = 'login';
    echo "Anda berhasil Login. Silahkan menuju <a href='homeSession.php'>Halaman Home </a>";
} else {
    echo "Gagal!. Silahkan Login Lagi <a href='sessionLoginForm.php'>Halaman Login</a>";
}
?>