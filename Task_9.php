<?php
session_start();  // Start session to store cart data

// Define Products
$products = [
    ["img" => "src/1.jpg", "name" => "Safarri Bag", "price" => 18000, "stock" => 5],
    ["img" => "src/2.jpg", "name" => "Kurta", "price" => 800, "stock" => 10],
    ["img" => "src/3.jpg", "name" => "Polo T-Shirts", "price" => 600, "stock" => 15],
    ["img" => "src/4.jpg", "name" => "Mixture", "price" => 5000, "stock" => 8],
];

// Add to Cart Logic
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_to_cart"])) {
    $index = $_POST["index"]; // Get product index
    $selected_product = $products[$index]; // Fetch selected product details

    // Store product in session
    $_SESSION["cart"][$index] = [
        "name" => $selected_product["name"],
        "price" => $selected_product["price"],
        "img" => $selected_product["img"],
        "qty" => ($_SESSION["cart"][$index]["qty"] ?? 0) + 1 // Increase quantity
    ];
    
    header("Location: Task_9.php"); // Refresh to avoid form resubmission
    exit;
}

?>

