<?php
include "koneksi.php";

$aksi = $_GET['aksi'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$no_telp = $_POST['no_telp'];

if ($aksi == 'tambah') {
    $query = "INSERT INTO anggota (nama, jenis_kelamin, alamat, no_telp) values ('$nama','$jenis_kelamin','$alamat','$no_telp')";

    if (pg_query($koneksi, $query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal menambahkan Data: " . pg_last_error($koneksi);
    }
} else if ($aksi == 'ubah') {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        $query = "update anggota set nama = '$nama', jenis_kelamin = '$jenis_kelamin', alamat = '$alamat', no_telp = '$no_telp' where id = $id";
        if (pg_query($koneksi, $query)) {
            header("Location: index.php");
            exit();
        } else {
            echo "Gagal mengubah data:" . pg_last_error($koneksi);
        }
    } else {
        echo "ID tidak valid.";
    }
} else if ($aksi == 'hapus') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = "DELETE FROM anggota where id = $id";

        if (pg_query($koneksi, $query)) {
            header("Location: index.php");
        } else {
            echo "Gagal Menghapus data: " . pg_last_error($koneksi);
        }
    } else {
        echo "ID tidak valid";
    }
}
pg_close($koneksi);
?>