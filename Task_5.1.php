<?php
// 1️⃣ Print all animals
echo "<strong>Animal List</strong><br><br>";
$ani = ["Lion", "Tiger", "Elephant", "Deer", "Giraffe", "Bear", "Zebra"];

foreach ($ani as $animal) {
    echo "$animal<br>";
}

echo "<br>";  // Extra line break for better readability

// 2️⃣ Print animals with their index
echo "<strong>Animal List with Index Element</strong><br><br>";

foreach ($ani as $index => $animal) {
    echo "Animal [$index] = $animal <br>";
}

echo "<br>";  // Extra line break

// 3️⃣ Print only animals with more than 5 letters
echo "<strong>Animal List with More Than 5 Letters</strong><br><br>";

foreach ($ani as $animal) {
    if (strlen($animal) > 5) {
        echo "$animal<br>";
    }
}

echo "<br>";  // Extra line break

// 4️⃣ Print the reversed animal list
echo "<strong>Reversed Animal List</strong><br><br>";

$reversed = array_reverse($ani);
foreach ($reversed as $animal) {
    echo "$animal<br>";
}
?>
