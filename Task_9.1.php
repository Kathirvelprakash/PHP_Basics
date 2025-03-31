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
        <tr><th>Image</th><th>Product Name</th><th>Price</th><th>Quantity</th><th>Remove</th></tr>

<?php foreach ($_SESSION["cart"] as $index => $item): ?>
    <tr>
        <td><img src="<?= $item['img']; ?>" width="80px" height="80px"></td>
        <td><?= $item['name']; ?></td>
        <td>₹<?= number_format($item['price'], 2); ?></td>
        <td><?= $item['qty']; ?></td>
        <td><a href="Task_9.1.php?remove=<?= $index; ?>">Remove</a></td>
    </tr>
    <?php $total_price += $item["price"] * $item["qty"]; ?>
<?php endforeach; ?>
</table>

<p><strong>Total Price:</strong> ₹<?= number_format($total_price, 2); ?></p>
<a href="Task_9.1.php?clear=1">Clear Cart</a>

<?php else: ?>
<p>Your cart is empty.</p>
<?php endif; ?>

<p><a href="Task_9.php">Continue Shopping</a></p>
</body>
</html>