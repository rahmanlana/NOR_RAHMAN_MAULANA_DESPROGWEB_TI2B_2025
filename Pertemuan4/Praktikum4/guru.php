<?php
$n1 = 85;
$n2 = 92;
$n3 = 78;
$n4 = 64;
$n5 = 90;
$n6 = 75;
$n7 = 88;
$n8 = 79;
$n9 = 70;
$n10 = 96;

$nilai = [$n1, $n2, $n3, $n4, $n5, $n6, $n7, $n8, $n9, $n10];
sort($nilai);

$total = 0;
for ($i = 2; $i < count($nilai) - 2; $i++) {
    $total += $nilai[$i];
}
$rata = $total / ($i - 2);

echo "Total nilai setelah mengabaikan 2 tertinggi dan 2 terendah: $total\n";
echo "Rata-rata: $rata";
?>

