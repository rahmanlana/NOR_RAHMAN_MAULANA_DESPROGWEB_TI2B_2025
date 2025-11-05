<?php
session_start();
?>
<html>

<body>
    <?php
    echo "Favorite Color Is: " . $_SESSION["favoolor"] . "<br>";
    echo "Favorit Animal Is: " . $_SESSION["favanimal"] . ".";
    ?>
</body>

</html>