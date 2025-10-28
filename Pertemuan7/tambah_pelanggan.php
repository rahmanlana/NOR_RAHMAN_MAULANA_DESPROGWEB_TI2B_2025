<?php
$title = "Tambah Pelanggan | Bank sampah";
include 'header.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $nohp = $_POST['nohp'];
    $berat = floatval($_POST['berat']);
    $jenis = strtolower($_POST['jenis']);

    if ($berat < 10) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
          Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: 'Minimal berat sampah adalah 10 kilo!',
            confirmButtonColor: '#4CAF50'
          }).then(() => { window.history.back(); });
        </script>
      ";
        exit;
    }

    if ($jenis === 'organik') {
        $harga = $berat * 2000;
    } else if ($jenis === 'anorganik') {
        $harga = $berat * 3000;
    } else {
        $harga = 0;
    }
    $dataBaru = [
        "kode" => $kode,
        "nama" => $nama,
        "alamat" => $alamat,
        "nohp" => $nohp,
        "berat" => $berat,
        "jenis" => ucfirst($jenis),
        "harga" => $harga,
        "tanggal" => date("d-m-Y"),
        "jam" => date("H:i:s")
    ];
    $_SESSION['riwayat'][] = $dataBaru;

    echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
          Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Data pelanggan berhasil ditambahkan!',
            confirmButtonColor: '#4CAF50'
          }).then(() => { window.location.reload(); });
        </script>
      ";
    exit;
}



?>