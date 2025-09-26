<?php
$produk = 120000;

if ($produk > 100000) {
    $setalahDiskon = $produk - ($produk * 20/100);
    echo "Total Harga: $setalahDiskon";
}else{
    echo "Total harga: $produk";
};
?>