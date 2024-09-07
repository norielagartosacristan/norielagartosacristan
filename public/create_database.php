<?php

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection parameters
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'ecommerce';

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL to create Suppliers table
$createSuppliersTable = "
CREATE TABLE IF NOT EXISTS Suppliers (
    SupplierID INT AUTO_INCREMENT PRIMARY KEY,
    SupplierName VARCHAR(255) NOT NULL,
    SupplierAPIURL VARCHAR(255) NOT NULL,
    APIKey VARCHAR(255) NOT NULL,
    ContactEmail VARCHAR(255),
    ContactPhone VARCHAR(50),
    Address TEXT,
    CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($createSuppliersTable) === TRUE) {
    echo "Table 'Suppliers' created successfully.<br>";
} else {
    echo "Error creating table 'Suppliers': " . $conn->error . "<br>";
}

// SQL to create Products table
$createProductsTable = "
CREATE TABLE IF NOT EXISTS Products (
    ProductID INT AUTO_INCREMENT PRIMARY KEY,
    SupplierID INT,
    ProductName VARCHAR(255) NOT NULL,
    Description TEXT,
    Price DECIMAL(10, 2) NOT NULL,
    Stock INT DEFAULT 0,
    SKU VARCHAR(50),
    ProductImage VARCHAR(255),
    Category VARCHAR(255),
    CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (SupplierID) REFERENCES Suppliers(SupplierID)
)";

if ($conn->query($createProductsTable) === TRUE) {
    echo "Table 'Products' created successfully.<br>";
} else {
    echo "Error creating table 'Products': " . $conn->error . "<br>";
}

// SQL to create Users table
$createUsersTable = "
CREATE TABLE IF NOT EXISTS Users (
    UserID INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(255) NOT NULL,
    MiddleName VARCHAR(255) NOT NULL,
    LastName VARCHAR(255) NOT NULL,
    UserName VARCHAR(255) NOT NULL,
    Email VARCHAR(255) NOT NULL UNIQUE,
    ContactNo VARCHAR(255) NOT NULL,
    PasswordHash VARCHAR(255) NOT NULL,
    Role ENUM('admin', 'customer', 'staff') DEFAULT 'customer',
    CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($createUsersTable) === TRUE) {
    echo "Table 'Users' created successfully.<br>";
} else {
    echo "Error creating table 'Users': " . $conn->error . "<br>";
}

// SQL to create Orders table
$createOrdersTable = "
CREATE TABLE IF NOT EXISTS Orders (
    OrderID INT AUTO_INCREMENT PRIMARY KEY,
    UserID INT,
    OrderDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    TotalAmount DECIMAL(10, 2) NOT NULL,
    ShippingAddress TEXT NOT NULL,
    OrderStatus VARCHAR(50) DEFAULT 'Pending',
    TrackingNumber VARCHAR(100),
    SupplierID INT,
    FOREIGN KEY (UserID) REFERENCES Users(UserID),
    FOREIGN KEY (SupplierID) REFERENCES Suppliers(SupplierID)
)";

if ($conn->query($createOrdersTable) === TRUE) {
    echo "Table 'Orders' created successfully.<br>";
} else {
    echo "Error creating table 'Orders': " . $conn->error . "<br>";
}

// SQL to create OrderItems table
$createOrderItemsTable = "
CREATE TABLE IF NOT EXISTS OrderItems (
    OrderItemID INT AUTO_INCREMENT PRIMARY KEY,
    OrderID INT,
    ProductID INT,
    Quantity INT NOT NULL,
    Price DECIMAL(10, 2) NOT NULL,
    SupplierID INT,
    FOREIGN KEY (OrderID) REFERENCES Orders(OrderID),
    FOREIGN KEY (ProductID) REFERENCES Products(ProductID),
    FOREIGN KEY (SupplierID) REFERENCES Suppliers(SupplierID)
)";

if ($conn->query($createOrderItemsTable) === TRUE) {
    echo "Table 'OrderItems' created successfully.<br>";
} else {
    echo "Error creating table 'OrderItems': " . $conn->error . "<br>";
}

// SQL to create Payments table
$createPaymentsTable = "
CREATE TABLE IF NOT EXISTS Payments (
    PaymentID INT AUTO_INCREMENT PRIMARY KEY,
    OrderID INT,
    PaymentDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    AmountPaid DECIMAL(10, 2) NOT NULL,
    PaymentMethod VARCHAR(50),
    PaymentStatus VARCHAR(50) DEFAULT 'Completed',
    FOREIGN KEY (OrderID) REFERENCES Orders(OrderID)
)";

if ($conn->query($createPaymentsTable) === TRUE) {
    echo "Table 'Payments' created successfully.<br>";
} else {
    echo "Error creating table 'Payments': " . $conn->error . "<br>";
}

// SQL to create Cart table
$createCartTable = "
CREATE TABLE IF NOT EXISTS Cart (
    CartID INT AUTO_INCREMENT PRIMARY KEY,
    UserID INT NOT NULL,
    ProductID INT NOT NULL,
    Quantity INT NOT NULL,
    AddedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (UserID) REFERENCES Users(UserID),
    FOREIGN KEY (ProductID) REFERENCES Products(ProductID)
)";

if ($conn->query($createCartTable) === TRUE) {
    echo "Table 'Cart' created successfully.<br>";
} else {
    echo "Error creating table 'Cart': " . $conn->error . "<br>";
}

// Close connection
$conn->close();

?>
