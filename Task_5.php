<?php 
$color = ["red", "green", "blue", "yellow", "brown"];

echo "<strong>All Colors:</strong><br>";
foreach ($color as $x) {
    echo $x . "<br>";
}

echo "<br>";

echo "<strong>Colors with y:</strong><br>";
foreach ($color as $y => $x) {
    echo "Color $y: $x <br>";
}

echo "<br>";

echo "<strong>Colors Starting with 'B':</strong><br>";
foreach ($color as $x) {
    if (str_starts_with($x, "b")) {
        echo $x . "<br>";
    }
}

echo "<br>";

echo "<strong>Reversed Colors:</strong><br>";
$reversed = array_reverse($color);
foreach ($reversed as $x) {
    echo $x . "<br>";
}
?>