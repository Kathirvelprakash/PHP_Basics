<?php

echo "<strong>Animal List</strong><br><br>";
$ani = ["Lion", "Tiger", "Elephant", "Deer", "Giraffe", "Bear", "Zebra"];

foreach ($ani as $animal) {
    echo "$animal<br>";
}

echo "<br>";  // Extra line break for better readability

echo "<strong>Animal List with Index Element</strong><br><br>";

foreach ($ani as $index => $animal) {
    echo "Animal [$index] = $animal <br>";
}

echo "<br>";  // Extra line break

echo "<strong>Animal List with More Than 5 Letters</strong><br><br>";

foreach ($ani as $animal) {
    if (strlen($animal) > 5) {
        echo "$animal<br>";
    }
}

echo "<br>";  // Extra line break

echo "<strong>Reversed Animal List</strong><br><br>";

$reversed = array_reverse($ani);
foreach ($reversed as $animal) {
    echo "$animal<br>";
}
?>