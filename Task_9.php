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

<!DOCTYPE html>
<html lang="en">
<body>
    <h2>Online Shopping Cart</h2>

    <table border="1" cellspacing="0" cellpadding="10">
        <tr><th>Image</th><th>Product Name</th><th>Price</th><th>Option</th></tr>

        <?php foreach ($products as $index => $product): ?>
        <tr>
            <td><img src="<?= $product['img']; ?>" width="100px" height="100px"></td>
            <td><?= $product['name']; ?></td>
            <td>₹<?= number_format($product['price'], 2); ?></td>
            <td>
                <form method="POST">
                    <input type="hidden" name="index" value="<?= $index; ?>">
                    <input type="submit" name="add_to_cart" value="Add to Cart">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <p><a href="Task_9.1.php">View Cart</a></p>
</body>
</html>