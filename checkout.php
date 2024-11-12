<?php
// created by Lytynenko Artur
session_start();
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customer_name = $_POST['name'];
    $customer_address = $_POST['address'];
    $customer_phone = $_POST['phone'];
    $total_amount = 0;

    foreach ($_SESSION['cart'] as $product_id => $quantity) {
        $stmt = $pdo->prepare("SELECT price FROM products WHERE id = ?");
        $stmt->execute([$product_id]);
        $product = $stmt->fetch();
        $total_amount += $product['price'] * $quantity;
    }

    $stmt = $pdo->prepare("INSERT INTO orders (customer_name, customer_address, customer_phone, total_amount) VALUES (?, ?, ?, ?)");
    $stmt->execute([$customer_name, $customer_address, $customer_phone, $total_amount]);

    $order_id = $pdo->lastInsertId();

    foreach ($_SESSION['cart'] as $product_id => $quantity) {
        $stmt = $pdo->prepare("INSERT INTO order_items (order_id, product_id, quantity) VALUES (?, ?, ?)");
        $stmt->execute([$order_id, $product_id, $quantity]);
    }

    unset($_SESSION['cart']);
    header("Location: success.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Оформлення замовлення</title>
</head>
<body>
    <h1>Оформлення замовлення</h1>
    <form method="POST">
        <label>Ім'я: <input type="text" name="name" required></label><br>
        <label>Адреса: <textarea name="address" required></textarea></label><br>
        <label>Телефон: <input type="tel" name="phone" required></label><br>
        <button type="submit">Підтвердити замовлення</button>
    </form>
</body>
</html>
