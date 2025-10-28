<?php
$kode = $_GET['kode'];
$file = 'data.json';

if (file_exists($file)) {
    $data = json_decode(file_get_contents($file), true);
    $baru = array_filter($data, fn($item) => $item['kode'] !== $kode);
    file_put_contents($file, json_encode(array_values($baru), JSON_PRETTY_PRINT));
}

header("location: index.php?status=hapus");
exit;
?>