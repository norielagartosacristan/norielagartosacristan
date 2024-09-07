<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productName = $_POST['productName'];
    $productDesc = $_POST['productDesc'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $sku = $_POST['sku'];
    $category = $_POST['category'];

    // Image Upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["productImage"]["name"]);
    move_uploaded_file($_FILES["productImage"]["tmp_name"], $target_file);

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'your_database');
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert into Products table
    $stmt = $conn->prepare("INSERT INTO Products (ProductName, Description, Price, Stock, SKU, Category, ProductImage) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdiiss", $productName, $productDesc, $price, $stock, $sku, $category, $target_file);
    
    if ($stmt->execute()) {
        echo "Product uploaded successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
