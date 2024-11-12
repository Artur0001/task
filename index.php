<?php
// created by Lytynenko Artur

$products = [
    ['id' => 1, 'name' => 'Product 1', 'price' => 100],
    ['id' => 2, 'name' => 'Product 2', 'price' => 200],
    ['id' => 3, 'name' => 'Product 3', 'price' => 300],
];

session_start();

echo "<h1>Welcome to Our Online Store</h1>";
echo "<h2>Product Catalog</h2>";
foreach ($products as $product) {
    echo "<p>{$product['name']} - {$product['price']} USD ";
    echo "<a href='cart.php?action=add&id={$product['id']}'>Add to Cart</a></p>";
}
echo "<a href='cart.php'>Go to Cart</a>";
?>
