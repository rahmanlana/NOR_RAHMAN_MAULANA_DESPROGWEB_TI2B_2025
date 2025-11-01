<?php

$targetDirectory = "uploads/";

if (!file_exists($targetDirectory)) {
    mkdir($targetDirectory, 0777, true);
}

if (isset($_FILES['file']) && !empty($_FILES['file']['name'][0])) {

    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    $totalFile = count($_FILES['file']['name']);
    $uploaded = 0;
    $failed = 0;

    for ($i = 0; $i < $totalFile; $i++) {
        $errors = array();
        $file_name = $_FILES['file']['name'][$i];
        $file_size = $_FILES['file']['size'][$i];
        $file_tmp = $_FILES['file']['tmp_name'][$i];
        $file_type = $_FILES['file']['type'][$i];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if (!in_array($file_ext, $allowedExtensions)) {
            echo "Ekstensi file yang diizinkan adalah jpg, png, jpeg, atau gif.";
            $failed++;
            continue;
        }

        if ($file_size > 5 * 1024 * 1024) {
            echo "Ukuran file tidak boleh lebih dari 5MB";
            $failed++;
            continue;
        }

        $targetFile = $targetDirectory . $file_name;

        if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $targetFile)) {
            echo "File $file_name Berhasil di unggah<br>";
        } else {
            echo "Gagal mengunggah file $file_name.<br>";
        }
    }

}
?>