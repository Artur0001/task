<?php
// created by Lytynenko Artur

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    echo "<h2>Order Confirmation</h2>";
    echo "<p>Thank you, $name. Your order has been placed.</p>";
    echo "<p>We will send a confirmation to $email.</p>";

    // Очищення кошика
    unset($_SESSION['cart']);
}
?>
