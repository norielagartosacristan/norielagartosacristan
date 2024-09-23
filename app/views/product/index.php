<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
</head>
<body>
    <h1>Products</h1>
    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $product['name']; ?></td>
                <td><?php echo $product['price']; ?></td>
                <td><img src="<?php echo $product['image_url']; ?>" alt="Product Image" width="100"></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
