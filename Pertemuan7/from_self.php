<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>From Input PHP</title>
</head>

<body>
    <h2>From Input PHP</h2>
    <?php
    $namaErr = "";
    $nama = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["nama"])) {
            $namaErr = "Nama Harus Diisi";
        } else {
            $nama = $_POST["nama"];
            echo "Data Berhasi; disimpan";
        }
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <Label for="nama">Nama</Label>
        <input type="text" name="nama" id="nama" value="<?php echo $nama; ?>">
        <span class="error"><?php echo $namaErr; ?></span><br><br>

        <input type="submit" name="submit" value="submit">
    </form>
</body>

</html>