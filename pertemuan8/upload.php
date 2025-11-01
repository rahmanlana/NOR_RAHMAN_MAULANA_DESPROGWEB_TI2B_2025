<?php
// if (isset($_POST["submit"])) {
//     $targetdir = "uploads/";
//     $targetfile = $targetdir . basename($_FILES["myfile"]["name"]);
//     $fileType = strtolower(pathinfo($targetfile, PATHINFO_EXTENSION));

//     $allowedExtendsions = array("jpg", "jpeg", "png", "gif");
//     $maxsize = 5 * 1024 * 1024;

//     if (in_array($fileType, $allowedExtendsions) && $_FILES["myfile"]["size"] <= $maxsize) {

//         if (
//             move_uploaded_file(
//                 $_FILES["myfile"]["tmp_name"],
//                 $targetfile
//             )
//         ) {
//             echo "Nama File: " . htmlspecialchars($_FILES["myfile"]["tmp_name"] . "<br><br>");
//             echo "File berhasil diunggah.";
//             echo "<h3>Preview Gambar:</h3>";
//             echo "<img src='$targetfile' width='200' style='height:auto; border:1px solid #ccc; border-radiius:5px;'>";
//         } else {
//             echo "Gagal mengunggah file.";
//         }
//     } else {
//         echo "File tidak valid atau melebihi ukuran maksimum yang diizinkan";
//     }

// }


// if (isset($_POST["submit"])) {
//     $targetdir = "uploads/"; // Direktori tujuan untuk menyimpan file
//     $targetfile = $targetdir . basename($_FILES["file"]["name"]);
//     $fileType = strtolower(pathinfo($targetfile, PATHINFO_EXTENSION));

//     $allowedExtensions = array("txt", "pdf", "doc", "docx");
//     $maxsize = 3 * 1024 * 1024;

//     if (in_array($fileType, $allowedExtensions) && $_FILES["myfile"]["size"] <= $maxsize) {

//         if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetfile)) {
//             echo "File berhasil diunggah.";
//         } else {
//             echo "Gagal mengunggah file.";
//         }
//     } else {
//         echo "File tidak valid atau melebihi ukuran maksimum yang diizinkan.";
//     }
// }


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $targetdir = "uploads/";

    // Buat folder kalau belum ada
    if (!file_exists($targetdir)) {
        mkdir($targetdir, 0777, true);
    }

    $allowedExtensions = ["jpg", "jpeg", "png", "gif"];
    $maxsize = 5 * 1024 * 1024; // 5 MB

    $files = $_FILES["file"];
    $totalFiles = count($files["name"]);

    for ($i = 0; $i < $totalFiles; $i++) {
        $filename = basename($files["name"][$i]);
        $targetfile = $targetdir . $filename;
        $fileType = strtolower(pathinfo($targetfile, PATHINFO_EXTENSION));
        $filesize = $files["size"][$i];
        $tmpname = $files["tmp_name"][$i];

        // Validasi ekstensi dan ukuran
        if (!in_array($fileType, $allowedExtensions)) {
            echo "<p>File <b>$filename</b> tidak diizinkan.</p>";
            continue;
        }
        if ($filesize > $maxsize) {
            echo "<p>File <b>$filename</b> melebihi ukuran maksimum.</p>";
            continue;
        }

        // Pindahkan file
        if (move_uploaded_file($tmpname, $targetfile)) {
            echo "<p>File <b>$filename</b> berhasil diunggah.</p>";
            echo "<img src='$targetfile' width='150' style='margin:10px; border:1px solid #ccc;'>";
        } else {
            echo "<p>Gagal mengunggah file <b>$filename</b>.</p>";
        }
    }
}

?>