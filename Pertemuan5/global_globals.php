<?php
$x = 75;
$y = 25;

function addtion()
{
    $GLOBALS['z'] = $GLOBALS['x'] + $GLOBALS['y'];
}
addtion();
echo $z;
?>