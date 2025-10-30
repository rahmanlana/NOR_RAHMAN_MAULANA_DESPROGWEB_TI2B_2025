<?php
// $pattern = '/[0-9]/';
// $text = 'ther are 123 apples.';
// if (preg_match($pattern, $text, $matches)) {
//     echo "Cocokan: " . $matches[0];
// } else {
//     echo "Tidak Ada Yang cocok!";
// }

// $pattern = '/apple/';
// $replacment = 'banana';
// $text = 'I like apple pie.';
// $new_text = preg_replace($pattern, $replacment, $text);
// echo $new_text;

// $pattren = '/go?d/';
// $text = 'god is good';
// if (preg_match($pattren, $text, $matches)) {
//     echo "Cocokan: " . $matches[0];
// } else {
//     echo "Tidak ada yang cocok!";
// }

$pattren = '/go{1,3}d/';
$text = 'god is good';
if (preg_match($pattren, $text, $matches)) {
    echo "Cocokan: " . $matches[0];
} else {
    echo "Tidak ada yang cocok!";
}
?>