<?php
class ProductController {
    public function index() {
        $productModel = new Product();

        // Fetch products from AliExpress API
        $aliexpressProducts = $productModel->getAliExpressProducts();

        // Save the fetched products into the local database
        $productModel->saveProductsToDB($aliexpressProducts);

        // Get all products from the database (both from AliExpress and local entries)
        $localProducts = $productModel->getLocalProducts();

        // Load the view and pass the data
        $this->view('product/index', ['products' => $localProducts]);
    }

    // Load view function
    public function view($view, $data = []) {
        extract($data);

        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            die("View does not exist.");
        }
    }
}
