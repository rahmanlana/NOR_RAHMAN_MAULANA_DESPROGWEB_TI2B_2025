<html>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        name : <input type="text" name="fname">
        <input type="submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_REQUEST['fname'];
        if (empty($name)) {
            echo "names is empty";
        } else {
            echo $name;
        }
    }
    ?>
</body>

</html>