<?php
$a = 10;
$b = 5;

$hasilTambah = $a + $b;
$hasilKurang = $a - $b;
$hasilKali = $a * $b;
$hasilBagi = $a / $b;
$sisaBagi = $a % $b;
$pangkat = $a ** $b;

$hasilSama = $a == $b;
$hasilTidakSama = $a != $b;
$hasilLebihKecil = $a < $b;
$hasilLebihBesar = $a > $b;
$hasilLebihKecilSama = $a <= $b;
$hasilLebihBesarSama = $a >= $b;

$hasilAnd = $a && $b;
$hasilOr = $a || $b;
$hasilNotA = !$a;
$hasilNotB = !$b;



echo "Hasil Tambah = $hasilTambah <br>";
echo "Hasil Kurang = $hasilKurang<br>";
echo "Hasil Kali = $hasilKali<br>";
echo "Hasil Bagi = $hasilBagi<br>";
echo "Sisa Bagi = $sisaBagi<br>";

echo " <p> Hasil Sama = $hasilSama<br>";
echo "Hasil Tidak Sama = $hasilTidakSama<br>";
echo "Hasil Lebih Kecil = $hasilLebihKecil<br>";
echo "Hasil Lebih Besar = $hasilLebihBesar<br>";
echo "Hasil Lebih Kecil sama = $hasilLebihKecilSama<br>";
echo "Hasil Lebih Besar sama = $hasilLebihBesarSama<br></p>";

echo " <p> Hasil AND = $hasilAnd<br>";
echo "Hasil Or = $hasilOr<br>";
echo "Hasil Not A = $hasilNotA<br>";
echo "Hasil Not B = $hasilNotB<br></p>";

$hasilAPlusSama = $a += $b;
$hasilAMinSama = $a -= $b;
$hasilAKaliSama = $a *= $b;
$hasilABagiSama = $a /= $b;
$hasilAModulusSama = $a %= $b;

echo "<p>Hasil dari a plus sama dengan = $hasilAPlusSama </br>";
echo "Hasil dari a min sama dengan = $hasilAMinSama </br>";
echo "Hasil dari a Kali sama dengan = $hasilAKaliSama </br>";
echo "Hasil dari a Bagi sama dengan = $hasilABagiSama </br>";
echo "Hasil dari a Modulus sama dengan = $hasilAModulusSama </br></p>";


$hasilIdentik = $a === $b;
$hasilTidakIdentik = $a !== $b;

echo "<p>Hasil Identik = $hasilIdentik </br>";
echo "Hasil Tidak Identik = $hasilTidakIdentik </br></p>";



?>