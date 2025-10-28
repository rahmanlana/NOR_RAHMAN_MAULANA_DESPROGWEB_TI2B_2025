<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pelanggan</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h2 id="logo"><span class="logo-black">Bank</span><span class="logo-green">.Sampah</span></h2>
        <h3>Tambah Pelanggan</h3>

        <form action="proses.php" method="POST">
            <input type="text" name="nama" placeholder="Nama Pelanggan" required>
            <input type="text" name="alamat" placeholder="Alamat" required>
            <input type="text" name="nohp" placeholder="No HP" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="number" name="berat" placeholder="Berat Sampah (Kg)" required>

            <select name="jenis" required>
                <option value="">Pilih Jenis Sampah</option>
                <option value="Organik">Organik</option>
                <option value="Anorganik">Anorganik</option>
            </select>

            <button type="submit">Simpan</button>

        </form>
        <a href="index.php" class="kembali-riwayat">Riwayat</a>
    </div>
    <div id="popup" class="popup">
        <div class="popup-content">
            <p id="popupMessage"></p>
            <button id="closePopup" class="btn">Tutup</button>
        </div>
    </div>

    <script src="jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function () {
            const parameter = new URLSearchParams(window.location.search);
            const status = parameter.get("status");

            if (status === "success") {
                $("#popupMessage").text("Data berhasil disimpan!");
                $(".popup-content").addClass("success");
                $("#popup").css("display", "flex").hide().fadeIn(300);
            } else if (status === "error") {
                $("#popupMessage").text("Gagal menyimpan! Berat minimal 10 Kg.");
                $(".popup-content").addClass("error");
                $("#popup").css("display", "flex").hide().fadeIn(300);
            }

            $("#logo").on("click", function () {
                window.location.href = "tambah.php"
            })

            $("#closePopup").click(function () {
                $("#popup").fadeOut(300, function () {
                    if (status === "success") {
                        window.location.href = "index.php";
                    } else if (status === "error") {
                        window.location.href = "tambah.php";
                    }
                });
            });
        });
    </script>
</body>

</html>