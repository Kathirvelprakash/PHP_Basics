<?php

$sentence = "PHP is powerful!";

$length = strlen($sentence);
$lowercase = strtolower($sentence);
$uppercase = strtoupper($sentence);
$substring = substr($sentence, 0, 3);
$replaced = str_replace("powerful", "amazing", $sentence);

echo nl2br("String Length: $length \n");
echo nl2br("Lowercase: $lowercase \n");
echo nl2br("Uppercase: $uppercase \n");
echo nl2br("Substring (first 3 chars): $substring \n");
echo nl2br("Replaced String: $replaced \n");
?>