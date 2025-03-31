<?php
session_start(); // Start session

// Remove item from cart
if (isset($_GET["remove"])) {
    $index = $_GET["remove"];
    unset($_SESSION["cart"][$index]); // Remove item from cart
}

// Clear Cart
if (isset($_GET["clear"])) {
    unset($_SESSION["cart"]);
}

$total_price = 0; // Initialize total
?>

<!DOCTYPE html>
<html lang="en">
<body>
    <h2>Shopping Cart</h2>

    <?php if (!empty($_SESSION["cart"])): ?>
        <table border="1" cellspacing="0" cellpadding="10">
