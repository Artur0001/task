<?php
// created by Lytynenko Artur
session_start();
require 'config.php';

$cart = $_SESSION['cart'] ?? [];

if ($cart) {
    $product_ids = implode(',', array_keys($cart));
    $stmt = $pdo->query("SELECT * FROM products WHERE id IN ($product_ids)");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $products = [];
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Кошик</title>
</head>
<body>
    <h1>Кошик</h1>
    <?php if ($products): ?>
        <ul>
            <?php foreach ($products as $product): ?>
                <li>
                    <?= htmlspecialchars($product['name']) ?> - <?= $cart[$product['id']] ?> шт.
                </li>
            <?php endforeach; ?>
        </ul>
        <a href="checkout.php">Оформити замовлення</a>
    <?php else: ?>
        <p>Кошик порожній</p>
    <?php endif; ?>
</body>
</html>
