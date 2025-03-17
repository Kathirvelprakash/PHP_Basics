<?php
$temp = 30;


if ($temp >= 30) { 
    echo "It's hot outside!";
} elseif ($temp > 20) {
    echo "It's a nice day!";
} else {
    echo "It's cold!";
}
echo "<br>";

// Categorizing the temperature using match()
$category = match (true) {
    $temp >= 30 => "hot", 
    $temp > 20 => "nice",
    default => "cold",
};

switch ($category) {
    case "hot":
        echo "It's hot outside!";
        break;
    case "nice":
        echo "It's a nice day!";
        break;
    default:
        echo "It's cold!";
}
?>