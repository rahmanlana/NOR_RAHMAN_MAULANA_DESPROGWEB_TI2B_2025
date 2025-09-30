<?php
$pesan = "Saya cah bojonegoro";
echo strrev($pesan) . "<br>";

$pesan = "Saya cah bojonegoro";

$pesanPerkata = explode(" ", $pesan);

$pesanPerkata = array_map(fn($pesan) => strrev($pesan), $pesanPerkata);

$pesan = implode(" ", $pesanPerkata);

echo strrev($pesan) . "<br>";
?>