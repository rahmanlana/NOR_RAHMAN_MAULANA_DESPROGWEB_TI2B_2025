<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Anggota</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2>Data Anggota</h2>
        <a href="create.php" class="btn btn-success mt-2 mb-2">Tambah Data</a>
        <tr></tr>
        <?php
        include('koneksi.php');
        $query = "SELECT * FROM anggota order by id desc";
        $result = pg_query($koneksi, $query);
        ?>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>No. Telp</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($row = pg_fetch_assoc($result)) {
                    $kelamin = ($row['jenis_kelamin'] == 'L') ? 'laki-laki' : 'Perempuan';
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $kelamin ?></td>
                        <td><?= $row['alamat'] ?></td>
                        <td><?= $row['no_telp'] ?></td>
                        <td>
                            <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-primary">Edit</a>
                            <a href="#" class="btn btn-danger" data-toggle="modal"
                                data-target="#hapusModal<?= $row['id'] ?>">Hapus</a>
                        </td>
                    </tr>
                    <div class="modal fade" id="hapusModal <?php $row['id'] ?>" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModealLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"> Konfirmasi Hapus</h5>
                                    <button class="close" type="button" date-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Apakah anda yakin ingin menghapus data dengan nama "<?= $row['nama'] ?>"
                                </div>
                                <div class="modal-footer">
                                    <a href="proses.php?aksi=hapus&id=<?= $row['id'] ?>" class="btn btn-danger">Hapus</a>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>



<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Anggota</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">
        <h3>Data Anggota</h3>
        <a href="create.php" class="btn">Tambah Anggota</a>

        <?php
        include("koneksi.php");

        $query = "SELECT * FROM anggota ORDER BY id DESC";
        $result = pg_query($koneksi, $query);

        if (pg_num_rows($result) > 0) {
            echo "<table>";
            echo "<tr><th>No</th><th>Nama</th><th>Jenis Kelamin</th><th>Alamat</th><th>No. Telp</th><th>Aksi</th></tr>";

            $no = 1;
            while ($row = pg_fetch_array($result)) {
                $kelamin = ($row['jenis_kelamin'] == 'L') ? 'Laki-laki' : 'Perempuan';
                echo "<tr>";
                echo "<td>" . $no++ . "</td>";
                echo "<td>" . $row['nama'] . "</td>";
                echo "<td>" . $kelamin . "</td>";
                echo "<td>" . $row['alamat'] . "</td>";
                echo "<td>" . $row['no_telp'] . "</td>";
                echo "<td>
                    <a href='edit.php?id=" . $row['id'] . "'>Edit</a> | 
                    <a href='#' onclick='konfirmasiHapus(" . $row['id'] . ", \"" . $row['nama'] . "\")'>Hapus</a>
                  </td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "Tidak ada data.";
        }

        pg_close($koneksi);
        ?>

    </div>

    <script>
        function konfirmasiHapus(id, nama) {
            if (confirm("Apakah Anda yakin ingin menghapus data dengan nama " + nama + " ?")) {
                window.location.href = "proses.php?aksi=hapus&id=" + id;
            }
        }
    </script>

</body>

</html> -->