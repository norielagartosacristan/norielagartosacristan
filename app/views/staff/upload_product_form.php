<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/admin.css"> <!-- Link to your CSS -->
</head>
<body>
    <div class="sidebar">
        <h2>Admin Dashboard</h2>
        <ul>
            <li><a href="#">Upload Product</a></li>
            <li><a href="#">Manage Products</a></li>
            <li><a href="#">View Orders</a></li>
            <li><a href="#">Manage Suppliers</a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="header">
            <h1>Welcome, Admin</h1>
        </div>

        <div class="content">
            <h2>Upload New Product</h2>
            <form action="upload_product.php" method="POST" enctype="multipart/form-data">
                <label for="productName">Product Name:</label><br>
                <input type="text" id="productName" name="productName" required><br><br>

                <label for="productDesc">Description:</label><br>
                <textarea id="productDesc" name="productDesc" rows="4" required></textarea><br><br>

                <label for="price">Price:</label><br>
                <input type="text" id="price" name="price" required><br><br>

                <label for="stock">Stock Quantity:</label><br>
                <input type="number" id="stock" name="stock" required><br><br>

                <label for="sku">SKU:</label><br>
                <input type="text" id="sku" name="sku" required><br><br>

                <label for="category">Category:</label><br>
                <input type="text" id="category" name="category" required><br><br>

                <label for="productImage">Upload Image:</label><br>
                <input type="file" id="productImage" name="productImage" required><br><br>

                <input type="submit" value="Upload Product">
            </form>
        </div>
    </div>
</body>
</html>