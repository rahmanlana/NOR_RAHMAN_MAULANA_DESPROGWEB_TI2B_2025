<?php
session_start();
include 'koneksi.php';
include 'csrf.php';

$id = $_POST['id'];

$query = "DELETE FROM anggota where id = ?";
$sql = $db1->prepare($query);
$sql->execute([$id]);

echo json_encode(['succes' => 'Sukses']);

$db1 = null;
?>