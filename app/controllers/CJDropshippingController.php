<?php
class CJDropshippingController {
    private $model;

    public function __construct() {
        $this->model = new CJDropshippingModel();
    }

    // Example function to list products
    public function listProducts() {
        $products = $this->model->getProducts();
        require_once '../app/views/cj_products.php'; // Load the view
    }

    // Example function to place an order
    public function placeOrder($orderData) {
        $result = $this->model->submitOrder($orderData);
        return $result;
    }
}
