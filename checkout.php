<?php
// created by Lytynenko Artur

session_start();

echo "<h2>Checkout</h2>";
echo "<form method='POST' action='order.php'>";
echo "<p>Name: <input type='text' name='name'></p>";
echo "<p>Email: <input type='email' name='email'></p>";
echo "<p>Address: <input type='text' name='address'></p>";
echo "<button type='submit'>Place Order</button>";
echo "</form>";
?>
іііі