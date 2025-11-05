<?php
session_start();
?>
<html>

<body>
    <?php
    session_unset();
    session_destroy();

    echo "All session variable are now removed, and the sesionis ditroyed"
        ?>
</body>

</html>