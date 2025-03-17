<?php

$name = "Kathir";
$age = 24;
$height = 6.2;
$is_student = true;

echo "Original Height: $height <br>";

$height = (int) $height;
echo "Casted Height: $height <br><br>";

$a = 5;

$b = $a + 3;
echo "Addition Output: $b <br>";

$b = $a * 3;
echo "Multiplication Output: $b <br>";

$b = $a / 3;
echo "Division Output:". number_format($b,2)."<br>";

$b = $a - 3;
echo "Subtraction Output: $b <br>";

echo "Modulus Output: $b <br>";
?>
