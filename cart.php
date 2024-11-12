<?php
// created by Lytynenko Artur

session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Додавання товарів до кошика
if (isset($_GET['action']) && $_GET['action'] == 'add' && isset($_GET['id'])) {
    $id = $_GET['id'];
    if (!isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id] = 0;
    }
    $_SESSION['cart'][$id]++;
}

echo "<h2>Your Cart</h2>";
foreach ($_SESSION['cart'] as $id => $quantity) {
    echo "<p>Product $id - Quantity: $quantity</p>";
}
echo "<a href='checkout.php'>Proceed to Checkout</a>";
?>
