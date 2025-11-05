<?php
session_start();
?>

<html>

<body>
    <?php
    $_SESSION["favoolor"] = "green";
    $_SESSION["favanimal"] = "cat";
    echo "Session variables are set.";
    ?>
</body>

</html>