<?php
$targetDirectory = 'documents/';

if (!file_exists($targetDirectory)) {
    mkdir($targetDirectory, 0777, true);
}

if (isset($_FILES['files']) && !empty($_FILES['files']['name'][0])) {
    $totalFiles = count($_FILES['files']['name']);

    for ($i = 0; $i < $totalFiles; $i++) {
        $fileNama = $_FILES['files']['name'][$i];
        $targetFile = $targetDirectory . $fileNama;

        if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $targetFile)) {
            echo "File $fileNama Berhasil di unggah<br>";
        } else {
            echo "Gagal mengunggah file $fileNama.<br>";
        }
    }
} else {
    echo "Tidak ada file yang diunggah";
}
?>