<?php
$dataSiswa = [
    ['Alice', 85],
    ['Bob', 92],
    ['Charlie', 78],
    ['David', 64],
    ['Eva', 90],
];

$total = 0;
$jumlah = count($dataSiswa);

for ($i = 0; $i < $jumlah; $i++) {
    $total += $dataSiswa[$i][1];
}

$rataRata = $total / $jumlah;

echo "Rata-rata kelas: $rataRata<br>";
echo "Daftar siswa dengan nilai di atas rata-rata:<br>";

for ($i = 0; $i < $jumlah; $i++) {
    if ($dataSiswa[$i][1] > $rataRata) {
        echo "Nama: {$dataSiswa[$i][0]}, Nilai: {$dataSiswa[$i][1]}<br>";
    }
}
?>
