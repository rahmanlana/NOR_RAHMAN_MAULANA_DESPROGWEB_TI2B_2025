<?php
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$nohp = $_POST['nohp'];
$email = $_POST['email'];
$berat = (float) $_POST['berat'];
$jenis = $_POST['jenis'];

if ($berat < 10) {
    header("Location: tambah.php?status=error");
    exit;
}

$harga = ($jenis === 'Organik') ? 2000 : 3000;
$total = $berat * $harga;

$pelanggan = [
    "kode" => strtoupper(substr(md5(uniqid()), 0, 8)),
    "tanggal" => date('d-m-Y H:i:s'),
    "nama" => $nama,
    "alamat" => $alamat,
    "nohp" => $nohp,
    "email" => $email,
    "berat" => $berat,
    "jenis" => $jenis,
    "total" => $total
];

$file = 'data.json';
$data = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

$data[] = $pelanggan;

file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));

header("location:tambah.php?status=success");
?>