<?php
$file = 'data.json';
$data = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h2>Riwayat</h2>
        <a href="tambah.php" class="btn">Tambah Pelanggan</a>
        <hr>
        <?php
        if (empty($data)):
            ?>
        <?php else: ?>

            <?php
            foreach (array_reverse($data) as $p):
                ?>
                <div class="card">
                    <p><strong>Nama:</strong> <?= $p['nama'] ?></p>
                    <p><strong>Alamat:</strong> <?= $p['alamat'] ?></p>
                    <p><strong>No HP:</strong> <?= $p['nohp'] ?></p>
                    <p><strong>Email :</strong> <?= $p['email'] ?></p>
                    <p><strong>Jenis Sampah:</strong> <?= $p['jenis'] ?></p>
                    <p><strong>Berat:</strong> <?= $p['berat'] ?> Kg</p>
                    <p><strong>Total:</strong> Rp<?= number_format($p['total'], 0, ',', '.') ?></p>
                    <p><strong>Tanggal:</strong> <?= $p['tanggal'] ?></p>
                    <a href="hapus.php?kode=<?= $p['kode'] ?>" onclick="return" class="hapus">Hapus</a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div id="popupConfirm" class="popup">
        <div class="popup-content">
            <p id="popupText">Yakin menghapus data?</p>
            <div class="popup-actions">
                <button id="btnYes">Ya</button>
                <button id="btnNo">Batal</button>
            </div>
        </div>
    </div>
    <div id="popup" class="popup">
        <div class="popup-content success">
            <p id="popupMessage"></p>
            <button id="closePopup" class="btn">Tutup</button>
        </div>
    </div>
    <script src="jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".container").hide().fadeIn(800);

            $(".card").hover(
                function () {
                    $(this).css({
                        "transform": "scale(1.03)",
                        "box-shadow": "0 8px 20px rgba(0,0,0,0.25)"
                    });
                },
                function () {
                    $(this).css({
                        "transform": "scale(1)",
                        "box-shadow": "0 4px 10px rgba(0,0,0,0.1)"
                    });
                }
            );

            const parameter = new URLSearchParams(window.location.search);
            const status = parameter.get("status");

            if (status === "hapus") {
                $("#popupMessage").text("Data berhasil dihapus!");
                $(".popup-content").removeClass("error").addClass("success");
                $("#popup").css("display", "flex").hide().fadeIn(300);
            }

            $("#closePopup").click(function () {
                $("#popup").fadeOut(300, function () {
                    window.location.href = "index.php";
                });
            });

            let targetLink = null;

            $("a.hapus").on("click", function (e) {
                e.preventDefault();
                targetLink = $(this);
                $("#popupConfirm").css("display", "flex").hide().fadeIn(200);
            });

            $("#btnNo").on("click", function () {
                $("#popupConfirm").fadeOut(200);
                targetLink = null;
            });

            $("#btnYes").on("click", function () {
                if (targetLink) {
                    const card = targetLink.closest(".card");
                    card.fadeOut(400, function () {
                        window.location.href = targetLink.attr("href");
                    });
                }
                $("#popupConfirm").fadeOut(200);
            });
        });

    </script>


</body>

</html>