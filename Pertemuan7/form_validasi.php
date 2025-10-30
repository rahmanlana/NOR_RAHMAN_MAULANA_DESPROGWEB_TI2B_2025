<!DOCTYPE html>
<html lang="en">

<head>
    <title>Form input dengan validasi</title>
    <script src="jquery-3.7.1.min.js"></script>
</head>

<body>
    <h1>Form input dengan validasi</h1>
    <form id="myForm" method="post">
        <label for="nama">Nama: </label>
        <input type="text" name="nama" id="nama">
        <span id="nama_error" style="color: red;"></span>
        <br>
        <label for="email">Email: </label>
        <input type="text" name="email" id="email">
        <span id="email_error" style="color: red;"></span>
        <br>
        <label for="password">Password: </label>
        <input type="password" id="password" name="password">
        <span id="pass_error" style="color: red;"></span>
        <br>
        <input type="submit" value="submit">
    </form>
    <br>
    <hr>
    <div id="hasil">

    </div>
    <script>
        $(document).ready(function () {
            $("#myForm").submit(function (event) {

                event.preventDefault();

                var nama = $("#nama").val();
                var email = $("#email").val();
                var pass = $("#password").val();
                var valid = true;

                if (nama === "") {
                    $("#nama_error").text("Nama harus diisi.");
                    valid = false;
                } else {
                    $("#nama_error").text("");
                }

                if (email === "") {
                    $("#email_error").text("Email harus diisi");
                    valid = false;
                } else {
                    $("#email_error").text("");
                }

                if (password === "") {
                    $("#pass_error").text("Password harus diisi");
                    valid = false;
                } else {
                    $("#pass_error").text("");
                }

                if (valid) {
                    var formData = $("#myForm").serialize();

                    $.ajax({
                        url: "proses_validasi.php",
                        type: "POST",
                        data: formData,
                        success: function (response) {
                            $("#hasil").html(response);
                        },
                        error: function () {
                            $("#hasil").html("<span style='color:red;'>Terjadi Kesalahan</span>")
                        }
                    });
                }

            });
        });
    </script>
</body>

</html>