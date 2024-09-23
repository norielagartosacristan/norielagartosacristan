<?php
class Product {
    private $db;

    public function __construct() {
        // Connect to the database (using MySQLi or PDO)
        $this->db = new mysqli('localhost', 'root', '', 'your_database');
    }

    // Function to fetch products from AliExpress API
    public function getAliExpressProducts() {
        $url = "https://api.aliexpress.com/v2/product/search";
        $params = [
            "category" => "your-category-id",
            "api_key" => "your-api-key",
        ];

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url . "?" . http_build_query($params));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);

        return json_decode($response, true);
    }

    // Save AliExpress products to the database
    public function saveProductsToDB($products) {
        foreach ($products['data'] as $product) {
            $name = $this->db->real_escape_string($product['product_name']);
            $price = $product['product_price'];
            $image_url = $product['product_image'];

            $sql = "INSERT INTO products (name, price, image_url) VALUES ('$name', '$price', '$image_url')";
            $this->db->query($sql);
        }
    }

    // Fetch products from the local database
    public function getLocalProducts() {
        $result = $this->db->query("SELECT * FROM products");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
