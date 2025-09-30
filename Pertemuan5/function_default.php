<?php

function perkenalan($nama, $salam = "Assalamualaikum")
{
    echo $salam . ", ";
    echo "Perkenalkan, nama saya " . $nama . "<br/>";
    echo "Senang berkenalan dengan Anda</br>";
}
perkenalan("Lana", "Hallo");
echo "<hr>";
$saya = "lana";
$ucapanSalam = "Selamat pagi";

perkenalan($saya);
?>