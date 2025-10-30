<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = htmlspecialchars(trim($_POST["nama"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $pass = htmlspecialchars(trim($_POST["password"]));
    $errors = [];

    if (empty($nama)) {
        $errors[] = "Nama Harus Diisi";
    }

    if (empty($email)) {
        $errors[] = "Email Harus diisi";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Format email tidak valid.";
    }

    if (empty($pass)) {
        $errors[] = "Password harus diisi.";
    } else if (strlen($pass) < 8) {
        $errors[] = "Password Minimal 8 Character.";
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<span style='color:red;'>$error</span><br>";
        }
    } else {
        echo "<span style='color:green;'>Data berhasil dikirim:</span><br>";
        echo "Nama: $nama<br>";
        echo "Email: $email<br>";
        echo "password: (Disembunyikan)";
    }

}

?>