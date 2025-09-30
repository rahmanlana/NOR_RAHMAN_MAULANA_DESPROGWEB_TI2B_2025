<?php
$loremipsum = "Lorem ipsum dolor sit amet consectetur adipisicing elit.
Debitis qui enim aut voluptates eligendi in
cum animi a ad. Non nihil animi similique vel amet
blanditiis quibusdam quia excepturi veritatis?";

echo "<p>{$loremipsum}</p>";
echo "panjag karakter: " . strlen($loremipsum)."<br>";
echo "panjag keatas: " . str_word_count($loremipsum)."<br>";
echo "<p>" . strtoupper($loremipsum)."</p>";
echo "<p>" . strtolower($loremipsum)."</p>";
?>