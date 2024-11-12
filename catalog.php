<?php
// created by Lytynenko Artur
require 'config.php';

$query = $pdo->query("SELECT * FROM products");
$products = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Каталог товарів</title>
</head>
<body>
    <h1>Каталог товарів</h1>
    <div>
        <?php foreach ($products as $product): ?>
            <div>
                <h2><?= htmlspecialchars($product['name']) ?></h2>
                <p><?= htmlspecialchars($product['description']) ?></p>
                <p>Ціна: <?= htmlspecialchars($product['price']) ?> грн</p>
                <form action="add_to_cart.php" method="POST">
                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                    <button type="submit">Додати до кошика</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
