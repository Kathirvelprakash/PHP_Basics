<?php 
// Declaring an array of colors
$color = ["red", "green", "blue", "yellow", "brown"];

// 1️⃣ Print all colors
echo "<strong>All Colors:</strong><br>";
foreach ($color as $x) {
    echo $x . "<br>";
}

echo "<br>";

// 2️⃣ Print colors with their index
echo "<strong>Colors with y:</strong><br>";
foreach ($color as $y => $x) {
    echo "Color $y: $x <br>";
}

echo "<br>";

// 3️⃣ Print only colors that start with 'b'
echo "<strong>Colors Starting with 'B':</strong><br>";
foreach ($color as $x) {
    if (str_starts_with($x, "b")) {
        echo $x . "<br>";
    }
}

echo "<br>";

// 4️⃣ Reverse and print the array
echo "<strong>Reversed Colors:</strong><br>";
$reversed = array_reverse($color);
foreach ($reversed as $x) {
    echo $x . "<br>";
}
?>