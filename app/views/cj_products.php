<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CJ Products</title>
</head>
<body>
    <h1>Product List</h1>
    <?php if (!empty($products)) : ?>
        <ul>
            <?php foreach ($products['data']['productList'] as $product) : ?>
                <li>
                    <strong><?= $product['name'] ?></strong><br>
                    Price: <?= $product['price'] ?><br>
                    <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>" width="100">
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No products found.</p>
    <?php endif; ?>
</body>
</html>
