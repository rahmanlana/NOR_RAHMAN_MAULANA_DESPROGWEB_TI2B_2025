<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input = $_POST['input'];
    $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    echo "Hasil Input: " . $input;
}
$email = $_POST['email'];
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $email = htmlspecialchars($email, ENT_QUOTES, '');
    echo "Email: " . $email;
} else {
    echo "false";
}
?>